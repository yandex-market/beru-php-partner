<?php

namespace Yandex\Marketplace\Partner\Models;

use DateTime;
use Yandex\Common\ObjectModel;

class StatusHistoryRow extends ObjectModel
{
    protected $date;
    protected $status;

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return DateTime|false
     */
    public function getDateTyped()
    {
        return DateTime::createFromFormat(DATE_ISO8601, $this->getDate());
    }
}