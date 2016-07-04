<?php

/**
 * have method to count happy ticket
 */
class Number
{
    /**
     * this method count happy ticket
     * @return integer
     */
    public function run()
    {
        $count = 0;
        for ($i = 1; $i < 1000000; $i++) {
            $sum_a = 0;
            $sum_b = 0;
            $a= $i / 1000;
            $b= $i % 1000;

            while ($a >= 1) {
                $sum_a = $sum_a + $a % 10;
                $a= $a / 10;
            }

            while ($b >= 1) {
                $sum_b = $sum_b + $b % 10;
                $b= $b / 10;
            }

            if ($sum_a == $sum_b) {
                $count++;
            }
        }
        return $count;
    }
}

$object =  new Number;
echo $object->run();
