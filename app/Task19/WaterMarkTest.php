<?php

namespace App\Task19;

class WaterMarkTest extends \PHPUnit_Framework_TestCase
{
    protected $obj;

    protected function setUp()
    {
        $this->obj = new WaterMark(__DIR__.'/photo.jpeg', __DIR__.'/stamp.png');
    }

    protected function tearDown()
    {
        $this->obj = null;
    }

    public function testSetWaterMark()
    {
        $result = $this->obj->setWaterMark(__DIR__.'/newimg');
        $this->assertInternalType("boolean", $result);
        $this->assertEquals(true, $result);
    }
}
