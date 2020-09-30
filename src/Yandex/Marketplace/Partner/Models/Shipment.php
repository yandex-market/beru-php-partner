<?php

namespace Yandex\Marketplace\Partner\Models;

use DateTime;
use Yandex\Common\Model;

class Shipment extends Model
{
    protected $id;
    protected $boxes;
    protected $shipmentDate;

    protected $mappingClasses = [
        'boxes' => Boxes::class
    ];

    /**
     * @return Boxes
     */
    public function getBoxes()
    {
        return $this->boxes;
    }
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
    public function getShipmentDate()
    {
        return $this->shipmentDate;
    }

    /**
     * @return DateTime|false
     */
    public function getShipmentDateTyped()
    {
        return DateTime::createFromFormat("d-m-Y", $this->getShipmentDate());
    }
}
