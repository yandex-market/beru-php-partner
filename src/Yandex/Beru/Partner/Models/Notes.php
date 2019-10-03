<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class Notes extends ObjectModel
{
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
