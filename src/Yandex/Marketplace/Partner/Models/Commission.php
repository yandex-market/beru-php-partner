<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class Commission extends Model
{
    const TYPE_AGENCY = "AGENCY";
    const TYPE_FEE = "FEE";

    protected $type;
    protected $actual;
    protected $predicted;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return float
     */
    public function getActual()
    {
        return $this->actual;
    }

    /**
     * @return float
     */
    public function getPredicted()
    {
        return $this->predicted;
    }

}