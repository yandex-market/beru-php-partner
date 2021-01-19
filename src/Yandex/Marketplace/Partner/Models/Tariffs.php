<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class Tariffs extends ObjectModel
{
    /**
     * @param array|object $order
     *
     * @return Tariffs
     */
    public function add($order)
    {
        if (is_array($order)) {
            $this->collection[] = new Tariff($order);
        } elseif (is_object($order) && $order instanceof Tariff) {
            $this->collection[] = $order;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Tariff[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Tariff
     */
    public function current()
    {
        return parent::current();
    }
}
