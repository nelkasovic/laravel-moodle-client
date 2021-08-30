<?php

namespace Wimando\LaravelMoodle\Facades;

use Illuminate\Support\Facades\Facade;
use Wimando\LaravelMoodle\Resources\UserResourceCollection;

/**
 * @method static UserResourceCollection getAll()
 * @method static UserResourceCollection getByField(string $field, array $values = [])
 * @method static UserResourceCollection updateUsers(array $usersWithData)
 */
class MoodleUser extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Wimando\LaravelMoodle\Services\UserService::class;
    }
}
