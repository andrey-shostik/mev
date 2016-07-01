<?php

require('MyArray.php');

class MyArrayTest extends PHPUnit_Framework_TestCase
{
  private $my_array;

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
    $result = $this->my_array->firstSumArray();
    $this->assertEquals(15, $result);
  }

  public function testSecondSumArray()
  {
    $result = $this->my_array->secondSumArray();
    $this->assertEquals(15, $result);
  }
}
