<?php

namespace App\Task1;

/**
 * have property arr of type array
 * have methods to display the sum of an array
 */
class MyArray
{
    private $arr = array(-1, 2, 3);

    /**
     * @param array, $arr
     * @return array
     */
    public function setArr($arr)
    {
        return $this->arr = $arr;
    }

    public function getArr()
    {
        return $this->arr;
    }

    /**
     * this method first option return sum of arr
     * @return integer|boolean
     */
    public function firstSumArray()
    {
        if (!empty($this->arr)) {
            return array_sum($this->arr);
        }

        return false;
    }

    /**
     * this method second option return sum of arr
     * @return integer|boolean
     */
    public function secondSumArray()
    {
        $sum = 0;

        if (!empty($this->arr)) {
            foreach ($this->arr as $value) {
                $sum += $value;
            }

            return $sum;
        }

        return false;
    }
}

$object = new MyArray;
var_dump($object->getArr());

echo "\n sum 1: " . $object->firstSumArray();
echo "\n sum 2: " . $object->secondSumArray();
