<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class StorageType extends Model
{
    protected $type;
    protected $count;
    protected $inclusions;

    protected $mappingClasses = [
        'inclusions' => Inclusions::class,
    ];

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return Inclusions
     */
    public function getInclusions()
    {
        return $this->inclusions;
    }
}
