<?php

namespace App\Task1;

class MyArrayTest extends \PHPUnit_Framework_TestCase
{
    protected $my_array;

    protected function setUp()
    {
        $this->my_array = new MyArray();
    }

    protected function tearDown()
    {
        $this->my_array = null;
    }

    public function testFirstSumArray()
    {
        $this->my_array->setArr(array(1, 2, 3, 4, 5));
        $result = $this->my_array->firstSumArray();
        $this->assertEquals(15, $result);

        $this->my_array->setArr(array(1, -2, 2));
        $result = $this->my_array->firstSumArray();
        $this->assertEquals(1, $result);

        $this->my_array->setArr(array());
        $result = $this->my_array->firstSumArray();
        $this->assertEquals(false, $result);
    }

    public function testSecondSumArray()
    {
        $this->my_array->setArr(array(1, 2, 3, 4, 5));
        $result = $this->my_array->secondSumArray();
        $this->assertEquals(15, $result);

        $this->my_array->setArr(array(1, -2, 2));
        $result = $this->my_array->secondSumArray();
        $this->assertEquals(1, $result);

        $this->my_array->setArr(array());
        $result = $this->my_array->secondSumArray();
        $this->assertEquals(false, $result);
    }
}
