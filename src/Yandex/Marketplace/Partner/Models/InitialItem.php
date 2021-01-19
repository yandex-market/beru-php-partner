<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class InitialItem extends Model
{
    protected $offerName;
    protected $marketSku;
    protected $shopSku;
    protected $initialCount;

    /**
     * @return string
     */
    public function getOfferName()
    {
        return $this->offerName;
    }

    /**
     * @return int
     */
    public function getMarketSku()
    {
        return $this->marketSku;
    }

    /**
     * @return string
     */
    public function getShopSku()
    {
        return $this->shopSku;
    }

    /**
     * @return int
     */
    public function getInitialCount()
    {
        return $this->initialCount;
    }
}
