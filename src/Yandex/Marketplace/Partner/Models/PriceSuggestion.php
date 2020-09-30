<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class PriceSuggestion extends Model
{
    const TYPE_DEFAULT_OFFER = "DEFAULT_OFFER";
    const TYPE_BUYBOX = "BUYBOX";
    const TYPE_MIN_PRICE_MARKET = "MIN_PRICE_MARKET";
    const TYPE_MAX_DISCOUNT_BASE = "MAX_DISCOUNT_BASE";
    const TYPE_MARKET_OUTLIER_PRICE = "MARKET_OUTLIER_PRICE";

    protected $type;
    protected $price;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }
}
