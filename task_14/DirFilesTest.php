<?php

require __DIR__ . '/../vendor/autoload.php';

use mev\task_14\DirFiles;

class DirFilesTest extends PHPUnit_Framework_TestCase
{
    protected $dir;

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
