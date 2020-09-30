<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class RecommendedPricesResult extends Model
{
    protected $offers;

    protected $mappingClasses = [
        'offers' => RecommendedPrices::class,
    ];

    /**
     * @return RecommendedPrices
     */
    public function getOffers()
    {
        return $this->offers;
    }
}