<?php

namespace Wimando\LaravelMoodle\Clients\Adapters;

use SoapClient as BaseSoapClient;
use SoapFault;
use Wimando\LaravelMoodle\Clients\BaseAdapter;
use Wimando\LaravelMoodle\Exceptions\ApiException;

/**
 * @method BaseSoapClient getClient()
 */
class SoapClient extends BaseAdapter
{
    const OPTION_WSDL = 'wsdl';

    /**
     * @return mixed
     * @throws ApiException
     */
    public function sendRequest(string $function, array $arguments = [])
    {
        $response = $this->getClient()->__soapCall($function, $arguments);

        $this->handleException($response);

        return $response;
    }

    /**
     * Build client instance
     * @return BaseSoapClient
     * @throws SoapFault
     */
    protected function buildClient(): BaseSoapClient
    {
        $endPoint = $this->getEndPoint([
            self::OPTION_WSDL => 1,
            self::OPTION_TOKEN => $this->getConnection()->getToken(),
        ]);

        return new BaseSoapClient($endPoint);
    }
}
