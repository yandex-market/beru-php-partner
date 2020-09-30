<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\ObjectModel;

class WeightDimensions extends ObjectModel
{
    protected $length;
    protected $width;
    protected $height;
    protected $weight;

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }
}