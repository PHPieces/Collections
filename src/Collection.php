<?php

namespace PHPieces\Collections;

use PHPieces\Collections\Traits\ArrayAccessible;
use PHPieces\Collections\Traits\ObjectAccess;

class Collection implements \ArrayAccess
{
    use ObjectAccess, ArrayAccessible;

    private $items;

    public function __construct($items = [])
    {
        $this->items = $items;
    }

    public function map(callable $callback)
    {
        return new static(array_map($callback, $this->items));
    }

    public function filter(callable $callback)
    {
        return new static(array_filter($this->items, $callback));
    }
    
    public function reduce(callable $callback)
    {
        return array_reduce($this->items, $callback);
    }
    
    public function keys()
    {
        return new static(array_keys($this->items));
    }

    public function count()
    {
        return count($this->items);
    }

    public function sum()
    {
        return array_sum($this->items);
    }

    public function avg()
    {
        return $this->sum() / $this->count();
    }

    public function toJson()
    {
        return json_encode($this->items);
    }

    public function toArray()
    {
        return $this->items;
    }
}
