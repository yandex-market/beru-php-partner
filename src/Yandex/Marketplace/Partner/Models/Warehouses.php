<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class Warehouses extends ObjectModel
{
    /**
     * @param array|object $warehouse
     *
     * @return Warehouses
     */
    public function add($warehouse)
    {
        if (is_array($warehouse)) {
            $this->collection[] = new Warehouse($warehouse);
        } elseif (is_object($warehouse) && $warehouse instanceof Warehouse) {
            $this->collection[] = $warehouse;
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