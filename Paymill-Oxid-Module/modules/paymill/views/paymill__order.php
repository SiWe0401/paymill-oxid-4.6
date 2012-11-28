<?php
class paymill__order extends paymill__order_parent {

    /**
     * @overload
     */
    protected function _getNextStep($orderState) {

        $order = oxNew('oxorder');
        $order->load(oxSession::getVar('sess_challenge'));

        if (!$order->isLoaded()) { 
            return parent::_getNextStep($orderState);    
        }

        if (oxSession::getVar('paymill_transaction_token') == "") {
            throw new Exception("No transaction code was provided");
        }

        // check if order is paymill order
        if ($order->oxorder__oxpaymenttype->value == "paymill_credit_card") { 
            
            // build amount
            $amount = oxSession::getInstance()->getBasket()->getPrice()->getBruttoPrice();
            $amount = number_format($amount, 2, '.', '');
            $amount = $amount * 100;
            
            // build name
            $name = $order->oxorder__oxbilllname->value . ', ' . $order->oxorder__oxbillfname->value;
            

            // seems unnecessary but for v3,v4 etc. this should sty here
            $paymillLibraryVersion = oxConfig::getInstance()->getShopConfVar('paymill_lib_version');
            if ($paymillLibraryVersion == "v2") {
                $libBase = getShopBasePath(). 'modules/paymill/lib/v2/lib/';
                $libVersion = 'v2';
            } else {
                // FALLBACK
                $libBase = getShopBasePath(). 'modules/paymill/lib/v2/lib/';
                $libVersion = 'v2';
            }
            
            // process the payment
            $result = $this->processPayment(array(
                'libVersion' => oxConfig::getInstance()->getShopConfVar('paymill_lib_version'),
                'token' => oxSession::getVar('paymill_transaction_token'),
                'amount' => $amount,
                'currency' => strtoupper($order->oxorder__oxcurrency->value),
                'name' => $name,
                'email' => $order->oxorder__oxbillemail->value,
                'description' => 'Order ' . $order->oxorder__oxordernr->value . '; ' . $name,
                'libBase' => $libBase,
                'privateKey' => oxConfig::getInstance()->getShopConfVar('paymill_private_key'),
                'apiUrl' => oxConfig::getInstance()->getShopConfVar('paymill_api_url'),
                'loggerCallback' => array('paymill__order', 'logAction')
            ));
            
            // finish the order of payment was successfully processed
            if ($result === true) {
                return parent::_getNextStep($orderState);  
            } else {
                throw new Exception("Payment could not be processed");
            }
            
        } else {
            return parent::_getNextStep($orderState);  
        }
    }  
    
    /**
     * Processes the payment against the paymill API
     * @param $params array The settings array
     * @return boolean
     */
    private function processPayment($params) {  
        
        // setup the logger
        $logger = $params['loggerCallback'];
        
        // setup client params
        $clientParams = array(
            'email' => $params['email'],
            'description' => $params['name']
        );

        // setup credit card params
        $creditcardParams = array(
            'token' => $params['token']
        );

        // setup transaction params
        $transactionParams = array(
            'amount' => $params['amount'],
            'currency' => $params['currency'],
            'description' => $params['description']
        );
                
        require_once $params['libBase'] . 'Services/Paymill/Transactions.php';
        require_once $params['libBase'] . 'Services/Paymill/Clients.php';
        require_once $params['libBase'] . 'Services/Paymill/Payments.php';

        $clientsObject = new Services_Paymill_Clients(
            $params['privateKey'], $params['apiUrl']
        );
        $transactionsObject = new Services_Paymill_Transactions(
            $params['privateKey'], $params['apiUrl']
        );
        $creditcardsObject = new Services_Paymill_Payments(
            $params['privateKey'], $params['apiUrl']
        );
        
        // perform conection to the Paymill API and trigger the payment
        try {

            // create card
            $creditcard = $creditcardsObject->create($creditcardParams);
            if (!isset($creditcard['id'])) {
                call_user_func_array($logger, array("No creditcard created: " . var_export($creditcard, true)));
                return false;
            } else {
                call_user_func_array($logger, array("Creditcard created: " . $creditcard['id']));
            }

            // create client
            $clientParams['creditcard'] = $creditcard['id'];
            $client = $clientsObject->create($clientParams);
            if (!isset($client['id'])) {
                call_user_func_array($logger, array("No client created" . var_export($client, true)));
                return false;
            } else {
                call_user_func_array($logger, array("Client created: " . $client['id']));
            }

            // create transaction
            $transactionParams['client'] = $client['id'];
            $transactionParams['payment'] = $creditcard['id'];
            $transaction = $transactionsObject->create($transactionParams);
            if (!isset($transaction['id'])) {
                call_user_func_array($logger, array("No transaction created" . var_export($transaction, true)));
                return false;
            } else {
                call_user_func_array($logger, array("Transaction created: " . $transaction['id']));
            }

            // check result
            if (is_array($transaction) && array_key_exists('status', $transaction)) {
                if ($transaction['status'] == "closed") {
                    // transaction was successfully issued
                    return true;
                } elseif ($transaction['status'] == "open") {
                    // transaction was issued but status is open for any reason
                    call_user_func_array($logger, array("Status is open."));
                    return false;
                } else {
                    // another error occured
                    call_user_func_array($logger, array("Unknown error." . var_export($transaction, true)));
                    return false;
                }
            } else {
                // another error occured
                call_user_func_array($logger, array("Transaction could not be issued."));
                return false;
            }

        } catch (Services_Paymill_Exception $ex) {
            // paymill wrapper threw an exception
            call_user_func_array($logger, array("Exception thrown from paymill wrapper: " . $ex->getMessage()));
            return false;
        }        
        
        return true;
    }
    
    public static function logAction($message) {
        $logfile = dirname(dirname(__FILE__)) . '/log.txt';
        if (oxConfig::getInstance()->getShopConfVar('paymill_private_key') == "1" && is_writable($logfile)) {
            $handle = fopen($logfile, 'a');
            fwrite($handle, "[" . date(DATE_RFC822) . "] " . $message . "\n");
            fclose($handle);
        }
    }
}
?>
