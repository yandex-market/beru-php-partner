<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class StatsOrdersResult extends Model
{
    protected $orders;
    protected $paging;

    protected $mappingClasses = [
        'orders' => StatsOrders::class,
    ];

    /**
     * @return StatsOrders
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @return mixed
     */
    public function getNextPageToken()
    {
        if (isset($this->paging['nextPageToken'])) {
            return $this->paging['nextPageToken'];
        }

        return null;
    }

    /**
     * @return string|null
     */
    public function getPrevPageToken()
    {
        if (isset($this->paging['prevPageToken'])) {
            return $this->paging['prevPageToken'];
        }
        return null;
    }
}