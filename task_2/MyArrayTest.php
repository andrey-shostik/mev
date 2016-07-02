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

  public function testFirstMaxArray()
  {
    $result = $this->my_array->firstMaxArray();
    $this->assertEquals(7, $result);
  }

  public function testSecondMaxArray()
  {
    $result = $this->my_array->secondMaxArray();
    $this->assertEquals(7, $result);
  }

  public function testFirstMinArray()
  {
    $result = $this->my_array->firstMinArray();
    $this->assertEquals(1, $result);
  }

  public function testSecondMinArray()
  {
    $result = $this->my_array->secondMinArray();
    $this->assertEquals(1, $result);
  }
}
