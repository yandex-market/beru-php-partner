<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class StatsOrders extends ObjectModel
{
    /**
     * @param array|object $order
     *
     * @return StatsOrders
     */
    public function add($order)
    {
        if (is_array($order)) {
            $this->collection[] = new StatsOrder($order);
        } elseif (is_object($order) && $order instanceof StatsOrder) {
            $this->collection[] = $order;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return StatsOrder[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return StatsOrder
     */
    public function current()
    {
        return parent::current();
    }
}
