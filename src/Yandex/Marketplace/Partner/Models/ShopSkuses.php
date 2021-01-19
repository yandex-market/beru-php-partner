<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class ShopSkuses extends ObjectModel
{
    public function __construct(array $data = [])
    {
        parent::__construct($data['shopSkus']);
    }

    /**
     * @param array|object $order
     *
     * @return ShopSkuses
     */
    public function add($order)
    {
        if (is_array($order)) {
            $this->collection[] = new ShopSkus($order);
        } elseif (is_object($order) && $order instanceof ShopSkus) {
            $this->collection[] = $order;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return ShopSkus[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return ShopSkus
     */
    public function current()
    {
        return parent::current();
    }
}
