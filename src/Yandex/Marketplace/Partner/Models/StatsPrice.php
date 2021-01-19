<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class StatsPrice extends Model
{
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
     * @return double
     */
    public function getCostPerItem()
    {
        return $this->costPerItem;
    }

    /**
     * @return double
     */
    public function getTotal()
    {
        return $this->total;
    }
}
