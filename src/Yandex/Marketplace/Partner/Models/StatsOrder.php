<?php

namespace Yandex\Marketplace\Partner\Models;

use DateTime;
use Yandex\Common\Model;

class StatsOrder extends Model
{
    const STATUS_CANCELLED = "CANCELLED";
    const STATUS_DELIVERED = "DELIVERED";
    const STATUS_DELIVERY = "DELIVERY";
    const STATUS_PICKUP = "PICKUP";
    const STATUS_PROCESSING = "PROCESSING";
    const STATUS_CANCELLED_BEFORE_PROCESSING = "CANCELLED_BEFORE_PROCESSING";
    const STATUS_CANCELLED_IN_DELIVERY = "CANCELLED_IN_DELIVERY";
    const STATUS_CANCELLED_IN_PROCESSING = "CANCELLED_IN_PROCESSING";
    const STATUS_PARTIALLY_RETURNED = "PARTIALLY_RETURNED";
    const STATUS_REJECTED = "REJECTED";
    const STATUS_RETURNED = "RETURNED";
    const STATUS_UNKNOWN = "UNKNOWN";

    const PAYMENT_TYPE_POSTPAID = "POSTPAID";
    const PAYMENT_TYPE_PREPAID = "PREPAID";
    const PAYMENT_TYPE_CREDIT = "CREDIT";

    protected $id;
    protected $creationDate;
    protected $statusUpdateDate;
    protected $status;
    protected $paymentType;
    protected $items;
    protected $deliveryRegion;
    protected $initialItems;
    protected $commissions;
    protected $payments;

    protected $mappingClasses = [
        'deliveryRegion' => DeliveryRegion::class,
        'items' => StatsItemsOrder::class,
        'initialItems' => InitialItems::class,
        'commissions' => Commissions::class,
        'payments' => Payments::class,
    ];

    /**
     * @return string
     */
    public function getStatusUpdateDate()
    {
        return $this->statusUpdateDate;
    }

    /**
     * @return DateTime|false
     */
    public function getStatusUpdateDateType()
    {
        return DateTime::createFromFormat(DATE_ISO8601, $this->getStatusUpdateDate());
    }

    /**
     * @return string
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @return DeliveryRegion
     */
    public function getDeliveryRegion()
    {
        return $this->deliveryRegion;
    }

    /**
     * @return InitialItems
     */
    public function getInitialItems()
    {
        return $this->initialItems;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Commissions
     */
    public function getCommissions()
    {
        return $this->commissions;
    }

    /**
     * @return string
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * @return Payments
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return StatsItemsOrder
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return DateTime|false
     */
    public function getCreationDateType()
    {
        return DateTime::createFromFormat("d-m-Y H:i:s", $this->getCreationDate());
    }
}
