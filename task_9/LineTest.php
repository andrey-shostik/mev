<?php

require __DIR__ . '/../vendor/autoload.php';

use mev\task_9\Line;

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

    public function testCheckLine()
    {
        $result = $this->str->checkLine();
        $this->assertInternalType("string", $result);
        $this->assertEquals($this->str->getMemberStr(), $result);
    }
}
