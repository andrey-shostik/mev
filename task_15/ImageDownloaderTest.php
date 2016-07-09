<?php

require('ImageDownloader.php');

class ImageDownloaderTest extends PHPUnit_Framework_TestCase
{
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
