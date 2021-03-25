<?php

namespace Yandex\Marketplace\Partner\Models;

use Yandex\Common\Model;

class Dates extends Model
{

	protected $fromDate;
	protected $toDate;


	/**
	 * @return string
	 */
	public function getFromDate()
	{
		return $this->fromDate;
	}

	/**
	 * @return string
	 */
	public function gettoDate()
	{
		return $this->toDate;
	}

}