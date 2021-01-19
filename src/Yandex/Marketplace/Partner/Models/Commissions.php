<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class Commissions extends ObjectModel
{
    /**
     * @param array|object $order
     *
     * @return Commissions
     */
    public function add($order)
    {
        if (is_array($order)) {
            $this->collection[] = new Commission($order);
        } elseif (is_object($order) && $order instanceof Commission) {
            $this->collection[] = $order;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Commission[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Commission
     */
    public function current()
    {
        return parent::current();
    }
}
