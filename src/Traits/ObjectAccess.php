<?php

namespace PHPieces\Collections\Traits;

trait ObjectAccess
{
    /**
     * @param $name
     * @return static
     */
    public function __get($name)
    {
        $item = $this->items[$name];

        if (is_array($item)) {
            return new static($item);
        }
        return $item;
    }

    /**
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        $this->items[$key] = $value;
    }
}
