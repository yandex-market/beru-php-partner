<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class GetShipmentItemsResult extends Model
{
    protected $shipmentItems;
    protected $paging;
    protected $total;

    protected $mappingClasses = [
        'shipmentItems' => ShipmentItems::class,
    ];

    /**
     * @return ShipmentItems
     */
    public function getShipmentItems()
    {
        return $this->shipmentItems;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
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