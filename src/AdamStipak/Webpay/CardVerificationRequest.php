<?php

namespace AdamStipak\Webpay;

use AdamStipak\Webpay\PaymentRequest\AddInfo;

class CardVerificationRequest extends WebpayRequest  {
    /**
     * Payment Requester
     *
     * @param int $orderNumber Payments number - must be in each request from trader unique.
     * @param string $url Full Merchant URL. A result will be sent to this address  request. The result is forwarded over customer browser
     * @param string|null $md Any merchant data.
     */
    public function __construct (
        int     $orderNumber,
        string  $url,
        string  $md = null,
        AddInfo $addInfo = null
    ) {
        $this->params['MERCHANTNUMBER'] = "";
        $this->params['OPERATION'] = 'CARD_VERIFICATION';
        $this->params['ORDERNUMBER'] = $orderNumber;
        $this->params['URL'] = $url;
        $this->params['USERPARAM1'] = 'T';

        if ($md !== null) {
            $this->params['MD'] = $md;
        }

        if ($addInfo !== null) {
            $this->params['ADDINFO'] = $addInfo->toXml();
        }
    }
}

?>
