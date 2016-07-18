<?php

namespace mev\task_2;

/**
 * have property arr of type array
 * have methods to display the max and min of an array
 */
class MyArray
{
    protected $arr = array(1, 5, 2, 7);

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
     * this method first option return max of arr
     * @return integer
     */
    public function firstMaxArray()
    {
        return max($this->arr);
    }

    /**
     * this method second option return max of arr
     * @return integer
     */
    public function secondMaxArray()
    {
        $max = 1;
        foreach ($this->arr as $value) {
          if ($max < $value) {
            $max = $value;
          }
        }
        return $max;
    }

    /**
     * this method first option return min of arr
     * @return integer
     */
    public function firstMinArray()
    {
        return min($this->arr);
    }

    /**
     * this method second option return min of arr
     * @return integer
     */
    public function secondMinArray()
    {
        $max = 1;
        foreach ($this->arr as $value) {
            if ($max > $value) {
                $max = $value;
            }
        }
        return $max;
    }
}

$object = new MyArray;

$object->showArray();
echo "\n max " . $object->firstMaxArray();
echo "\n max " . $object->secondMaxArray();
echo "\n min " . $object->firstMinArray();
echo "\n min " . $object->secondMinArray();
