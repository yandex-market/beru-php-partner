<?php

namespace Yandex\Marketplace\Partner\Models;

use DateTime;
use Yandex\Common\Model;

class Detail extends Model
{
    protected $itemStatus;
    protected $itemCount;
    protected $updateDate;
    protected $stockType;

    /**
     * @return string
     */
    public function getItemStatus()
    {
        return $this->itemStatus;
    }

    /**
     * @return string
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * @return string
     */
    public function getStockType()
    {
        return $this->stockType;
    }

    /**
     * @return int
     */
    public function getItemCount()
    {
        return $this->itemCount;
    }

    /**
     * @return DateTime|false
     */
    public function getStatusUpdateDateType()
    {
        return DateTime::createFromFormat("d-m-Y H:i:s", $this->getUpdateDate());
    }
}
