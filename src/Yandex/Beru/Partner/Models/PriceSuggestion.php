<?php

namespace Yandex\Beru\Partner\Models;

use Yandex\Common\Model;

class PriceSuggestion extends Model
{
    const TYPE_DEFAULT_OFFER = "DEFAULT_OFFER";
    const TYPE_BUYBOX = "BUYBOX";
    const TYPE_MIN_PRICE_MARKET = "MIN_PRICE_MARKET";
    const TYPE_PROMO = "PROMO";
    const TYPE_MAX_DISCOUNT_BASE = "MAX_DISCOUNT_BASE";
    const TYPE_MARKET_OUTLIER_PRICE = "MARKET_OUTLIER_PRICE";

    protected $type;
    protected $price;
    protected $period;

    protected $mappingClasses = [
        'period' => Period::class,
    ];

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

    /**
     * @return Period|null
     */
    public function getPeriod()
    {
        return $this->period;
    }
}
