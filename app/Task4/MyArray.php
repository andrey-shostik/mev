<?php

namespace App\Task4;

/**
 * have property first_arr and second_arr of type array
 * have methods to sort of an array
 */
class MyArray
{
    private $firstArr = array(3, 1, 2, 5);
    private $secondArr = array(8, 3, 7, 2);

    /**
     * this getter of property firstArr
     * @return array
     */
    public function getFirstArr()
    {
        return $this->firstArr;
    }

    /**
     * this getter of property secondArr
     * @return array
     */
    public function getSecondArr()
    {
        return $this->secondArr;
    }

    /**
     * this method show array
     * @param $array
     * @return string
     */
    public function showArray($array)
    {
        foreach ($array as $value) {
            echo "$value ";
        }
    }

    /**
     * this method look for common values
     * @param array $arr_f
     * @param array $arr_s
     * @return array
     */
    public function intersect($f_arr, $s_arr)
    {
        return array_intersect($f_arr, $s_arr);
    }

    /**
     * this method look for common values
     * @param array $arr_f
     * @param array $arr_s
     * @return array
     */
    public function getCommon($f_arr, $s_arr)
    {
        $common = array();
        $i = 0;
        foreach ($f_arr as $f_value) {
            foreach ($s_arr as $s_value) {
                if ($f_value == $s_value) {
                    $common[$i] = $f_value;
                    $i = $i + 1;
                }
            }
        }
        return $common;
    }
}

$object = new MyArray;
echo "\n" . $object->showArray($object->getFirstArr());
$object->showArray($object->getSecondArr());

$common = $object->intersect($object->getFirstArr(), $object->getSecondArr());
print_r($common);

$common = $object->getCommon($object->getFirstArr(), $object->getSecondArr());
print_r($common);
