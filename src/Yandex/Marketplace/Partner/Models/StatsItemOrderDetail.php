<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class StatsItemOrderDetail extends Model
{

    const ITEM_STATUS_REJECTED = "REJECTED";

    protected $itemStatus;
    protected $itemCount;
    protected $updateDate;

    /**
     * @return string
     */
    public function getItemStatus()
    {
        return $this->itemStatus;
    }

    /**
     * @return int
     */
    public function getItemCount()
    {
        return $this->itemCount;
    }

    /**
     * @return string
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

}