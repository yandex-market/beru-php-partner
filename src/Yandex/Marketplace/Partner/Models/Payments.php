<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class Payments extends ObjectModel
{
    /**
     * @param array|object $order
     *
     * @return Payments
     */
    public function add($order)
    {
        if (is_array($order)) {
            $this->collection[] = new Payment($order);
        } elseif (is_object($order) && $order instanceof Payment) {
            $this->collection[] = $order;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Payment[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Payment
     */
    public function current()
    {
        return parent::current();
    }
}
