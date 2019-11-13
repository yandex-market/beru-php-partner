<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\ObjectModel;

class ProcessingState extends ObjectModel
{
    const STATUS_READY = "READY";
    const STATUS_IN_WORK = "IN_WORK";
    const STATUS_NEED_INFO = "NEED_INFO";
    const STATUS_REJECTED = "REJECTED";
    const STATUS_SUSPENDED = "SUSPENDED";
    const STATUS_OTHER = "OTHER";

    protected $status;
    protected $notes;

    protected $mappingClasses = [
        'notes' => Notes::class,
    ];

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return  Notes|null
     */
    public function getNotes()
    {
        return $this->notes;
    }
}
