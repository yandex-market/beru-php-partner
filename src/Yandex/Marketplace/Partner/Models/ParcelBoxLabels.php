<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class ParcelBoxLabels extends ObjectModel
{
    /**
     * @param array|object $parcelBoxLabel
     *
     * @return ParcelBoxLabels
     */
    public function add($parcelBoxLabel)
    {
        if (is_array($parcelBoxLabel)) {
            $this->collection[] = new ParcelBoxLabel($parcelBoxLabel);
        } elseif (is_object($parcelBoxLabel) && $parcelBoxLabel instanceof ParcelBoxLabel) {
            $this->collection[] = $parcelBoxLabel;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return ParcelBoxLabel[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return ParcelBoxLabel
     */
    public function current()
    {
        return parent::current();
    }
}