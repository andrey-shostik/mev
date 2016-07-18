<?php

require __DIR__ . '/../vendor/autoload.php';

use mev\task_10\Line;


class LineTest extends PHPUnit_Framework_TestCase
{
    protected $str;

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
