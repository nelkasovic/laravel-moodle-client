<?php

namespace Wimando\LaravelMoodle\Facades;

use Illuminate\Support\Facades\Facade;
use Wimando\LaravelMoodle\Connection;

/**
 * @method static Connection create(string $url, string $token, $options = [], $format = null)
 */
class ConnectionFactory extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Wimando\LaravelMoodle\Factories\ConnectionFactory::class;
    }
}
