<?php

require('Line.php');

class LineTest extends PHPUnit_Framework_TestCase
{
  protected function setUp()
  {
    $this->str = new Line();
  }

  protected function tearDown()
  {
    $this->str = null;
  }

  public function testCheckLine()
  {
    $result = $this->str->checkLine();
    $this->assertInternalType("string", $result);
    $this->assertEquals($this->str->getMemberStr(), $result);
  }
}
