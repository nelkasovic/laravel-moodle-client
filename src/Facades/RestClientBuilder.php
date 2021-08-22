<?php

namespace Wimando\LaravelMoodle\Facades;

use Illuminate\Support\Facades\Facade;
use Wimando\LaravelMoodle\Clients\Adapters\RestClient;

/**
 * @method static RestClient build(string $url, string $token)
 */
class RestClientBuilder extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Wimando\LaravelMoodle\RestClientBuilder::class;
    }
}
