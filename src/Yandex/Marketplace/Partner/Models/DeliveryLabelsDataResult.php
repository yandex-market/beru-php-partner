<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class DeliveryLabelsDataResult extends Model
{
    protected $orderId;
    protected $placesNumber;
    protected $url;
    protected $parcelBoxLabels;

    protected $mappingClasses = [
        'parcelBoxLabels' => ParcelBoxLabels::class,
    ];

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @return int
     */
    public function getPlacesNumber()
    {
        return $this->placesNumber;
    }


    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }


    /**
     * @return ParcelBoxLabels
     */
    public function getParcelBoxLabels()
    {
        return $this->parcelBoxLabels;
    }

}