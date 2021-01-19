<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class Warehouses extends ObjectModel
{
    /**
     * @param array|object $order
     *
     * @return Warehouses
     */
    public function add($order)
    {
        if (is_array($order)) {
            $this->collection[] = new Warehouse($order);
        } elseif (is_object($order) && $order instanceof Warehouse) {
            $this->collection[] = $order;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Warehouse[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Warehouse
     */
    public function current()
    {
        return parent::current();
    }
}
