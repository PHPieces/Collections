<?php

namespace PHPieces\Collections\Traits;

trait ObjectAccess
{
    public function __get($name)
    {
        return $this->items[$name];
    }

    public function __set($key, $value)
    {
        $this->items[$key] = $value;
    }
}