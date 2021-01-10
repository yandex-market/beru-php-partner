<?php

namespace Yandex\Marketplace\Partner\Models;

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

}