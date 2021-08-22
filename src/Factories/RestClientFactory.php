<?php

namespace Wimando\LaravelMoodle\Factories;

use Illuminate\Support\Facades\App;
use Wimando\LaravelMoodle\Clients\Adapters\RestClient;
use Wimando\LaravelMoodle\Connection;

class RestClientFactory
{
    public function create(Connection $connection): RestClient
    {
        return App::make(RestClient::class, [
            'connection' => $connection
        ]);
    }
}