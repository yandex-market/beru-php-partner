<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class StatsItemsOrder extends ObjectModel
{
    /**
     * @param array|object $order
     *
     * @return StatsItemsOrder
     */
    public function add($order)
    {
        if (is_array($order)) {
            $this->collection[] = new StatsItemOrder($order);
        } elseif (is_object($order) && $order instanceof StatsItemOrder) {
            $this->collection[] = $order;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return StatsItemOrder[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return StatsItemOrder
     */
    public function current()
    {
        return parent::current();
    }
}
