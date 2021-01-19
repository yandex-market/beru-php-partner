<?php

namespace Yandex\Marketplace\Partner\Models;

use DateTime;
use Yandex\Common\Model;

class PaymentOrder extends Model
{
    protected $id;
    protected $date;

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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return DateTime|false
     */
    public function getDateType()
    {
        return DateTime::createFromFormat("d-m-Y H:i:s", $this->getDate());
    }
}
