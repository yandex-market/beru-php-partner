<?php

namespace Yandex\Marketplace\Partner\Models;

use DateTime;
use Yandex\Common\Model;

class Order extends Model
{
    const PAYMENT_TYPE_POSTPAID = "POSTPAID";
    const PAYMENT_TYPE_PREPAID = "PREPAID";

    const PAYMENT_METHOD_CARD_ON_DELIVERY = "CARD_ON_DELIVERY";
    const PAYMENT_METHOD_CASH_ON_DELIVERY = "CASH_ON_DELIVERY";
    const PAYMENT_METHOD_YANDEX = "YANDEX";
    const PAYMENT_APPLE_PAY = "APPLE_PAY";
    const PAYMENT_GOOGLE_PAY = "GOOGLE_PAY";
    const PAYMENT_METHOD_CREDIT = "CREDIT";
    const PAYMENT_METHOD_EXTERNAL_CERTIFICATE = "EXTERNAL_CERTIFICATE";

    const STATUS_CANCELLED = "CANCELLED";
    const STATUS_DELIVERED = "DELIVERED";
    const STATUS_DELIVERY = "DELIVERY";
    const STATUS_PICKUP = "PICKUP";
    const STATUS_PROCESSING = "PROCESSING";

    const SUBSTATUS_STARTED = "STARTED";
    const SUBSTATUS_PROCESSING_EXPIRED = "PROCESSING_EXPIRED";
    const SUBSTATUS_REPLACING_ORDER = "REPLACING_ORDER";
    const SUBSTATUS_RESERVATION_EXPIRED = "RESERVATION_EXPIRED";
    const SUBSTATUS_SHOP_FAILED = "SHOP_FAILED";
    const SUBSTATUS_USER_CHANGED_MIND = "USER_CHANGED_MIND";
    const SUBSTATUS_USER_NOT_PAID = "USER_NOT_PAID";
    const SUBSTATUS_USER_REFUSED_DELIVERY = "USER_REFUSED_DELIVERY";
    const SUBSTATUS_USER_REFUSED_PRODUCT = "USER_REFUSED_PRODUCT";
    const SUBSTATUS_USER_REFUSED_QUALITY = "USER_REFUSED_QUALITY";
    const SUBSTATUS_USER_UNREACHABLE = "USER_UNREACHABLE";

    const SUBSTATUS_READY_TO_SHIP = "READY_TO_SHIP";
    const SUBSTATUS_SHIPPED = "SHIPPED";
    const SUBSTATUS_DELIVERY_SERVICE_UNDELIVERED = "DELIVERY_SERVICE_UNDELIVERED";
    const SUBSTATUS_RESERVATION_FAILED = "RESERVATION_FAILED";

    protected $cancelRequested;
    protected $creationDate;
    protected $currency;
    protected $fake;
    protected $id;
    protected $itemsTotal;
    protected $paymentType;
    protected $paymentMethod;
    protected $status;
    protected $substatus;
    protected $taxSystem;
    protected $total;
    protected $delivery;
    protected $items;
    protected $notes;
    protected $subsidyTotal;
    protected $errorDetails;
    protected $updateStatus;

    protected $mappingClasses = [
        'delivery' => Delivery::class,
        'items' => ItemsOrder::class,
    ];

    /**
     * @return bool
     */
    public function getCancelRequested()
    {
        return $this->cancelRequested;
    }

    /**
     * @return string
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return bool
     */
    public function getFake()
    {
        return $this->fake;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return double
     */
    public function getItemsTotal()
    {
        return $this->itemsTotal;
    }

    /**
     * @return string
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getSubstatus()
    {
        return $this->substatus;
    }

    /**
     * @return string
     */
    public function getTaxSystem()
    {
        return $this->taxSystem;
    }

    /**
     * @return double
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return Delivery
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @return ItemsOrder
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @return int
     */
    public function getSubsidyTotal()
    {
        return $this->subsidyTotal;
    }

    /**
     * @return DateTime|false
     */
    public function getCreationDateType()
    {
        return DateTime::createFromFormat("d-m-Y H:i:s", $this->getCreationDate());
    }

    /**
     * @return string
     */
    public function getErrorDetails()
    {
        return $this->errorDetails;
    }

    /**
     * @return string
     */
    public function getUpdateStatus()
    {
        return $this->updateStatus;
    }
}
