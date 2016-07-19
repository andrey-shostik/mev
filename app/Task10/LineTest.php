<?php

namespace App\Task10;

class LineTest extends \PHPUnit_Framework_TestCase
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
