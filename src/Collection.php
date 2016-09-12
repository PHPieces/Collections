<?php

namespace PHPieces\Collections;

use PHPieces\Collections\Traits\ArrayAccessible;
use PHPieces\Collections\Traits\Iterable;
use PHPieces\Collections\Traits\ObjectAccess;

class Collection implements \ArrayAccess, \IteratorAggregate
{
    use ObjectAccess, ArrayAccessible, Iterable;

    private $items;

    public function __construct($items = [])
    {
        if (is_array($items)) {
            $this->items = $items;
            return true;
        }

        throw new \Exception('Collection must be given an array in constructor');

    }

    public function map(callable $callback): Collection
    {
        return new static(array_map($callback, $this->items));
    }

    public function filter(callable $callback): Collection
    {
        return new static(array_filter($this->items, $callback));
    }
    
    public function reduce(callable $callback)
    {
        return array_reduce($this->items, $callback);
    }
    
    public function keys(): Collection
    {
        return new static(array_keys($this->items));
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function sum(): float
    {
        return array_sum($this->items);
    }

    public function avg(): float
    {
        return $this->sum() / $this->count();
    }

    public function toJson(): string
    {
        return json_encode($this->items);
    }

    public function toArray(): array
    {
        return $this->items;
    }

    public function reverse(): Collection
    {
        return new static(array_reverse($this->items));
    }

    public function values(): Collection
    {
        return new static(array_values($this->items));
    }

    public function flip(): Collection
    {
        return new static(array_flip($this->items));
    }

    public function has($val): bool
    {
        return $this->offsetExists($val);
    }

    public function random(int $num = null)
    {
        if (is_int($num)) {
            return new static(array_rand($this->items, $num));
        }
        return array_rand($this->items);
    }

    public function unique(): Collection
    {
        return new static(array_unique($this->items));
    }

    public function intersect($other): Collection
    {
        if ($other instanceof Collection) {
            $other = $other->toArray();
        }
        return new static(array_intersect($this->items, $other));
    }

    public function diff($other): Collection
    {
        if ($other instanceof Collection) {
            $other = $other->toArray();
        }
        return new static(array_diff($this->items, $other));
    }
}
