<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class StatsItemsOrder extends ObjectModel
{
    /**
     * @param array|object $statsItemOrder
     *
     * @return StatsItemsOrder
     */
    public function add($statsItemOrder)
    {
        if (is_array($statsItemOrder)) {
            $this->collection[] = new StatsItemOrder($statsItemOrder);
        } elseif (is_object($statsItemOrder) && $statsItemOrder instanceof StatsItemOrder) {
            $this->collection[] = $statsItemOrder;
        }
        return $this;
    }
    /**
     * Get items
     *
     * @return StatsItemOrder[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return StatsItemOrder
     */
    public function current()
    {
        return parent::current();
    }
}