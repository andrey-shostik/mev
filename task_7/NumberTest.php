<?php

require('Number.php');

class NumberTest extends PHPUnit_Framework_TestCase
{
  private $number;

  protected function setUp()
  {
    $this->number = new Number();
  }

  protected function tearDown()
  {
    $this->number = null;
  }

  public function testQuickSort()
  {
    $result = $this->number->run();
    $this->assertEquals(55251, $result);
  }
}
