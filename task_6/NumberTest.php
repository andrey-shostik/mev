<?php

require __DIR__ . '/../vendor/autoload.php';

use mev\task_6\Number;

class NumberTest extends PHPUnit_Framework_TestCase
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
        $result = $this->number->run(3);
        $this->assertInternalType("array", $result);
        $this->assertEquals(array(
            array(1, 2, 3),
            array(1, 3, 2),
            array(2, 1, 3),
            array(2, 3, 1),
            array(3, 1, 2),
            array(3, 2, 1)
        ), $result);
    }
}
