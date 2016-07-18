<?php

require __DIR__ . '/../vendor/autoload.php';

use mev\task_4\MyArray;

class MyArrayTest extends PHPUnit_Framework_TestCase
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

    public function testGetCommon()
    {
        $result = $this->my_array->getCommon($this->my_array->getFirstArr(), $this->my_array->getSecondArr());
        $expect = array(3, 2);
        $this->assertEquals($expect, $result);
    }
}
