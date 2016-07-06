<?php

/**
 * have methods for clean spaces in line
 */
class Line
{
    private $main_str;

    /**
     * this method initialize fields
     * @param $str is string
     */
    public function __construct($str = 'here is some text')
    {
        $this->main_str = $str;
    }

    /**
     * this method initialize fields
     * @return string
     */
    public function clean_space()
    {
        for ($i = 0; $i < strlen($this->main_str) ; $i++) {
            if ($this->main_str[$i] == ' ') {
                $this->main_str[$i] = '';
            }
        }
        return $this->main_str;
    }
}

$object = new Line;
echo "Way first, ", str_replace(' ', '', $object->clean_space());

echo "\nWay second, ", $object->clean_space();
