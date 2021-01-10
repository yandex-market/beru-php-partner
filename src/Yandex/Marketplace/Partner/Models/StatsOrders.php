<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class StatsOrders extends ObjectModel
{
    /**
     * @param array|object $activeRelation
     *
     * @return StatsOrders
     */
    public function add($activeRelation)
    {
        if (is_array($activeRelation)) {
            $this->collection[] = new StatsOrder($activeRelation);
        } elseif (is_object($activeRelation) && $activeRelation instanceof StatsOrder) {
            $this->collection[] = $activeRelation;
        }
        return $this;
    }
    /**
     * Get items
     *
     * @return StatsOrder[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return StatsOrder
     */
    public function current()
    {
        return parent::current();
    }
}