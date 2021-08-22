<?php

namespace Wimando\LaravelMoodle;

use Wimando\LaravelMoodle\Clients\Adapters\RestClient;
use Wimando\LaravelMoodle\Facades\ConnectionFactory;
use Wimando\LaravelMoodle\Facades\RestClientFactory;

class RestClientBuilder
{
    public function build(): RestClient
    {
        $connection = ConnectionFactory::create(
            'url',
            'token',
            ['verify' => false],
            RestClient::RESPONSE_FORMAT_JSON);

        return RestClientFactory::create($connection);

    }
}