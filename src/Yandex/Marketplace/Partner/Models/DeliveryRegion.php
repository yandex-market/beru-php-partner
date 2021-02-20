<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class DeliveryRegion extends Model
{
    protected $id;
    protected $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
