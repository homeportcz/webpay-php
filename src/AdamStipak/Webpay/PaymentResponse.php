<?php

namespace AdamStipak\Webpay;

class PaymentResponse
{

    /** @var array */
    private $params = [];

    /** @var string */
    private $digest;

    /** @var string */
    private $digest1;

    /**
     * @param string $operation
     * @param string $ordernumber
     * @param string $merordernum
     * @param int $prcode
     * @param int $srcode
     * @param string $resulttext
     * @param string $digest
     * @param string $digest1
     */
    public function __construct(
        string $operation,
        string $ordernumber,
        string $merordernum = null,
        string $md = null,
        int    $prcode,
        int    $srcode,
        string $resulttext = null,
        string $user_param_1 = null,
        string $addinfo = null,
        string $token = null,
        string $expiry = null,
        string $acsres = null,
        string $panpattern = null,
        string $daytocapture = null,
        string $token_reg_status = null,
        string $acrc = null,
        string $rrn = null,
        string $par = null,
        string $traceid = null,
        string $digest,
        string $digest1
    )
    {
        $this->params['operation'] = $operation;
        $this->params['ordernumber'] = $ordernumber;
        if ($merordernum !== null) $this->params['merordernum'] = $merordernum;
        if ($md !== null) $this->params['md'] = $md;
        $this->params['prcode'] = $prcode;
        $this->params['srcode'] = $srcode;
        if ($resulttext !== null) $this->params['resulttext'] = $resulttext;

        if ($user_param_1 !== null) $this->params['user_param_1'] = $user_param_1;
        if ($addinfo !== null) $this->params['addinfo'] = $addinfo;
        if ($token !== null) $this->params['token'] = $token;
        if ($expiry !== null) $this->params['expiry'] = $expiry;
        if ($acsres !== null) $this->params['acsres'] = $acsres;
        if ($panpattern !== null) $this->params['panpattern'] = $panpattern;
        if ($daytocapture !== null) $this->params['daytocapture'] = $daytocapture;
        if ($token_reg_status !== null) $this->params['token_reg_status'] = $token_reg_status;
        if ($acrc !== null) $this->params['acrc'] = $acrc;
        if ($rrn !== null) $this->params['rrn'] = $rrn;
        if ($par !== null) $this->params['par'] = $par;
        if ($traceid !== null) $this->params['traceid'] = $traceid;

        $this->digest = $digest;
        $this->digest1 = $digest1;
    }

    public function getToken()
    {
        return $this->params['token'] ?? null;
    }

    public function getPan()
    {
        return $this->params['panpattern'] ?? null;
    }

    public function getExpiration() {
        return $this->params['expiry'] ?? null;
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
