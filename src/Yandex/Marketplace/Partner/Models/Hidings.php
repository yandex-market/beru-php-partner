<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class Hidings extends ObjectModel
{
    /**
     * @param array|object $hiding
     *
     * @return Hidings
     */
    public function add($hiding)
    {
        if (is_array($hiding)) {
            $this->collection[] = new Hiding($hiding);
        } elseif (is_object($hiding) && $hiding instanceof Hiding) {
            $this->collection[] = $hiding;
        }
        return $this;
    }
    /**
     * Get items
     *
     * @return Hiding[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Hiding
     */
    public function current()
    {
        return parent::current();
    }
}