<?php

namespace Wimando\LaravelMoodle;

use Assert\Assertion;
use Assert\AssertionFailedException;

class Connection
{

    protected string $url;

    protected string $token;

    /**
     * @throws AssertionFailedException
     */
    public function __construct(string $url, string $token)
    {
        $this->setUrl($url);
        $this->token = $token;
    }

    /**
     * @throws AssertionFailedException
     */
    protected function setUrl(string $url)
    {
        Assertion::url($url);
        $this->url = trim($url, '/');
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getToken(): string
    {
        return $this->token;
    }
}
