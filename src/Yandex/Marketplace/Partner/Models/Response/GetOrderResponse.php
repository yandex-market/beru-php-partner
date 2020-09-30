<?php

namespace Yandex\Marketplace\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Marketplace\Partner\Models\Order;

class GetOrderResponse extends Model
{
    protected $order;

    protected $mappingClasses = [
        'order' =>  Order::class,
    ];

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }
}