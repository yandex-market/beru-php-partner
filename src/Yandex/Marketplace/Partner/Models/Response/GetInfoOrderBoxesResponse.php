<?php

namespace Yandex\Marketplace\Partner\Models\Response;

use Yandex\Marketplace\Partner\Models\OrderBoxes;
use Yandex\Common\Model;

class GetInfoOrderBoxesResponse extends Model
{
    protected $boxes;
    protected $status;

    public function __construct(array $data = [])
    {
        $status = $data['status'];
        parent::__construct($data['result']);
    }

    protected $mappingClasses = [
        'boxes' => OrderBoxes::class,
    ];

    /**
     * @return OrderBoxes
     */
    public function getBoxes()
    {
        return $this->boxes;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}