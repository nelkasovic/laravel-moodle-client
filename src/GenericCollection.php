<?php

namespace Wimando\LaravelMoodle;

use ArrayIterator;
use IteratorAggregate;

abstract class GenericCollection implements IteratorAggregate
{

    protected array $items;

    public function toArray(): array
    {
        return $this->items;
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }
}
