<?php

namespace App\Model\User;

class UsersGenerator
{
	public static function generateUsers()
	{

		return array_map(static fn($i) => new User($i, "Name:{$i}"), range(0, 1000000));
	}
}