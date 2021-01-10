<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class ShopSkus extends ObjectModel
{
    /**
     * @param array|object $shopSkus
     *
     * @return ShopSkus
     */
    public function add($shopSkus)
    {
        if (is_array($shopSkus)) {
            $this->collection[] = new ShopSku($shopSkus);
        } elseif (is_object($shopSkus) && $shopSkus instanceof ShopSku) {
            $this->collection[] = $shopSkus;
        }
        return $this;
    }
    /**
     * Get items
     *
     * @return ShopSku[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return ShopSku
     */
    public function current()
    {
        return parent::current();
    }
}