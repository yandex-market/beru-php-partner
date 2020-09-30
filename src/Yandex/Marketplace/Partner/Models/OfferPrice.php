<?php

namespace Yandex\Marketplace\Partner\Models;

use DateTime;
use Yandex\Common\Model;

class OfferPrice extends Model
{
    protected $marketSku;
    protected $price;
    protected $updatedAt;

    protected $mappingClasses = [
        'price' => Price::class,
    ];

    /**
     * @return int
     */
    public function getMarketSku()
    {
        return $this->marketSku;
    }

    /**
     * @return Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getEndTyped()
    {
        return DateTime::createFromFormat(DATE_ISO8601, $this->getUpdatedAt());
    }
}