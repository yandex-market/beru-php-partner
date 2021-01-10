<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class StatsSkusResult extends Model
{
    protected $shopSkus;

    protected $mappingClasses = [
        'shopSkus' => ShopSkus::class,
    ];

    /**
     * @return ShopSkus
     */
    public function getShopSkus()
    {
        return $this->shopSkus;
    }

}