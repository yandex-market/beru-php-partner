<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class Notes extends ObjectModel
{
    const TYPE_ASSORTMENT = "ASSORTMENT";
    const TYPE_CANCELLED = "CANCELLED";
    const TYPE_CONFLICTING = "CONFLICTING";
    const TYPE_DEPARTMENT_FROZEN = "DEPARTMENT_FROZEN";
    const TYPE_INCORRECT_INFORMATION = "INCORRECT_INFORMATION";
    const TYPE_LEGAL_CONFLICT = "LEGAL_CONFLICT";
    const TYPE_NEED_CLASSIFICATION_INFORMATION = "NEED_CLASSIFICATION_INFORMATION";
    const TYPE_NEED_INFORMATION = "NEED_INFORMATION";
    const TYPE_NEED_PICTURES = "NEED_PICTURES";
    const TYPE_NEED_VENDOR = "NEED_VENDOR";
    const TYPE_NO_PARAMETERS_IN_SHOP_TITLE = "NO_PARAMETERS_IN_SHOP_TITLE";
    const TYPE_NO_SIZE_MEASURE = "NO_SIZE_MEASURE";
    const TYPE_UNKNOWN = "UNKNOWN";

    /**
     * @param array|object $note
     *
     * @return Notes
     */
    public function add($note)
    {
        if (is_array($note)) {
            $this->collection[] = new Note($note);
        } elseif (is_object($note) && $note instanceof Note) {
            $this->collection[] = $note;
        }
        return $this;
    }

    /**
     * Get items
     *
     * @return Note[]
     */
    public function getAll()
    {
        return $this->collection;
    }

    /**
     * @return Note
     */
    public function current()
    {
        return parent::current();
    }
}
