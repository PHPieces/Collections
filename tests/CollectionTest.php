<?php

use PHPieces\Collections\Collection;

class CollectionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_has_map_function()
    {
        $collection = new Collection(array(1,2,3,4));

        $result = $collection->map(function($x){ return $x * 2; });

        $this->assertEquals(array(2,4,6,8), $result->toArray());
    }

    /**
     * @test
     */
    public function it_filters_array()
    {
        $collection = new Collection(array(1,2,3,4));

        $result = $collection->filter(function($x) { return $x > 2; });

        $this->assertEquals(array(3,4), array_values($result->toArray()));
    }

    /**
     * @test
     */
    public function it_reduces_array()
    {
        $collection = new Collection(array(1,2,3,4));

        $result = $collection->reduce(function($carry, $item) {
            $carry += $item;
            return $carry;
        });

        $this->assertEquals(10, $result);
    }

    /**
     * @test
     */
    public function it_gets_keys()
    {
        $collection = new Collection(array('foo' => 1, 'bar' => 2));

        $result = $collection->keys();

        $this->assertEquals(array('foo', 'bar'), $result->toArray());
    }

    /**
     * @test
     */
    public function it_gets_count()
    {
        $collection = new Collection(array(1,2,3,4));
        
        $result = $collection->count();
        
        $this->assertEquals(4, $result);
    }

    /**
     * @test
     */
    public function it_gets_average()
    {
        $collection = new Collection(array(1,2,3,4));

        $result = $collection->avg();

        $this->assertEquals(2.5, $result);
    }

    /**
     * @test
     */
    public function it_has_object_property_access()
    {
        $collection = new Collection(array('foo' => 1, 'bar' => 2));

        $this->assertEquals(1, $collection->foo);

        $collection->foo = 27;

        $this->assertEquals(27, $collection->foo);
    }

    /**
     * @test
     */
    public function it_converts_to_json()
    {
        $collection = new Collection(array('foo' => 'bar', 'baz' => 'bam'));

        $result = $collection->toJson();

        $this->assertJsonStringEqualsJsonString(json_encode(array('foo' => 'bar', 'baz' => 'bam')), $result);
    }

    /**
     * @test
     */
    public function it_implements_ArrayAccess_interface()
    {
        $collection = new Collection(array(1, 2, 3, 4));

        $this->assertTrue($collection instanceof ArrayAccess);
        
        $this->assertEquals(1, $collection[0]);
        
        $collection[0] = 5;
        
        $this->assertEquals(5, $collection[0]);
    }
    
}