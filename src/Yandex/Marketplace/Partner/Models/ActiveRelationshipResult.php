<?php

namespace Yandex\Marketplace\Partner\Models;


use Yandex\Common\Model;

class ActiveRelationshipResult extends Model
{
    protected $offerMappingEntries;
    protected $paging;

    protected $mappingClasses = [
        'offerMappingEntries' => ActiveRelationship::class,
    ];

    /**
     * @return ActiveRelationship
     */
    public function getOfferMappingEntries()
    {
        return $this->offerMappingEntries;
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