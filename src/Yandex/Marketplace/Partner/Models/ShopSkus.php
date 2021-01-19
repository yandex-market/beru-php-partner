<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class ShopSkus extends Model
{
    protected $shopSku;
    protected $marketSku;
    protected $name;
    protected $price;
    protected $categoryId;
    protected $categoryName;
    protected $weightDimensions;
    protected $hidings;
    protected $warehouses;
    protected $storage;
    protected $tariffs;

    protected $mappingClasses = [
        'weightDimensions' => WeightDimensions::class,
        'hidings' => Hidings::class,
        'warehouses' => Warehouses::class,
        'storage' => Storage::class,
        'tariffs' => Tariffs::class,
    ];

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
    public function getMarketSku()
    {
        return $this->marketSku;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @return string
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * @return WeightDimensions
     */
    public function getWeightDimensions()
    {
        return $this->weightDimensions;
    }

    /**
     * @return Hidings
     */
    public function getHidings()
    {
        return $this->hidings;
    }

    /**
     * @return Warehouses
     */
    public function getWarehouses()
    {
        return $this->warehouses;
    }

    /**
     * @return Storage
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @return Tariffs
     */
    public function getTariffs()
    {
        return $this->tariffs;
    }
}
