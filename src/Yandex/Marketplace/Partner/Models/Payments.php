<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class Payments extends ObjectModel
{
    /**
     * @param array|object $payment
     *
     * @return Payments
     */
    public function add($payment)
    {
        if (is_array($payment)) {
            $this->collection[] = new Payment($payment);
        } elseif (is_object($payment) && $payment instanceof Payment) {
            $this->collection[] = $payment;
        }
        return $this;
    }
    /**
     * Get items
     *
     * @return Payment[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Payment
     */
    public function current()
    {
        return parent::current();
    }
}