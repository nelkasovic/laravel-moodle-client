<?php

namespace Wimando\LaravelMoodle\Clients;

interface ClientAdapterInterface
{
    /**
     * @return mixed
     */
    public function sendRequest(string $function, array $arguments = []);
}
