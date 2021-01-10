<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class Warehouse extends Model
{

    protected $id;
    protected $name;
    protected $stocks;

    protected $mappingClasses = [
        'stocks' => WarehouseStocks::class
    ];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return WarehouseStocks
     */
    public function getStocks()
    {
        return $this->stocks;
    }

}