<?php

require('DirFiles.php');

class DirFilesTest extends PHPUnit_Framework_TestCase
{
    public $dir;

    protected function setUp()
    {
        $this->dir = new DirFiles;
    }

    protected function tearDown()
    {
        $this->dir = null;
    }

    public function testprintDir()
    {
        $result = $this->dir->printDir($this->dir->getDir());
        $this->assertInternalType("array", $result);
    }
}
