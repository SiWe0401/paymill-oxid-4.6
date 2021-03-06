[{assign var="oxConfig" value=$oView->getConfig()}]
[{if $sPaymentID == 'paymill_cc' && $paymillCompliance == '1'}]
    <dl>
        <dt>
            <input id="payment_[{$sPaymentID}]" type="radio" name="paymentid" value="[{$sPaymentID}]" [{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]checked[{/if}]>
            <label for="payment_[{$sPaymentID}]">
                <b>[{ $paymentmethod->oxpayments__oxdesc->value}]</b>
            </label>
        </dt>
        <dd class="[{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]activePayment[{/if}]">
            <ul class="form">
                <li class="controls controls-row">
                    <p class="payment-errors cc" style="display:none;"></p>
                    <div>
                        <ul id="paymill_brands">
                            [{foreach key=brandsId from=$paymillBrands item=cardBrand name=paymillBrandSelect}]
                                <li class="paymill-card-number-[{$cardBrand}]"></li>
                            [{/foreach}]
                        </ul>
                    </div>
                    <div id="payment-form-cc">
                        <div class="controls controls-row">
                            <label class="card-number-label">[{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_NUMBER" }]:</label>
                            <input id="paymillCardNumber" class="paymill_input card-number span1 [{if $brand}]paymill-card-number-[{$brand}][{/if}]" type="text" autocomplete="off" size="20" value="[{$paymillCcLastFour}]"/>
                        </div>
                        <div class="controls controls-row">
                            <label class="card-cvc-label">
                                [{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_SECURITYCODE" }]
                                <span class="pmTooltip">
                                    <a href="#" style="border-bottom: 1px dotted black;">?</a>
                                    <strong class="pmTooltipRight">[{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_CC_TOOLTIP" }]</strong>
                                </span>:
                            </label>
                            <input id="paymillCardCvc" class="piazure paymill_input card-cvc span1" type="password" autocomplete="off" size="4" value="[{$paymillCcCvc}]"/>
                        </div>
                        <div class="controls controls-row">
                            <label class="card-holdername-label">[{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_HOLDERNAME" }]:</label>
                            <input id="paymillCardHolderName" class="paymill_input card-holdername span1" type="text" size="20" value="[{$paymillCcCardHolder}]" />
                        </div>
                        <div class="controls controls-row">
                            <label class="card-expiry-label">[{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_VALIDUNTIL" }]:</label>
                            <select id="paymillCardExpiryMonth" class="paymill_input card-expiry-month span1">
                                <option value="1">1 - [{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_MONTH_JAN" }]</option>
                                <option value="2">2 - [{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_MONTH_FEB" }]</option>
                                <option value="3">3 - [{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_MONTH_MAR" }]</option>
                                <option value="4">4 - [{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_MONTH_APR" }]</option>
                                <option value="5">5 - [{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_MONTH_MAY" }]</option>
                                <option value="6">6 - [{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_MONTH_JUN" }]</option>
                                <option value="7">7 - [{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_MONTH_JUL" }]</option>
                                <option value="8">8 - [{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_MONTH_AUG" }]</option>
                                <option value="9">9 - [{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_MONTH_SEP" }]</option>
                                <option value="10">10 - [{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_MONTH_OCT" }]</option>
                                <option value="11">11 - [{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_MONTH_NOV" }]</option>
                                <option value="12">12 - [{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_MONTH_DEC" }]</option>
                            </select>
                            <span> / </span>
                            <select id="paymillCardExpiryYear" class="paymill_input card-expiry-year span1">
                                [{foreach from=$oView->getCreditYears() item=year}]
                                [{if $year eq $paymillCcExpireYear}]
                                <option selected="selected">[{$year}]</option>
                                [{else}]
                                <option>[{$year}]</option>
                                [{/if}]
                                [{/foreach}]
                            </select>
                        </div>
                    </div>
                </li>
            </ul>
            [{block name="checkout_payment_longdesc"}]
                [{if $paymentmethod->oxpayments__oxlongdesc->value}]
                    <div class="desc">
                        [{ $paymentmethod->oxpayments__oxlongdesc->getRawValue()}]
                    </div>
                [{/if}]
            [{/block}]
        </dd>
    </dl>
[{elseif $sPaymentID == 'paymill_cc' && $paymillCompliance == '0'}]
    <dl>
        <dt>
            <input id="payment_[{$sPaymentID}]" type="radio" name="paymentid" value="[{$sPaymentID}]" [{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]checked[{/if}]>
            <label for="payment_[{$sPaymentID}]">
                <b>[{ $paymentmethod->oxpayments__oxdesc->value}]</b>
            </label>
        </dt>
        <dd class="[{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]activePayment[{/if}]">
            <ul class="form">
                <li class="controls controls-row">
                    <p class="payment-errors cc" style="display:none;"></p>
                    <div>
                        <ul id="paymill_brands">
                            [{foreach key=brandsId from=$paymillBrands item=cardBrand name=paymillBrandSelect}]
                                <li class="paymill-card-number-[{$cardBrand}]"></li>
                            [{/foreach}]
                        </ul>
                    </div>
                    [{if $fastCheckoutCc == 'true'}]
                        <table id="paymillFastCheckoutTable">
                            <tr>
                                <td>[{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_NUMBER" }]: </td>
                                <td id="paymillFcCardNumber" class="paymill-card-number-[{$brand}]">[{$paymillCcLastFour}]</td>
                            </tr>
                            <tr>
                                <td>[{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_SECURITYCODE" }]: </td>
                                <td>[{$paymillCcCvc}]</td>
                            </tr>
                            <tr>
                                <td>[{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_HOLDERNAME" }]: </td>
                                <td>[{$paymillCcCardHolder}]</td>
                            </tr>
                            <tr>
                                <td>[{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_VALIDUNTIL" }]: </td>
                                <td>[{$paymillCcExpireMonth}]/[{$paymillCcExpireYear}]</td>
                            </tr>
                            <tr>
                            <td></td>
                            <td>
                            <button id="paymillFastCheckoutIframeChange" type="button">[{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_IFRAME_CHANGE }]</button>
                            </td>
                            </tr>
                        </table>
                    [{/if}]
                    <div id="payment-form-cc">
                    </div>
                </li>
            </ul>
            [{block name="checkout_payment_longdesc"}]
                [{if $paymentmethod->oxpayments__oxlongdesc->value}]
                    <div class="desc">
                        [{$paymentmethod->oxpayments__oxlongdesc->getRawValue()}]
                    </div>
                [{/if}]
            [{/block}]
        </dd>
    </dl>
[{elseif $sPaymentID == 'paymill_elv'}]
    <dl>
        <dt>
            <input id="payment_[{$sPaymentID}]" type="radio" name="paymentid" value="[{$sPaymentID}]" [{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]checked[{/if}]>
            <label for="payment_[{$sPaymentID}]"><b>[{ $paymentmethod->oxpayments__oxdesc->value}]</b></label>
        </dt>
        <dd class="[{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]activePayment[{/if}]">
            <ul class="form">
                <li class="controls controls-row">
                    <p class="payment-errors elv" style="display:none;"></p>
                    <div id="payment-form-elv">
                        <div class="controls controls-row">
                            <label class="elv-holdername-label">[{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_ACCOUNTHOLDER" }]:</label>
                            <input id="paymillElvHolderName" class="paymill_input elv-holdername span1" type="text" size="20" value="[{$paymillElvHolder}]"/>
                        </div>
                        <div class="controls controls-row">
                            <label class="elv-account-label">[{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_ACCOUNT" }] / [{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_IBAN" }]:</label>
                            <input id="paymillElvAccount" class="paymill_input elv-account span1" type="text" size="20" autocomplete="off" value="[{$paymillElvAccount}]"/>
                        </div>
                        <div class="controls controls-row">
                            <label class="elv-bankcode-label">[{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_BANKCODE" }] / [{ oxmultilang ident="PAGE_CHECKOUT_PAYMENT_BIC" }]:</label>
                            <input id="paymillElvBankCode" class="paymill_input elv-bankcode span1" type="text" size="20" autocomplete="off" value="[{$paymillElvCode}]"/>
                        </div>
                    </div>
                </li>
            </ul>
            [{block name="checkout_payment_longdesc"}]
                [{if $paymentmethod->oxpayments__oxlongdesc->value}]
                    <div class="desc">
                        [{ $paymentmethod->oxpayments__oxlongdesc->getRawValue()}]
                    </div>
                [{/if}]
            [{/block}]
        </dd>
    </dl>
[{else}]
    [{$smarty.block.parent}]
[{/if}]