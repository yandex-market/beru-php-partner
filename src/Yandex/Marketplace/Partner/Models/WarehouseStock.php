<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class WarehouseStock extends Model
{
    const TYPE_AVAILABLE = "AVAILABLE";
    const TYPE_DEFECT = "DEFECT";
    const TYPE_EXPIRED = "EXPIRED";
    const TYPE_FIT = "FIT";
    const TYPE_FREEZE = "FREEZE";
    const TYPE_QUARANTINE = "QUARANTINE";
    const TYPE_SUGGEST = "SUGGEST";
    const TYPE_TRANSIT = "TRANSIT";

    protected $type;
    protected $count;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

}