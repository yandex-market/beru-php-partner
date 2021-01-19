<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class Warehouse extends Model
{
    protected $id;
    protected $name;
    protected $stocks;

    protected $mappingClasses = [
        'stocks' => Stocks::class,
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
     * @return Stocks
     */
    public function getStocks()
    {
        return $this->stocks;
    }
}
