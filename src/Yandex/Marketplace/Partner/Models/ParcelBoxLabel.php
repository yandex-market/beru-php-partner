<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class ParcelBoxLabel extends Model
{
    protected $place;
    protected $weight;
    protected $supplierName;
    protected $deliveryServiceName;
    protected $deliveryServiceId;
    protected $orderId;
    protected $orderNum;
    protected $fulfilmentId;
    protected $url;

    /**
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @return string
     */
    public function getSupplierName()
    {
        return $this->supplierName;
    }

    /**
     * @return string
     */
    public function getDeliveryServiceName()
    {
        return $this->deliveryServiceName;
    }

    /**
     * @return string
     */
    public function getDeliveryServiceId()
    {
        return $this->deliveryServiceId;
    }

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @return string
     */
    public function getOrderNum()
    {
        return $this->orderNum;
    }

    /**
     * @return string
     */
    public function getFulfilmentId()
    {
        return $this->fulfilmentId;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}