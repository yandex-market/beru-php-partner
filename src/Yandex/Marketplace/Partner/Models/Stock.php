<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class Stock extends Model
{
    protected $type;
    protected $count;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }
}
