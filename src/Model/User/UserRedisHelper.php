<?php

namespace App\Model\User;

class UserRedisHelper
{
    public const REDIS_CACHE_KEY = 'REDIS_CACHE_USER_KEYS';

    public static function encodeUserKeys(array $keys): string
    {
        return implode(';', $keys);
    }

    public static function decodeUserKeys(string $keysData): array
    {
        return explode(';', $keysData);
    }
}