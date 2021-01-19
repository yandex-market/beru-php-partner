<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class StatsPrices extends ObjectModel
{
    /**
     * @param array|object $order
     *
     * @return StatsPrices
     */
    public function add($order)
    {
        if (is_array($order)) {
            $this->collection[] = new StatsPrice($order);
        } elseif (is_object($order) && $order instanceof StatsPrice) {
            $this->collection[] = $order;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return StatsPrice[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return StatsPrice
     */
    public function current()
    {
        return parent::current();
    }
}
