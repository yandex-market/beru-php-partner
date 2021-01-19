<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class Commission extends Model
{
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
     * @return double
     */
    public function getActual()
    {
        return $this->actual;
    }

    /**
     * @return double
     */
    public function getPredicted()
    {
        return $this->predicted;
    }
}
