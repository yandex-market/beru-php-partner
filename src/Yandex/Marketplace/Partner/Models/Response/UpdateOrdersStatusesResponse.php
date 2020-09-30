<?php

namespace Yandex\Marketplace\Partner\Models\Response;

use Yandex\Marketplace\Partner\Models\Common\Errors;
use Yandex\Marketplace\Partner\Models\UpdateOrdersStatusesResult;
use Yandex\Common\Model;

class UpdateOrdersStatusesResponse extends Model
{
    protected $errors;
    protected $status;
    protected $result;

    protected $mappingClasses = [
        'errors' => Errors::class,
        'result' => UpdateOrdersStatusesResult::class,
    ];

    /**
     * @return Errors|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return UpdateOrdersStatusesResult
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