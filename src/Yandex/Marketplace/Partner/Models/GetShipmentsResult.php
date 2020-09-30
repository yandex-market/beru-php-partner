<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class GetShipmentsResult  extends Model
{
    protected $requests;
    protected $paging;
    protected $total;

    protected $mappingClasses = [
        'requests' => Requests::class,
    ];

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return Requests
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * @return mixed
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