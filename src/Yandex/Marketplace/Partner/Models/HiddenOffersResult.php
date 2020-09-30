<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class HiddenOffersResult extends Model
{
    protected $total;
    protected $paging;
    protected $hiddenOffers;

    protected $mappingClasses = [
        'hiddenOffers' => HiddenOffers::class
    ];

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

    /**
     * @return HiddenOffers|null
     */
    public function getHiddenOffers()
    {
        return $this->hiddenOffers;
    }
}