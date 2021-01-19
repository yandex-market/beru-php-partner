<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class Hiding extends Model
{
    protected $type;
    protected $code;
    protected $message;
    protected $comment;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
}
