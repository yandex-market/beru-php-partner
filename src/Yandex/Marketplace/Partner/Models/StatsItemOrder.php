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
        'prices' => StatsItemOrderPrices::class,
        'warehouse' => Warehouse::class,
        'details' => StatsItemOrderDetails::class,
    ];

    /**
     * @return string
     */
    public function getOfferName()
    {
        return $this->offerName;
    }

    /**
     * @return int
     */
    public function getMarketSku()
    {
        return $this->marketSku;
    }

    /**
     * @return string
     */
    public function getShopSku()
    {
        return $this->shopSku;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return StatsItemOrderPrices
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
     * @return StatsItemOrderDetails
     */
    public function getDetails()
    {
        return $this->details;
    }

}