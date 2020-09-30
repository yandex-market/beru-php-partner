<?php


namespace Yandex\Marketplace\Partner\Models;


use Yandex\Common\Model;

class RecommendedRelationshipResult extends Model
{
    protected $offers;

    protected $mappingClasses = [
        'offers' => RecommendedRelationship::class,
    ];

    /**
     * @return RecommendedRelationship
     */
    public function getOffers()
    {
        return $this->offers;
    }

}