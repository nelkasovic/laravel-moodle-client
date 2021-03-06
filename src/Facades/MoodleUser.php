<?php

namespace Wimando\LaravelMoodle\Facades;

use Illuminate\Support\Facades\Facade;
use Wimando\LaravelMoodle\Clients\ClientAdapterInterface;
use Wimando\LaravelMoodle\Resources\UserResourceCollection;
use Wimando\LaravelMoodle\Services\UserService;

/**
 * @method static UserService setClient(ClientAdapterInterface $client)
 * @method static UserResourceCollection search(array $criteria)
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
