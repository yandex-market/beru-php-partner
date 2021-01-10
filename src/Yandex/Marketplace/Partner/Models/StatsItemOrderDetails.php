<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class StatsItemOrderDetails extends ObjectModel
{
    /**
     * @param array|object $statsItemOrderDetail
     *
     * @return StatsItemOrderDetails
     */
    public function add($statsItemOrderDetail)
    {
        if (is_array($statsItemOrderDetail)) {
            $this->collection[] = new StatsItemOrderDetail($statsItemOrderDetail);
        } elseif (is_object($statsItemOrderDetail) && $statsItemOrderDetail instanceof StatsItemOrderDetail) {
            $this->collection[] = $statsItemOrderDetail;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return StatsItemOrderDetail[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return StatsItemOrderDetail
     */
    public function current()
    {
        return parent::current();
    }
}