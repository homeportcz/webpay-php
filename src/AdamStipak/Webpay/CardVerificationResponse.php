<?php

namespace AdamStipak\Webpay;

class CardVerificationResponse
{

    private array $params = [];

    private string $digest;

    private string $digest1;

    public function __construct(string $operation,
                                string $ordernumber,
                                int    $prcode,
                                int    $srcode,
                                string $digest,
                                string $digest1,
                                string $merordernum = null,
                                       $md = null,
                                string $resulttext = null,
                                string $USERPARAM1 = null,
                                string $ADDINFO = null,
                                string $TOKEN = null,
                                string $EXPIRY = null,
                                string $ACSRES = null,
                                string $PANPATTERN = null,
                                string $DAYTOCAPTURE = null,
                                string $TOKENREGSTATUS = null,
                                string $ACRC = null,
                                string $RRN = null,
                                string $PAR = null,
                                string $TRACEID = null
    )
    {
        $this->params['operation'] = $operation;
        $this->params['ordernumber'] = $ordernumber;
        if ($merordernum !== null) {
            $this->params['merordernum'] = $merordernum;
        }
        if ($md !== null) {
            $this->params['md'] = $md;
        }
        $this->params['prcode'] = $prcode;
        $this->params['srcode'] = $srcode;
        if ($resulttext !== null) {
            $this->params['resulttext'] = $resulttext;
        }

        if ($USERPARAM1 !== null) {
            $this->params['USERPARAM1'] = $USERPARAM1;
        }
        if ($ADDINFO !== null) {
            $this->params['ADDINFO'] = $ADDINFO;
        }
        if ($TOKEN !== null) {
            $this->params['TOKEN'] = $TOKEN;
        }
        if ($EXPIRY !== null) {
            $this->params['EXPIRY'] = $EXPIRY;
        }
        if ($ACSRES !== null) {
            $this->params['ACSRES'] = $ACSRES;
        }
        if ($PANPATTERN !== null) {
            $this->params['PANPATTERN'] = $PANPATTERN;
        }
        if ($DAYTOCAPTURE !== null) {
            $this->params['DAYTOCAPTURE'] = $DAYTOCAPTURE;
        }
        if ($TOKENREGSTATUS !== null) {
            $this->params['TOKENREGSTATUS'] = $TOKENREGSTATUS;
        }
        if ($ACRC !== null) {
            $this->params['ACRC'] = $ACRC;
        }
        if ($RRN !== null) {
            $this->params['RRN'] = $RRN;
        }
        if ($PAR !== null) {
            $this->params['PAR'] = $PAR;
        }
        if ($TRACEID !== null) {
            $this->params['TRACEID'] = $TRACEID;
        }


        $this->digest = $digest;
        $this->digest1 = $digest1;
    }

    public function getToken()
    {
        return $this->params['TOKEN'] ?? null;
    }

    public function getPan()
    {
        return $this->params['PANPATTERN'] ?? null;
    }

    public function getExpiration() {
        return $this->params['EXPIRY'] ?? null;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getDigest(): string
    {
        return $this->digest;
    }

    /**
     * @return bool
     */
    public function hasError(): bool
    {
        return (bool)$this->params['prcode'] || (bool)$this->params['srcode'];
    }

    /**
     * @return string
     */
    public function getDigest1(): string
    {
        return $this->digest1;
    }
}
