<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class UpdateOrdersStatusesResult extends Model
{
    protected $orders;

    protected $mappingClasses = [
        'orders' => Orders::class,
    ];

    /**
     * @return Orders
     */
    public function getOrders()
    {
        return $this->orders;
    }
}