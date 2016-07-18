<?php

require __DIR__ . '/../vendor/autoload.php';

use mev\task_3\MyArray;

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

    public function testQuickSort()
    {
        $result = $this->my_array->quickSort(array(8, 3, 7, 2, 1, 5, 2, 7));
        $expect = array(1, 2, 2, 3, 5, 7, 7, 8);
        $this->assertEquals($expect, $result);
    }
}
