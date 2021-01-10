<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class Payment extends Model
{
    const TYPE_PAYMENT = "PAYMENT";
    const TYPE_REFUND = "REFUND";

    const SOURCE_BUYER = "BUYER";
    const SOURCE_CASHBACK = "CASHBACK";
    const SOURCE_MARKETPLACE = "MARKETPLACE";
    const SOURCE_SPASIBO = "SPASIBO";

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
     * @return float
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