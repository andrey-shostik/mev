<?php

/**
 * have method
 */
class Line
{
    private $main_str;

    /**
     * this method initialize field $main_str
     * @param $str is string
     */
    public function __construct($str = 'level')
    {
        $this->main_str = $str;
    }

    public function getMainStr()
    {
        return $this->main_str;
    }

    /**
     * this method check word on Polindrome
     * @return string
     */
    public function checkPolindrome()
    {
        $j = 0;

        for ($i = strlen($this->main_str) - 1; $i >= 0; $i--) {
            $str[$j] = $this->main_str[$i];
            $j++;
        }

        if (implode($str) == $this->main_str) {
            return implode($str);
        } else {
            return "Way second, word isn't palindrome";
        }
    }
}

$object = new Line;


if (strrev($object->getMainStr()) == $object->getMainStr()) {
    echo "Way first, word is polindrome";
} else {
    echo "Way first, word isn't palindrome";
}

echo "\nWay second, word ", $object->checkPolindrome(), " is polindrome";
