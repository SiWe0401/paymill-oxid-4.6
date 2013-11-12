<?php

$sLangName = "Deutsch";
$aLang = array(
    'charset' => 'UTF-8',
    'PAGE_CHECKOUT_PAYMENT_NUMBER' => 'Kreditkarte',
    'PAGE_CHECKOUT_PAYMENT_SECURITYCODE' => 'CVC',
    'PAGE_CHECKOUT_PAYMENT_HOLDERNAME' => 'Karteninhaber',
    'PAGE_CHECKOUT_PAYMENT_VALIDUNTIL' => 'G&uuml;ltig bis',
    'PAGE_CHECKOUT_PAYMENT_ACCOUNTHOLDER' => 'Kontoinhaber',
    'PAGE_CHECKOUT_PAYMENT_ACCOUNT' => 'Kontonummer',
    'PAGE_CHECKOUT_PAYMENT_BANKCODE' => 'Bankleitzahl',
    'PAGE_CHECKOUT_PAYMENT_MONTH_JAN' => 'Januar',
    'PAGE_CHECKOUT_PAYMENT_MONTH_FEB' => 'Februar',
    'PAGE_CHECKOUT_PAYMENT_MONTH_MAR' => 'M&auml;rz',
    'PAGE_CHECKOUT_PAYMENT_MONTH_APR' => 'April',
    'PAGE_CHECKOUT_PAYMENT_MONTH_MAY' => 'Mai',
    'PAGE_CHECKOUT_PAYMENT_MONTH_JUN' => 'Juni',
    'PAGE_CHECKOUT_PAYMENT_MONTH_JUL' => 'Juli',
    'PAGE_CHECKOUT_PAYMENT_MONTH_AUG' => 'August',
    'PAGE_CHECKOUT_PAYMENT_MONTH_OCT' => 'Oktober',
    'PAGE_CHECKOUT_PAYMENT_MONTH_SEP' => 'September',
    'PAGE_CHECKOUT_PAYMENT_MONTH_NOV' => 'November',
    'PAGE_CHECKOUT_PAYMENT_MONTH_DEC' => 'Dezember',
    'PAYMILL_VALIDATION_CARDNUMBER' => 'Bitte geben Sie eine valide Kartennummer ein.',
    'PAYMILL_VALIDATION_ACCOUNTNUMBER' => 'Bitte geben Sie eine valide Kontonummer ein.',
    'PAYMILL_VALIDATION_BANKCODE' => 'Bitte geben Sie eine valide Bankleitzahl ein.',
    'PAYMILL_VALIDATION_EXP' => 'Bitte geben Sie ein in der Zukunft liegendes Ablaufdatum ein.',
    'PAYMILL_VALIDATION_CVC' => 'Bitte geben Sie einen validen CVC-Code ein.',
    'PAYMILL_VALIDATION_CARDHOLDER' => 'Bitte geben Sie den Karteninhaber ein',
    'PAYMILL_VALIDATION_ACCOUNTHOLDER' => 'Bitte geben Sie den Kontoinhaber ein',
    'PAYMILL_CC_POWERED_TEXT' => 'Sichere Kreditkartenzahlung powered by',
    'PAYMILL_ELV_POWERED_TEXT' => 'ELV powered by',
    'PAGE_CHECKOUT_PAYMENT_CC_TOOLTIP' => 'Hinter dem CVV-Code bzw. CVC verbirgt sich ein Sicherheitsmerkmal von Kreditkarten, &uuml;blicherweise handelt es sich dabei um eine drei- bis vierstelligen Nummer. Der CVV-Code befindet sich auf VISA-Kreditkarten. Der gleiche Code ist auch auf MasterCard-Kreditkarten zu finden, hier allerdings unter dem Namen CVC. Die Abk&uuml;rzung CVC steht dabei f&uuml;r Card Validation Code. Bei VISA wird der Code als Card Verification Value-Code bezeichnet. Ähnlich wie bei Mastercard und VISA gibt es auch bei Diners Club, Discover und JCB eine dreistellige Nummer, die meist auf der R&uuml;ckseite der Karte zu finden ist. Bei Maestro-Karten gibt es mit und ohne dreistelligen CVV. Wird eine Maestro-Karte ohne CVV verwendet kann einfach 000 eingetragen werden. American Express verwendet die CID (Card Identification Number). Dabei handelt es sich um eine vierstellige Nummer, die meist auf der Vorderseite der Karte, rechts oberhalb der Kartennummer zu finden ist.',
    'PAYMILL_10001' => 'Genereller Fehler, bitte wenden Sie sich an den Support.',
    'PAYMILL_10002' => 'Wir warten noch immer auf etwas.',
    'PAYMILL_20000' => 'General success response.',
    'PAYMILL_40000' => 'Generelles Problem mit den Daten.',
    'PAYMILL_40001' => 'Es gibt ein Problem mit den Payment Daten.',
    'PAYMILL_40100' => 'Es existieren Probleme mit der Kreditkarte. N&auml;here Details k&ouml;nnen nicht &uuml;bergeben werden.',
    'PAYMILL_40101' => 'Der CVV ist nicht korrekt.',
    'PAYMILL_40102' => 'Die Kreditkarte ist abgelaufen oder noch g&uuml;ltig.',
    'PAYMILL_40103' => 'Das Umsatzimit der Kreditkarte wurde mit dieser Transaktion &uuml;berschritten oder ist bereits &uuml;berschritten.',
    'PAYMILL_40104' => 'Die Kreditkarte ist ung&uuml;ltig',
    'PAYMILL_40105' => 'Das Kreditkartenablaufdatum ist nicht korrekt.',
    'PAYMILL_40106' => 'Kreditkarten-Anbieter ist erforderlich.',
    'PAYMILL_40200' => 'Probleme mit den Konto Daten.',
    'PAYMILL_40201' => 'Daten stimmen nicht mit dem Bank-Account &uuml;berein.',
    'PAYMILL_40202' => 'Die Benutzer-Authentifizierung ist fehlgeschlagen.',
    'PAYMILL_40300' => 'Es gibt es Problem mit den 3DSecure Daten.',
    'PAYMILL_40301' => 'W&auml;hrung oder Betrag stimmen nicht &uuml;berein.',
    'PAYMILL_40400' => 'Es gibt ein Problem mit den Eingabe Daten.',
    'PAYMILL_40401' => 'Der Betrag ist zu niedrig oder null.',
    'PAYMILL_40402' => 'Der Verwendungszweck ist zu lang.',
    'PAYMILL_40403' => 'Die W&auml;hrung ist nicht f&uuml;r den Kunden konfigurierten.',
    'PAYMILL_50000' => 'Generelles Problem mit dem Backend.',
    'PAYMILL_50001' => 'Die Kreditkarte ist auf einer Schwarzen Liste.',
    'PAYMILL_50100' => 'Technisches Problem mit der Kreditkarte.',
    'PAYMILL_50101' => 'Limit &uuml;berschritten.',
    'PAYMILL_50102' => 'Diese Karte wurde ohne weitere Gr&uuml;nde abgelehnt.',
    'PAYMILL_50103' => 'Diese Karte wurde wegen Kartenmanipulationen abgelehnt.',
    'PAYMILL_50104' => 'Die Transaktion wurde vom Authorisierungs-System abgelehnt (Karte durch Bank eingeschr&auml;nkt).',
    'PAYMILL_50105' => 'Die Konfiguration ist ung&uuml;ltig.',
    'PAYMILL_50200' => 'Technischer Fehler mit dem Bankkonto.',
    'PAYMILL_50201' => 'Dieser Kundenaccount ist auf einer Schwarzen Liste.',
    'PAYMILL_50300' => 'Es gibt einen teschnischen Fehler mit 3-D Secure.',
    'PAYMILL_50400' => 'Ablehnung aufgrund von Risiko Problemen.',
    'PAYMILL_50500' => 'Generelle Zeit&uuml;berschreitung.',
    'PAYMILL_50501' => 'Die Schnittstelle zum Acquirer reagiert nicht, daher bekommen wir keine Antwort ob die Transaktion erfolgreich durchgelaufen ist.',
    'PAYMILL_50502' => 'Es gibt eine Zeit&uuml;berschreitung bei der Risiko-Management Transaktion.',
    'PAYMILL_50600' => 'Doppelte Transaktion.'
);