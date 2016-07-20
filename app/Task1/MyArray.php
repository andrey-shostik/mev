<?php

namespace App\Task1;

/**
 * have property arr of type array
 * have methods to display the sum of an array
 */
class MyArray
{
    private $arr = array(1, 5, 2, 7);

    /**
     * this method show values of arr
     * @return string
     */
    public function showArray()
    {
        foreach ($this->arr as $value) {
            echo "$value ";
        }
    }

    /**
     * this method first option return sum of arr
     * @return integer
     */
    public function firstSumArray()
    {
        return array_sum($this->arr);
    }

    /**
     * this method second option return sum of arr
     * @return integer
     */
    public function secondSumArray()
    {
        $sum = 0;
        foreach ($this->arr as $value) {
            $sum += $value;
        }
        return $sum;
    }
}

$object = new MyArray;

$object->showArray();
echo "\n sum " . $object->firstSumArray();
echo "\n sum " . $object->secondSumArray();
