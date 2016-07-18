<?php

require __DIR__ . '/../vendor/autoload.php';

use mev\task_15\ImageDownloader;

class ImageDownloaderTest extends PHPUnit_Framework_TestCase
{
    protected $img;

    protected function setUp()
    {
        $this->img = new ImageDownloader();
    }

    protected function tearDown()
    {
        $this->img = null;
    }

    public function testRunProgramm()
    {
        $result = $this->img->runProgram($this->img->getUrl(), $this->img->getDir());
        $this->assertEquals(true, $result);
    }
}
