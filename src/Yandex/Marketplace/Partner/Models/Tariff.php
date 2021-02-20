<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class Tariff extends Model
{
    protected $type;
    protected $percent;
    protected $amount;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return double
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * @return double
     */
    public function getAmount()
    {
        return $this->amount;
    }
}
