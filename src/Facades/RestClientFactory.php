<?php

namespace Wimando\LaravelMoodle\Facades;

use Illuminate\Support\Facades\Facade;
use Wimando\LaravelMoodle\Clients\Adapters\RestClient;
use Wimando\LaravelMoodle\Connection;

/**
 * @method static RestClient create(Connection $connection)
 */
class RestClientFactory extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Wimando\LaravelMoodle\Factories\RestClientFactory::class;
    }
}
