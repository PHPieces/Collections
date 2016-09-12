<?php

use PHPieces\Collections\Collection;

class CollectionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_has_map_function()
    {
        $collection = new Collection([1,2,3,4]);

        $result = $collection->map(function($x){ return $x * 2; });

        $this->assertEquals([2,4,6,8], $result->toArray());
    }

    /**
     * @test
     */
    public function it_filters_array()
    {
        $collection = new Collection([1,2,3,4]);

        $result = $collection->filter(function($x) { return $x > 2; });

        $this->assertEquals([3,4], array_values($result->toArray()));
    }

    /**
     * @test
     */
    public function it_reduces_array()
    {
        $collection = new Collection([1,2,3,4]);

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
        $collection = new Collection(['foo' => 1, 'bar' => 2]);

        $result = $collection->keys();

        $this->assertEquals(['foo', 'bar'], $result->toArray());
    }

    /**
     * @test
     */
    public function it_gets_count()
    {
        $collection = new Collection([1,2,3,4]);
        
        $result = $collection->count();
        
        $this->assertEquals(4, $result);
    }

    /**
     * @test
     */
    public function it_gets_average()
    {
        $collection = new Collection([1,2,3,4]);

        $result = $collection->avg();

        $this->assertEquals(2.5, $result);
    }

    /**
     * @test
     */
    public function it_has_object_property_access()
    {
        $collection = new Collection(['foo' => 1, 'bar' => 2]);

        $this->assertEquals(1, $collection->foo);

        $collection->foo = 27;

        $this->assertEquals(27, $collection->foo);
    }

    /**
     * @test
     */
    public function it_converts_to_json()
    {
        $collection = new Collection(['foo' => 'bar', 'baz' => 'bam']);

        $result = $collection->toJson();

        $this->assertJsonStringEqualsJsonString(json_encode(['foo' => 'bar', 'baz' => 'bam']), $result);
    }

    /**
     * @test
     */
    public function it_implements_ArrayAccess_interface()
    {
        $collection = new Collection([1, 2, 3, 4]);

        $this->assertTrue($collection instanceof ArrayAccess);
        
        $this->assertEquals(1, $collection[0]);
        
        $collection[0] = 5;
        
        $this->assertEquals(5, $collection[0]);
    }

    /**
     * @test
     */
    public function it_is_iterable()
    {
        $collection = new Collection([1, 2]);

        $res = [];

        foreach ($collection as $num) {
            $res[] = $num;
        }

        $this->assertEquals(1, $res[0]);

        $this->assertEquals(2, $res[1]);
    }

    /**
     * @test
     */
    public function it_reverses_array()
    {
        $collection = new Collection([1,2,3,4]);

        $res = $collection->reverse();

        $this->assertEquals([4,3,2,1], $res->toArray());
    }
    
    /**
     * @test
     */
    public function it_gets_values()
    {
        $collection = new Collection(['foo' => 1, 'bar' => 2, 3]);
        
        $res = $collection->values();
        
        $this->assertEquals([1,2,3], $res->toArray());
    }

    /**
     * @test
     */
    public function it_flips_array_values()
    {
        $collection = new Collection(['foo' => 1, 'bar' => 2, 3]);

        $res = $collection->flip();

        $this->assertEquals([1 => 'foo', 2 => 'bar', 3 => 0], $res->toArray());
    }

    /**
     * @test
     */
    public function it_checks_if_key_exists()
    {
        $collection = new Collection(['foo' => 1, 'bar' => 2]);

        $this->assertTrue($collection->has('foo'));
    }

    /**
     * @test
     */
    public function it_gets_random_key()
    {
        $collection = new Collection(['foo' => 1, 'bar' => 2]);
        
        $res = $collection->random();
        
        $this->assertTrue($collection->has($res));
    }

    /**
     * @test
     */
    public function it_gets_multiple_random_keys()
    {
        $collection = new Collection(['foo' => 1, 'bar' => 2, 'baz' => 3]);

        $res = $collection->random(2);

        $this->assertEquals(2, $res->count());

        $this->assertTrue($collection->has($res[0]));

        $this->assertTrue($collection->has($res[1]));
    }
    
    /**
     * @test
     */
    public function it_gets_unique_values()
    {
        $collection = new Collection([1,2,2,2,3,4,5,5]);

        $res = $collection->unique();

        $this->assertEquals([1,2,3,4,5], $res->values()->toArray());
    }

    /**
     * @test
     */
    public function it_gets_array_intersect()
    {
        $collection = new Collection([1,2,3,4]);

        $other = new Collection([3,4,5,6]);

        $this->assertEquals([3,4], $collection->intersect($other)->values()->toArray());
    }

    /**
     * @test
     */
    public function it_is_traversable()
    {
        $collection = new Collection([0,1,2,3]);

        foreach ($collection as $index => $item) {
            $this->assertEquals($index, $item);
        }
    }

    /**
     * @test
     */
    public function it_sets_offset()
    {
        $collection = new Collection();

        $collection[] = 'bar';

        $this->assertEquals('bar', $collection[0]);

        $collection['foo'] = 'baz';

        $this->assertEquals('baz', $collection['foo']);
    }

    /**
     * @test
     */
    public function it_unsets_offset()
    {
        $collection = new Collection([1,2,3]);

        unset($collection[0]);

        $this->assertEquals(false, $collection->has(0));
    }

    /**
     * @test
     */
    public function it_throws_error_if_not_given_array()
    {
        $this->setExpectedException(\Exception::class);

        new Collection(1,2,3,4);
    }
    
    /**
     * @test
     */
    public function it_gets_array_diff()
    {
        $collection = new Collection([1,2,3,4]);
        
        $other = new Collection([3,4,5,6]);
        
        $res = $collection->diff($other);
        
        $this->assertEquals([1,2], $res->toArray());
    }
    
}