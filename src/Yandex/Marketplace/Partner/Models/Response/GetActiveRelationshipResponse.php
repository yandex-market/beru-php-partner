<?php

namespace Yandex\Marketplace\Partner\Models\Response;

use Yandex\Marketplace\Partner\Models\ActiveRelationshipResult;
use Yandex\Marketplace\Partner\Models\Common\Errors;
use Yandex\Common\Model;

class GetActiveRelationshipResponse extends Model
{
    protected $errors;
    protected $result;
    protected $status;

    protected $mappingClasses = [
        'errors' => Errors::class,
        'result' => ActiveRelationshipResult::class,
    ];

    /**
     * @return Errors|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return ActiveRelationshipResult
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}