<?php

namespace Wimando\LaravelMoodle\Clients;

use GuzzleHttp\Client as HttpClient;
use ReflectionClass;
use Wimando\LaravelMoodle\Connection;
use Wimando\LaravelMoodle\Exceptions\ApiException;

abstract class BaseAdapter implements ClientAdapterInterface
{
    const SERVER_SCRIPT_PATH_TEMPLATE = 'webservice/%s/server.php';

    const OPTION_TOKEN = 'wstoken';

    const OPTION_FUNCTION = 'wsfunction';

    const OPTION_FORMAT = 'moodlewsrestformat';

    const RESPONSE_FORMAT_JSON = 'json';

    const RESPONSE_FORMAT_XML = 'xml';

    private Connection $connection;

    protected HttpClient $client;

    /**
     * @return mixed
     */
    abstract protected function buildClient();

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
        $this->client = $this->buildClient();
    }

    protected function getClient(): HttpClient
    {
        return $this->client;
    }

    /**
     * @return Connection
     */
    protected function getConnection(): Connection
    {
        return $this->connection;
    }

    protected function getEndPoint(array $options = []): string
    {
        $url = $this->connection->getUrl() . '/' . $this->getScriptPath();

        return $options ? $url . '?' . http_build_query($options) : $url;
    }

    protected function getScriptPath(): string
    {
        return sprintf(self::SERVER_SCRIPT_PATH_TEMPLATE, $this->getProtocolType());
    }

    protected function getProtocolType(): string
    {
        return $this->recognizeClientType();
    }

    protected function recognizeClientType(): string
    {
        $reflectionClass = new ReflectionClass(static::class);

        return str_replace('client', '', strtolower($reflectionClass->getShortName()));
    }

    /**
     * @throws ApiException
     */
    protected function handleException($response): ?array
    {
        if (!$response) {
            return null;
        }
        if (array_key_exists('exception', $response)) {
            throw new ApiException($response['errorcode'] . ': ' . $response['message']);
        }

        return $response;
    }
}
