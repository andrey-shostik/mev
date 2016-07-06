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

  public function testCleanSpace()
  {
    $result = $this->str->clean_space();
    $this->assertInternalType("string", $result);
  }
}
