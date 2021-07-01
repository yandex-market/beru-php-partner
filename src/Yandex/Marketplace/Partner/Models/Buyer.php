<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class Buyer extends Model
{

    protected $id;
    protected $lastName;
    protected $firstName;
    protected $phone;
    protected $uid;


    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }


    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }


    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }


    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }
}
