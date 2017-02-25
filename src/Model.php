<?php

namespace PHPieces\Collections;

use PHPieces\Collections\exceptions\UndefinedPropertyException;
use ReflectionClass;

/**
 * When extender, this class gives you getters and setters on all
 * protected properties and prevents dynamic creation of attributes.
 *
 * Class Model
 * @package PHPieces\Collections
 */
class Model
{
    /**
    * @var \ReflectionClass
    */
    private $reflection;


    /**
     * @var \ReflectionProperty[]
     */
    private $props;

    /**
     * @var \ReflectionMethod[]
     */
    private $methods;

    /**
     * Basic constructor.
     */
    public function __construct()
    {
        $this->reflection = new \ReflectionClass(static::class);
        
        $this->props = $this->reflection->getProperties(
            \ReflectionProperty::IS_PRIVATE | \ReflectionProperty::IS_PROTECTED
        );
        
        $this->methods = $this->reflection->getMethods();
    }

    /**
     * @param string $name
     */
    public function __get(string $name)
    {
        if (!$this->hasProperty($name)) {
            return null;
        }
        
        if ($method = $this->hasGetter($name)) {
            return $this->$method();
        }
        
        return $this->$name;
    }

    /**
     * @param string $name
     * @param $value
     * @return mixed
     * @throws UndefinedPropertyException
     */
    public function __set(string $name, $value)
    {
        if ($method = $this->hasSetter($name)) {
            return $this->$method($value);
        }
        if ($this->hasProperty($name)) {
            return $this->$name = $value;
        }
        throw new UndefinedPropertyException();
    }

    /**
     * @param $name
     * @return bool
     */
    private function hasProperty($name)
    {
        $props = array_filter($this->props, function ($prop) use ($name) {
            return $prop->name === $name;
        });
        return count($props) > 0;
    }

    /**
     * @param $name
     * @return mixed
     */
    private function hasGetter($name)
    {
        $name = ucfirst($name);
        $funcName = "get$name";
        return $this->hasMethod($funcName);
    }

    /**
     * @param $name
     * @return mixed
     */
    private function hasSetter($name)
    {
        $name = ucfirst($name);
        $funcName = "set$name";
        return $this->hasMethod($funcName);
    }

    /**
     * @param $name
     * @return mixed
     */
    private function hasMethod($name)
    {
        foreach ($this->methods as $method) {
            if ($name === $method->name) {
                return $method->name;
            }
        }
    }
}
