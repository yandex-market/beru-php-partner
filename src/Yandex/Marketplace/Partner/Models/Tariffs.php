<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class Tariffs extends ObjectModel
{
    /**
     * @param array|object $tariff
     *
     * @return Tariffs
     */
    public function add($tariff)
    {
        if (is_array($tariff)) {
            $this->collection[] = new Tariff($tariff);
        } elseif (is_object($tariff) && $tariff instanceof Tariff) {
            $this->collection[] = $tariff;
        }
        return $this;
    }
    /**
     * Get items
     *
     * @return Tariff[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Tariff
     */
    public function current()
    {
        return parent::current();
    }
}