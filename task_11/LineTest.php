<?php

require __DIR__ . '/../vendor/autoload.php';

use mev\task_11\Line;

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

    public function testCheckPolindrome()
    {
        $result = $this->str->checkPolindrome();
        $this->assertInternalType("string", $result);
        $this->assertEquals(strrev($this->str->getMainStr()), $result);
    }
}
