<?php

namespace Yandex\Marketplace\Partner\Models\Response;

use Yandex\Marketplace\Partner\Models\Common\Errors;
use Yandex\Marketplace\Partner\Models\StatsOrdersResult;

class GetStatsOrdersResponse extends PostResponse
{
    protected $errors;
    protected $result;

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

}