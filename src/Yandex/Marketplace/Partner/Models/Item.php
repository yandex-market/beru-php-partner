<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class Item extends Model
{
    protected $count;
    protected $id;
    protected $offerId;
    protected $feedId;

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getOfferId()
    {
        return $this->offerId;
    }

    /**
     * @return int
     */
    public function getFeedId()
    {
        return $this->feedId;
    }
}
