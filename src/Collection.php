<?php

namespace PHPieces\Collections;

use PHPieces\Collections\Traits\ArrayAccessible;
use PHPieces\Collections\Traits\IterationTrait;
use PHPieces\Collections\Traits\ObjectAccess;

class Collection implements \ArrayAccess, \IteratorAggregate
{
    use ObjectAccess, ArrayAccessible, IterationTrait;

    private $items;


    public function __construct($items = [])
    {
        if (is_array($items)) {
            $this->items = $items;
            return true;
        }

        throw new \Exception('Collection must be given an array in constructor');
    }

    /**
     * Applies the callback to the elements of the collection
     * callback arguments item: $item
     *
     * @param callable $callback
     * @return Collection
     */
    public function map(callable $callback): Collection
    {
        return new static(array_map($callback, $this->items));
    }

    /**
     * Iterates over each value in the <b>array</b>
     * passing them to the <b>callback</b> function.
     * If the <b>callback</b> function returns true, the
     * current value from <b>array</b> is returned into
     * the result array. Array keys are preserved.
     *
     * @param callable $callback
     * @return Collection
     */
    public function filter(callable $callback): Collection
    {
        return new static(array_filter($this->items, $callback));
    }

    /**
     * Iteratively reduce the array to a single value using a callback function
     *
     * @param  mixed callback ( mixed $carry , mixed $item ) $callback
     * @param $initial
     * @return mixed
     */
    public function reduce(callable $callback, $initial)
    {
        return array_reduce($this->items, $callback, $initial);
    }

    /**
     * Return all the keys of the collection
     * 
     * @return Collection
     */
    public function keys(): Collection
    {
        return new static(array_keys($this->items));
    }

    /**
     * Count the items in a collection
     * 
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * get the sum of all items in a collection
     * 
     * @return float
     */
    public function sum(): float
    {
        return array_sum($this->items);
    }

    /**
     * get the average of a collection
     * 
     * @return float
     */
    public function avg(): float
    {
        return $this->sum() / $this->count();
    }

    /**
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->items);
    }

    /**
     * Convert collection to plain array
     * @return array
     */
    public function toArray(): array
    {
        return $this->items;
    }

    /**
     * @return Collection
     */
    public function reverse(): Collection
    {
        return new static(array_reverse($this->items));
    }

    /**
     * @return Collection
     */
    public function values(): Collection
    {
        return new static(array_values($this->items));
    }

    /**
     * @return Collection
     */
    public function flip(): Collection
    {
        return new static(array_flip($this->items));
    }

    /**
     * @param $val
     * @return bool
     */
    public function has($val): bool
    {
        return $this->offsetExists($val);
    }

    /**
     * @param int|null $num
     * @return static
     */
    public function random(int $num = null)
    {
        if (is_int($num)) {
            return new static(array_rand($this->items, $num));
        }
        return array_rand($this->items);
    }

    /**
     * @return Collection
     */
    public function unique(): Collection
    {
        return new static(array_unique($this->items));
    }

    /**
     * @param $other
     * @return Collection
     */
    public function intersect($other): Collection
    {
        if ($other instanceof Collection) {
            $other = $other->toArray();
        }
        return new static(array_intersect($this->items, $other));
    }

    /**
     * @param $other
     * @return Collection
     */
    public function diff($other): Collection
    {
        if ($other instanceof Collection) {
            $other = $other->toArray();
        }
        return new static(array_diff($this->items, $other));
    }

    /**
     * @param $size
     * @return Collection
     */
    public function chunk($size): Collection
    {
        return new static(array_chunk($this->items, $size));
    }
}
