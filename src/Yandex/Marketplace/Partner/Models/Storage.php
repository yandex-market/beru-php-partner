<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class Storage extends ObjectModel
{
    /**
     * @param array|object $order
     *
     * @return Storage
     */
    public function add($order)
    {
        if (is_array($order)) {
            $this->collection[] = new StorageType($order);
        } elseif (is_object($order) && $order instanceof StorageType) {
            $this->collection[] = $order;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return StorageType[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return StorageType
     */
    public function current()
    {
        return parent::current();
    }
}
