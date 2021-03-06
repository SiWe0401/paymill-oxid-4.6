/**
 * Payment iFrame
 *
 * @copyright  Copyright (c) 2015 PAYMILL GmbH (https://www.paymill.com)
 */

jQuery(document).ready(function($) {

    if (PAYMILL_FASTCHECKOUT_CC) {
        $('#paymillFastCheckoutIframeChange').click(function (event) {
            PAYMILL_FASTCHECKOUT_CC_CHANGED = true;
            embedIframe();
            $('#paymillFastCheckoutTable').remove();
        });
    } else {
        if($('#payment_paymill_cc').is(':checked') || PAYMILL_IS_BASIC_THEME) {
            embedIframe();
        } else {
            $('#payment_paymill_cc').click(function (event) {
                embedIframe();
            });
        }
    }

    $(PAYMILL_PAYMENT_FORM).submit(function (event) {
        var cc;

        cc = $('#payment_paymill_cc').attr('checked');

        if (cc && PAYMILL_COMPLIANCE) {
            // prevent form submit
            event.preventDefault();

            clearErrors();

            // disable submit-button to prevent multiple clicks
            $(PAYMILL_NEXT_STEP_BUTTON).attr("disabled", "disabled");

            if (PAYMILL_FASTCHECKOUT_CC && !PAYMILL_FASTCHECKOUT_CC_CHANGED) {
                fastCheckout();
            } else {
                createToken();
            }
        }

        return true;
    });

    $('#payment_paymill_cc').click(clearErrors);
    $('#payment_paymill_elv').click(clearErrors);

    function embedIframe()
    {
        paymill.embedFrame('payment-form-cc', { lang: PAYMILL_LANG_OPTION }, function(error) {
            if (error && PAYMILL_DEBUG === "1") {
                console.log(error.apierror, error.message);
            } else {
                // Frame was loaded successfully and is ready to be used.
            }
        });
    }

    function clearErrors()
    {
        $(".payment-errors").css("display", "none");
        $(".payment-errors").text("");
    }

    function createToken()
    {
        paymill.createTokenViaFrame({
            amount_int: PAYMILL_AMOUNT,
            currency: PAYMILL_CURRENCY
        }, paymillResponseHandler);
    }

    function fastCheckout()
    {
        $("#paymill_form").append("<input id='paymillFastcheckoutHidden' type='hidden' name='paymillFastcheckout' value='" + true + "'/>");
        result = new Object();
        result.token = 'dummyToken';
        paymillResponseHandler(null, result);
    }

    function paymillResponseHandler(error, result)
    {
        // Handle error or process result.
        if (error) {
            paymillDebug('An API error occured:' + error.apierror);
        } else {
            // Token
            paymillDebug('Received a token: ' + result.token);
            // add token into hidden input field for request to the server
            $(PAYMILL_PAYMENT_FORM).append("<input type='hidden' name='paymillToken' value='" + result.token + "'/>");
            $(PAYMILL_PAYMENT_FORM).get(0).submit();
        }
        $(PAYMILL_NEXT_STEP_BUTTON).removeAttr("disabled");
    }

    function paymillDebug(message)
    {
        if (PAYMILL_DEBUG === "1") {
            console.log(message);
        }
    }

});