<?php

namespace Wimando\LaravelMoodle;

use Assert\Assertion;
use Assert\AssertionFailedException;

class Connection
{
    protected string $url;

    protected string $token;

    protected string $format;

    protected array $options;

    /**
     * @throws AssertionFailedException
     */
    public function __construct(string $url, string $token, $options = [], $format = null)
    {
        $this->setUrl($url);
        $this->token = $token;
        $this->format = $format;
        $this->options = $options;
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

    public function getFormat(): string
    {
        return $this->format;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
