<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class Hidings extends ObjectModel
{
    /**
     * @param array|object $order
     *
     * @return Hidings
     */
    public function add($order)
    {
        if (is_array($order)) {
            $this->collection[] = new Hiding($order);
        } elseif (is_object($order) && $order instanceof Hiding) {
            $this->collection[] = $order;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Hiding[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Hiding
     */
    public function current()
    {
        return parent::current();
    }
}
