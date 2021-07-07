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
    protected $price;
    protected $address;
    protected $dates;
    protected $subsidy;

    protected $mappingClasses = [
        'region' => Region::class,
        'shipments' => Shipments::class,
        'address' => Address::class,
        'dates' => Dates::class,
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

	/**
	 * @return float
	 */
	public function getPrice()
	{
		return $this->price;
	}

    /**
     * @return Address|null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return Dates|null
     */
    public function getDates()
    {
        return $this->dates;
    }

    /**
     * @return float
     */
    public function getSubsidy()
    {
        return $this->subsidy;
    }
}
