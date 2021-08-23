<?php

namespace Wimando\LaravelMoodle\Services;

use ReflectionClass;
use Wimando\LaravelMoodle\Clients\ClientAdapterInterface;
use Wimando\LaravelMoodle\Entities\Entity;

abstract class Service
{

    private ClientAdapterInterface $client;

    public function setClient(ClientAdapterInterface $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getAlias(): string
    {
        $reflectionClass = new ReflectionClass(static::class);

        return strtolower($reflectionClass->getShortName());
    }

    protected function prepareEntityForSending(Entity ...$entities): array
    {
        $convertedEntities = [];

        foreach ($entities as $entity) {
            $filledData = [];
            $entityData = $entity->toArray();
            foreach ($entityData as $property => $value) {
                if (!empty($value)) {
                    $filledData[strtolower($property)] = $value;
                }
            }

            $convertedEntities[] = $filledData;
        }

        return $convertedEntities;
    }

    final protected function sendRequest(string $function, array $arguments = []): array
    {
        $response = $this->client->sendRequest($function, $arguments);

        return (array)$response;
    }
}
