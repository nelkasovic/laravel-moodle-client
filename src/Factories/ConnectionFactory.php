<?php

namespace Wimando\LaravelMoodle\Factories;

use Illuminate\Support\Facades\App;
use InvalidArgumentException;
use Wimando\LaravelMoodle\Connection;

class ConnectionFactory
{
    public function create(string $url, string $token, $options = [], $format = null): Connection
    {
        if (!$url) {
            throw new InvalidArgumentException('Required argument baseUrl not defined');
        }

        return App::make(
            Connection::class,
            [
                'url' => $url,
                'token' => $token,
                'format' => $format,
                'options' => $options
            ]
        );
    }

}