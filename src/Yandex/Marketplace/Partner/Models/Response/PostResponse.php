<?php

namespace Yandex\Marketplace\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Marketplace\Partner\Models\Common\Errors;

class PostResponse extends Model
{
    const RESPONSE_STATUS_OK = "OK";
    const RESPONSE_STATUS_ERROR = "Error";

    protected $errors;
    protected $status;
    protected $result;

    protected $mappingClasses = [
        'errors' => Errors::class,
    ];

    /**
     * @return Errors|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return array|null
     */
    public function getResult()
    {
        return $this->result;
    }
}
