<?php

namespace App\Task5;

class Number
{
    /**
     * this method print numbers
     * @param integer $n count transposition
     * @param integer $m count transposition
     * @return string
     */
    public function run($n, $m)
    {
        $new_arr = array();

        for ($i = 1; $i <= $n; $i++) {
            $arr[$i] = 1;
        }

        do {
            $array = array();

            for ($i = 1; $i <= $n; $i++) {
                $array[$i - 1] = $arr[$i];
                echo $arr[$i];
            }

            array_push($new_arr, $array);
            echo "\n";
            $i = $n;

            while ($i > 0 && $arr[$i] == $m) {
                $arr[$i] = 1;
                $i--;
            }

            if ($i > 0) {
                $arr[$i] += 1;
                $yes = true;
            } else {
                $yes = false;
            }
        } while ($yes);

        return $new_arr;
    }
}

$a = new Number();
$b = $a->run(3, 3);
