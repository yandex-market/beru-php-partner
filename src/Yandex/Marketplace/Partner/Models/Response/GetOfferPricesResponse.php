<?php

namespace Yandex\Marketplace\Partner\Models\Response;

use Yandex\Marketplace\Partner\Models\Common\Errors;
use Yandex\Marketplace\Partner\Models\OfferPricesResult;
use Yandex\Common\Model;

class GetOfferPricesResponse extends Model
{
    protected $errors;
    protected $result;
    protected $status;

    protected $mappingClasses = [
        'errors' => Errors::class,
        'result' => OfferPricesResult::class,
    ];

    /**
     * @return Errors|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return OfferPricesResult
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
