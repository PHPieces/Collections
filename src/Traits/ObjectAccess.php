<?php

namespace PHPieces\Collections\Traits;

trait ObjectAccess
{
    public function __get($name)
    {
        $item = $this->items[$name];

        if (is_array($item)) {
            return new static($item);
        }
        return $item;
    }

    public function __set($key, $value)
    {
        $this->items[$key] = $value;
    }
}
