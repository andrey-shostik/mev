<?php

namespace mev\task_14;

class DirFiles
{
    private $dir;

    function __construct($dir = '/')
    {
        $this->year = $dir;
    }

    public function getDir()
    {
        return $this->dir;
    }

    /**
     * @param string $dir
     * @return array $files
     */
    public function printDir($dir)
    {
        $dir    = '/';
        $files = scandir($dir);

        return $files;
    }
}

$object = new DirFiles;
$files = $object->printDir($object->getDir());

print_r($files);
