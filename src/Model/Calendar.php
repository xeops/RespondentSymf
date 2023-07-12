<?php

namespace App\Model;

class Calendar
{
	private \DateTime $dateTime;

	public function __construct(\DateTime $dateTime)
	{
		$this->dateTime = $dateTime;
	}

	/**
	 * @return \DateTime
	 */
	public function getDateTime(): \DateTime
	{
		return $this->dateTime;
	}
}