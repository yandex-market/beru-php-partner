<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class Stocks extends ObjectModel
{
    /**
     * @param array|object $order
     *
     * @return Stocks
     */
    public function add($order)
    {
        if (is_array($order)) {
            $this->collection[] = new Stock($order);
        } elseif (is_object($order) && $order instanceof Stock) {
            $this->collection[] = $order;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Stock[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Stock
     */
    public function current()
    {
        return parent::current();
    }
}
