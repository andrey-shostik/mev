<?php

require __DIR__ . '/../vendor/autoload.php';

use mev\task_19\WaterMark;

class WaterMarkTest extends PHPUnit_Framework_TestCase
{
    protected $obj;

    protected function setUp()
    {
        $this->obj = new WaterMark('photo.jpeg', 'stamp.png');
    }

    protected function tearDown()
    {
        $this->obj = null;
    }

    public function testSetWaterMark()
    {
        $result = $this->obj->setWaterMark('newimg');
        $this->assertInternalType("boolean", $result);
        $this->assertEquals(true, $result);
    }
}
