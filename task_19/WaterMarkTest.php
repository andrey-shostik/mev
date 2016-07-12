<?php

require('WaterMark.php');

class WaterMarkTest extends PHPUnit_Framework_TestCase
{
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
