<?php

namespace Yandex\Marketplace\Partner\Models;

use DateTime;
use Yandex\Common\ObjectModel;

class Document extends ObjectModel
{
    const TYPE_SUPPLY = "SUPPLY";

    protected $id;
    protected $createdAt;
    protected $type;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return DateTime|false
     */
    public function getCreatedAtTyped()
    {
        return DateTime::createFromFormat(DATE_ISO8601, $this->getCreatedAt());
    }
}
