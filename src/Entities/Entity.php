<?php

namespace Wimando\LaravelMoodle\Entities;

abstract class Entity
{
    public function __construct(array $data = [])
    {
        $this->fill($data);
    }

    public function fill(array $data): Entity
    {
        if (!empty($data)) {
            $properties = $this->getProperties();
            foreach ($properties as $property => $value) {
                $incomingProperty = strtolower($property);
                if (array_key_exists($incomingProperty, $data)) {
                    $this->{$property} = $data[$incomingProperty];
                }
            }
        }

        return $this;
    }

    public function getProperties(): array
    {
        return get_object_vars($this);
    }

    public function toArray(): array
    {
        return (array)$this;
    }
}
