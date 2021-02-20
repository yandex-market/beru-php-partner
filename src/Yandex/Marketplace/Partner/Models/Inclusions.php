<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class Inclusions extends ObjectModel
{
    /**
     * @param array|object $order
     *
     * @return Inclusions
     */
    public function add($order)
    {
        if (is_array($order)) {
            $this->collection[] = new Including($order);
        } elseif (is_object($order) && $order instanceof Including) {
            $this->collection[] = $order;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Including[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Including
     */
    public function current()
    {
        return parent::current();
    }
}
