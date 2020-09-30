<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class OfferPricesResult extends Model
{
    protected $total;
    protected $offers;
    protected $paging;

    protected $mappingClasses = [
        'offers' => OfferPrices::class,
    ];

    /**
     * @return OfferPrices
     */
    public function getOffers()
    {
        return $this->offers;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return string|null
     */
    public function getNextPageToken()
    {
        if (isset($this->paging['nextPageToken'])) {
            return $this->paging['nextPageToken'];
        }
        return null;
    }

    /**
     * @return string|null
     */
    public function getPrevPageToken()
    {
        if (isset($this->paging['prevPageToken'])) {
            return $this->paging['prevPageToken'];
        }
        return null;
    }
}