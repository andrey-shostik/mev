<?php
/**
 * have property arr of type array
 * have methods to sort of an array
 */
class MyArray
{
  protected $arr = array(8, 3, 7, 2, 1, 5, 2, 7);

  /**
   * this getter of property arr
   * @return array
   */
   public function getArr()
   {
     return $this->arr;
   }

  /**
   * this method show array
   * @return string
   */
  public function showArray()
  {
    foreach ($this->arr as $value) {
      echo "$value ";
    }
  }

  /**
   * this method show sorted array
   * @return string
   */
  public function sortArray()
  {
    sort($this->arr);
    echo "\nsorted: ";
    foreach ($this->arr as $value) {
      echo "$value ";
    }
  }

  /**
   * this method show array
   * @param array $array
   * @return array
   */
  public function quickSort($array)
  { if (count($array) == 0) {
      return array();
    }
    $pivot = $array[0];
    $left = $right = array();

    for ($i = 1; $i < count($array); $i++) {
      if ($array[$i] < $pivot) {
        $left[] = $array[$i];
      } else {
        $right[] = $array[$i];
      }
    }
    return array_merge($this->quicksort($left), array($pivot), $this->quicksort($right));
  }
}

$object = new MyArray;

$object->showArray();
$object->sortArray();
$sorted = $object->quickSort($object->getArr());

echo "\nQuick Sort: ";
print_r($sorted);
