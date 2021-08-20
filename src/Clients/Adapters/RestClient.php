<?php

namespace Wimando\LaravelMoodle\Clients\Adapters;

use Assert\Assertion;
use Assert\AssertionFailedException;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use Wimando\LaravelMoodle\Clients\BaseAdapter;
use Wimando\LaravelMoodle\Connection;
use Wimando\LaravelMoodle\Exceptions\ApiException;

/**
 * @method HttpClient getClient()
 */
class RestClient extends BaseAdapter
{

    const OPTION_FORMAT = 'moodlewsrestformat';

    const RESPONSE_FORMAT_JSON = 'json';

    const RESPONSE_FORMAT_XML = 'xml';

    protected string $responseFormat;

    protected Connection $connection;

    /**
     * @throws AssertionFailedException
     */
    public function __construct(string $url, string $token, string $format = 'json')
    {
        $this->setResponseFormat($format);
        $this->setConnection($url, $token);

        parent::__construct($this->getConnection());
    }

    /**
     * @return array|null
     * @throws ApiException|GuzzleException
     */
    public function sendRequest(string $function, array $arguments = []): ?array
    {
        $configuration = [
            self::OPTION_FUNCTION => $function,
            self::OPTION_FORMAT => $this->responseFormat,
            self::OPTION_TOKEN => $this->getConnection()->getToken(),
        ];

        $response = $this->getClient()->post('', [
            'form_params' => array_merge($configuration, $arguments)
        ]);

        $formattedResponse = $this->responseFormat === self::RESPONSE_FORMAT_JSON ?
            json_decode($response->getBody(), true) :
            simplexml_load_string($response->getBody());

        return $this->handleException($formattedResponse);

    }

    protected function buildClient(array $options = []): HttpClient
    {
        return new HttpClient(
            array_merge(
                $options,
                [
                    'base_url' => $this->getEndPoint(),
                    'base_uri' => $this->getEndPoint()
                ]
            )
        );
    }

    /**
     * @throws AssertionFailedException
     */
    protected function setResponseFormat(string $format)
    {
        Assertion::inArray($format, [self::RESPONSE_FORMAT_JSON, self::RESPONSE_FORMAT_XML]);
        $this->responseFormat = $format;
    }

    protected function getConnection(): Connection
    {
        return $this->connection;
    }

    /**
     * @throws AssertionFailedException
     */
    protected function setConnection(string $url, string $token)
    {
        $this->connection = new Connection($url, $token);
    }
}
