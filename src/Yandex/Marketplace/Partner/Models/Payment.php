<?php

namespace Yandex\Marketplace\Partner\Models;

use DateTime;
use Yandex\Common\Model;

class Payment extends Model
{
    protected $id;
    protected $date;
    protected $type;
    protected $source;
    protected $total;
    protected $paymentOrder;

    protected $mappingClasses = [
        'paymentOrder' => PaymentOrder::class,
    ];

    /**
     * @return string
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

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return double
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return PaymentOrder
     */
    public function getPaymentOrder()
    {
        return $this->paymentOrder;
    }

}
