<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class ShipmentsResult extends Model
{
    protected $shipmentRequest;

    protected $mappingClasses = [
        'shipmentRequest' => ShipmentRequest::class,
    ];

    /**
     * @return ShipmentRequest
     */
    public function getShipmentRequest()
    {
        return $this->shipmentRequest;
    }
}