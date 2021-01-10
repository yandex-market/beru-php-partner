<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class StatsItemOrderPrice extends Model
{
    const TYPE_BUYER = "BUYER";
    const TYPE_CASHBACK = "CASHBACK";
    const TYPE_MARKETPLACE = "MARKETPLACE";
    const TYPE_SPASIBO = "SPASIBO";

    protected $type;
    protected $costPerItem;
    protected $total;

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
    public function getCostPerItem()
    {
        return $this->costPerItem;
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

}