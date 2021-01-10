<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class WarehouseStocks extends ObjectModel
{
    /**
     * @param array|object $warehouseStock
     *
     * @return WarehouseStocks
     */
    public function add($warehouseStock)
    {
        if (is_array($warehouseStock)) {
            $this->collection[] = new WarehouseStock($warehouseStock);
        } elseif (is_object($warehouseStock) && $warehouseStock instanceof WarehouseStock) {
            $this->collection[] = $warehouseStock;
        }
        return $this;
    }
    /**
     * Get items
     *
     * @return WarehouseStock[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return WarehouseStock
     */
    public function current()
    {
        return parent::current();
    }
}