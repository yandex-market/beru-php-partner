<?php

namespace Yandex\Marketplace\Partner\Models;

use DateTime;
use Yandex\Common\Model;

class StatsOrder extends Model
{
    protected $id;
    protected $creationDate;
    protected $status;
    protected $statusUpdateDate;
    protected $partnerOrderId;
    protected $paymentType;
    protected $deliveryRegion;
    protected $items;
    protected $payments;
    protected $commissions;

    protected $mappingClasses = [
        'deliveryRegion' => Region::class,
        'commissions' => Commissions::class,
        'payments' => Payments::class,
        'items' => StatsItemsOrder::class,
    ];

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
    public function getCreationDate()
    {
        return $this->creationDate;
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getStatusUpdateDate()
    {
        return $this->statusUpdateDate;
    }

    /**
     * @return string
     */
    public function getPartnerOrderId()
    {
        return $this->partnerOrderId;
    }

    /**
     * @return string
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * @return Region
     */
    public function getDeliveryRegion()
    {
        return $this->deliveryRegion;
    }

    /**
     * @return Commissions
     */
    public function getCommissions()
    {
        return $this->commissions;
    }

    /**
     * @return Payments
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @return StatsItemsOrder
     */
    public function getItems()
    {
        return $this->items;
    }

}