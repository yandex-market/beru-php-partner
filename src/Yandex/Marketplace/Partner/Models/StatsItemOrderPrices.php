<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class StatsItemOrderPrices extends ObjectModel
{
    /**
     * @param array|object $statsItemOrderPrice
     *
     * @return StatsItemOrderPrices
     */
    public function add($statsItemOrderPrice)
    {
        if (is_array($statsItemOrderPrice)) {
            $this->collection[] = new StatsItemOrderPrice($statsItemOrderPrice);
        } elseif (is_object($statsItemOrderPrice) && $statsItemOrderPrice instanceof StatsItemOrderPrice) {
            $this->collection[] = $statsItemOrderPrice;
        }
        return $this;
    }
    /**
     * Get items
     *
     * @return StatsItemOrderPrice[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return StatsItemOrderPrice
     */
    public function current()
    {
        return parent::current();
    }
}