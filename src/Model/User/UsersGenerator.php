<?php

namespace App\Model\User;

class UsersGenerator
{
	public static function generateUsers(int $count)
	{
		return array_map(static fn($i) => new User($i, "Name:{$i}"), range(0, $count));
	}
}