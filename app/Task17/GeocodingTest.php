<?php

namespace App\Task17;

class GeocodingTest extends \PHPUnit_Framework_TestCase
{
    protected $obj;

    protected function setUp()
    {
        $this->obj = new Geocoding;
    }

    protected function tearDown()
    {
        $this->obj = null;
    }

    public function testGeocode()
    {
        $result = $this->obj->geocode('Канев');
        $this->assertEquals(array(49.751033, 31.4697), $result);
    }

    public function testReverseGeocode()
    {
        $result = $this->obj->reverseGeocode(49.751033, 31.4697);
        $this->assertInternalType('array', $result);
    }
}
