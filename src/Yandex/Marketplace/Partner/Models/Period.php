<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;
use DateTime;

class Period extends Model
{
    protected $start;
    protected $end;

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @return DateTime|false
     */
    public function getStartTyped()
    {
        return DateTime::createFromFormat(DATE_ISO8601, $this->getStart());
    }

    /**
     * @return DateTime|false
     */
    public function getEndTyped()
    {
        return DateTime::createFromFormat(DATE_ISO8601, $this->getEnd());
    }
}
