<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class Commissions extends ObjectModel
{
    /**
     * @param array|object $commission
     *
     * @return Commissions
     */
    public function add($commission)
    {
        if (is_array($commission)) {
            $this->collection[] = new Commission($commission);
        } elseif (is_object($commission) && $commission instanceof Commission) {
            $this->collection[] = $commission;
        }
        return $this;
    }
    /**
     * Get items
     *
     * @return Commission[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Commission
     */
    public function current()
    {
        return parent::current();
    }
}