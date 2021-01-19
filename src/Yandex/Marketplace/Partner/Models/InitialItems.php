<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class InitialItems extends ObjectModel
{
    /**
     * @param array|object $order
     *
     * @return InitialItems
     */
    public function add($order)
    {
        if (is_array($order)) {
            $this->collection[] = new InitialItem($order);
        } elseif (is_object($order) && $order instanceof InitialItem) {
            $this->collection[] = $order;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return InitialItem[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return InitialItem
     */
    public function current()
    {
        return parent::current();
    }
}
