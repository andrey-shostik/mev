<?php

namespace App\Task5;

class NumberTest extends \PHPUnit_Framework_TestCase
{
    protected $number;

    protected function setUp()
    {
       $this->number = new Number();
    }

    protected function tearDown()
    {
       $this->number = null;
    }

    public function testRun()
    {
        $result = $this->number->run(2, 2);
        $this->assertInternalType("array", $result);
        $this->assertEquals(array(
            array(1, 1),
            array(1, 2),
            array(2, 1),
            array(2, 2)
        ), $result);
    }
}
