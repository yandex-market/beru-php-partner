<?php

namespace Yandex\Marketplace\Partner\Models\Response;

use Yandex\Marketplace\Partner\Models\Common\Errors;
use Yandex\Marketplace\Partner\Models\DeliveryLabelsDataResult;
use Yandex\Common\Model;

class GetDeliveryLabelsDataResponse extends Model
{
    protected $errors;
    protected $result;
    protected $status;

    protected $mappingClasses = [
        'errors' => Errors::class,
        'result' => DeliveryLabelsDataResult::class,
    ];

    /**
     * @return Errors|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return DeliveryLabelsDataResult
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