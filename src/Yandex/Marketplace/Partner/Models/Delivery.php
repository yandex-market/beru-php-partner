<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class Delivery extends Model
{
    const TYPE_DELIVERY = "DELIVERY";
    const TYPE_PICKUP = "PICKUP";
    const TYPE_POST = "POST";

    protected $deliveryPartnerType;
    protected $id;
    protected $serviceName;
    protected $type;
    protected $region;
    protected $shipments;
    protected $deliveryServiceId;

    protected $mappingClasses = [
        'region' => Region::class,
        'shipments' => Shipments::class,
    ];

    /**
     * @return string
     */
    public function getDeliveryPartnerType()
    {
        return $this->deliveryPartnerType;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getServiceName()
    {
        return $this->serviceName;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return Shipments|null
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    /**
     * @return string
     */
    public function getDeliveryServiceId()
    {
        return $this->deliveryServiceId;
    }
}
