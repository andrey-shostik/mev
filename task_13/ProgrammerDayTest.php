<?php

require __DIR__ . '/../vendor/autoload.php';

use mev\task_13\ProgrammerDay;

class ProgrammerDayTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->day = new ProgrammerDay();
    }

    protected function tearDown()
    {
        $this->day = null;
    }

    public function testPrintProgrammerDay()
    {
        $result = $this->day->printProgrammerDay($this->day->getYear());
        $this->assertInternalType("string", $result);
    }
}
