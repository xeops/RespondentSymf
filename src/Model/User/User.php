<?php

namespace App\Model\User;

class User
{
	private int $id;
	private string $name;

	/**
	 * @param int $id
	 * @param string $name
	 */
	public function __construct(int $id, string $name)
	{
		$this->id = $id;
		$this->name = $name;
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}
}