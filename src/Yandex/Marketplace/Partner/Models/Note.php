<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class Note extends ObjectModel
{
    protected $type;
    protected $payload;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getPayload()
    {
        return $this->payload;
    }
}