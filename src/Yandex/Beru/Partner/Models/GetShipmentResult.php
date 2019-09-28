<?php


namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class GetShipmentResult extends Model
{
    protected $shipmentRequest;

    protected $mappingClasses = [
        'shipmentRequest' => ShipmentRequestDetails::class,
    ];

    /**
     * @return ShipmentRequestDetails
     */
    public function getShipmentRequest()
    {
        return $this->shipmentRequest;
    }
}