<?php

namespace App\Task9;

/**
 * have methods for check line presence in line
 */
class Line
{
    private $basic_str;
    private $member_str;

    /**
     * this method initialize fields
     * @param $f_str and $s_str is string
     */
    public function __construct($f_str = 'string', $s_str = 'str')
    {
        $this->basic_str = $f_str;
        $this->member_str = $s_str;
    }

    public function getBasicStr()
    {
        return $this->basic_str;
    }

    public function getMemberStr()
    {
        return $this->member_str;
    }

    /**
     * this method check line presence in line
     * @return string
     */
    public function checkLine()
    {
        for ($i = 0; $i < strlen($this->basic_str); $i++) {
            $j = 0;

            while ($j < strlen($this->member_str) && $this->basic_str[$i] == $this->member_str[$j]) {
                if ($j == strlen($this->member_str) - 1) {
                    return $this->member_str;
                }
                $i++;
                $j++;
            }
        }
    }
}

$object = new Line();
if (preg_match('/' . $object->getMemberStr() . '/', $object->getBasicStr())) {
    echo 'first way, line ', $object->getMemberStr(), ' is in line ', $object->getBasicStr(), "\n";
}

echo "second way, line ", $object->checkLine(), " is in line ", $object->getBasicStr();
