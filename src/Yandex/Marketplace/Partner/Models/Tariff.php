<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class Tariff extends Model
{
    const TYPE_AGENCY_COMMISSION = "AGENCY_COMMISSION";
    const TYPE_FEE = "FEE";

    protected $type;
    protected $percent;
    protected $amount;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return float
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

}