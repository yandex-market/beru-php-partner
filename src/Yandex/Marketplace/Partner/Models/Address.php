<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class Address extends Model
{

	protected $postcode;
	protected $country;
	protected $city;
	protected $subway;
	protected $street;
	protected $house;
	protected $block;
	protected $entrance;
	protected $entryphone;
	protected $floor;
	protected $apartment;
	protected $phone;
	protected $recipient;
	protected $lat;
	protected $lon;


	/**
	 * @return string
	 */
	public function getPostcode()
	{
		return $this->postcode;
	}

	/**
	 * @return string
	 */
	public function getCountry()
	{
		return $this->country;
	}

	/**
	 * @return string
	 */
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * @return string
	 */
	public function getSubway()
	{
		return $this->subway;
	}

	/**
	 * @return string
	 */
	public function getStreet()
	{
		return $this->street;
	}

	/**
	 * @return string
	 */
	public function getHouse()
	{
		return $this->house;
	}

	/**
	 * @return string
	 */
	public function getBlock()
	{
		return $this->block;
	}

	/**
	 * @return string
	 */
	public function getEntrance()
	{
		return $this->entrance;
	}

	/**
	 * @return string
	 */
	public function getEntryphone()
	{
		return $this->entryphone;
	}

	/**
	 * @return string
	 */
	public function getFloor()
	{
		return $this->floor;
	}

	/**
	 * @return string
	 */
	public function getApartment()
	{
		return $this->apartment;
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
	public function getRecipient()
	{
		return $this->recipient;
	}

	/**
	 * @return string
	 */
	public function getLon()
	{
		return $this->lon;
	}

	/**
	 * @return string
	 */
	public function getLat()
	{
		return $this->lat;
	}


}