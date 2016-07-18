<?php

require __DIR__ . '/../vendor/autoload.php';

use mev\task_7\Number;

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
        $result = $this->number->run();
        $this->assertEquals(55251, $result);
    }
}
