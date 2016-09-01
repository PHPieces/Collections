<?php

namespace PHPieces\Collections;

use PHPieces\Collections\Traits\ArrayAccessible;
use PHPieces\Collections\Traits\ObjectAccess;
use Traversable;

class Collection implements \ArrayAccess, \IteratorAggregate
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

    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }
}
