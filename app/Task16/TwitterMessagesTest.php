<?php

namespace App\Task16;

class TwitterMessagesTest extends \PHPUnit_Framework_TestCase
{
    protected $obj;

    protected function setUp()
    {
        $this->obj = new TwitterMessages();
    }

    protected function tearDown()
    {
        $this->obj = null;
    }

    public function testRun()
    {
        $result = $this->obj->run();
        $this->assertInternalType("array", $result);
    }
}
