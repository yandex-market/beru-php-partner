<?php

namespace Yandex\Marketplace\Partner\Models\Response;

use Yandex\Common\Model;
use Yandex\Marketplace\Partner\Models\Common\Errors;
use Yandex\Marketplace\Partner\Models\StatsOrdersResult;

class GetStatsByOrdersResponse extends Model
{
    protected $errors;
    protected $result;
    protected $status;

    protected $mappingClasses = [
        'errors' => Errors::class,
        'result' => StatsOrdersResult::class,
    ];

    /**
     * @return Errors|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return StatsOrdersResult
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
