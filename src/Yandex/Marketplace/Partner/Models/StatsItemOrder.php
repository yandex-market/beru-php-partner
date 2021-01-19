<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class StatsItemOrder extends Model
{
    protected $offerName;
    protected $marketSku;
    protected $shopSku;
    protected $count;
    protected $prices;
    protected $warehouse;
    protected $details;

    protected $mappingClasses = [
        'prices' => StatsPrices::class,
        'warehouse' => Warehouse::class,
        'details' => Details::class,
    ];

    /**
     * @return StatsPrices
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @return Warehouse
     */
    public function getWarehouse()
    {
        return $this->warehouse;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return string
     */
    public function getOfferName()
    {
        return $this->offerName;
    }

    /**
     * @return string
     */
    public function getShopSku()
    {
        return $this->shopSku;
    }

    /**
     * @return string
     */
    public function getMarketSku()
    {
        return $this->marketSku;
    }

    /**
     * @return Details
     */
    public function getDetails()
    {
        return $this->details;
    }
}
