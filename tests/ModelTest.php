<?php

use PHPieces\Collections\Model;


class ModelTest extends PHPUnit_Framework_TestCase
{



    /**
     *  @test
     */
    public function it_gets_and_sets()
    {
        $model = (new class extends Model {
            protected $foo;
            protected $bar;
        });

        $model->foo = 20;
        $model->bar = 30;



        $this->assertEquals(20, $model->foo);

        $this->assertEquals(30, $model->bar);
    }



    /**
     * @test
     * @expectedException PHPieces\Collections\exceptions\UndefinedPropertyException
     */
    public function it_does_not_set_undefined_properties()
    {
        $model = (new class extends Model {
            protected $foo;
            protected $bar;
        });

        $model->baz = 40;
    }

    /**
     * @test
     */
    public function it_defferes_to_getters()
    {
        $model = (new class extends Model {
            protected $foo;
            protected $bar;

            public function getFoo()
            {
                return $this->foo * 100;
            }
        });

        $model->foo = 10;

        $this->assertEquals(1000, $model->foo);
    }

    /**
     * @test
     */
    public function it_defferes_to_setters()
    {
        $model = (new class extends Model {
            protected $foo;
            protected $bar;

            public function setFoo($value)
            {
                $this->foo =  $value * 200;
            }
        });

        $model->foo = 1;

        $this->assertEquals(200, $model->foo);
    }


}
