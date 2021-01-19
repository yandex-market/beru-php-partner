<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class Details extends ObjectModel
{
    /**
     * @param array|object $order
     *
     * @return Details
     */
    public function add($order)
    {
        if (is_array($order)) {
            $this->collection[] = new Detail($order);
        } elseif (is_object($order) && $order instanceof Detail) {
            $this->collection[] = $order;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Detail[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Detail
     */
    public function current()
    {
        return parent::current();
    }
}
