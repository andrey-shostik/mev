<?php

namespace App\Task6;

class Number
{
    /**
     * this method print numbers
     * @param integer - count transposition
     * @return string
     */
    public function run($n)
    {
        $new_arr = array();
        $arr = array();

        for ($i = 1; $i <= $n; $i++) {
            $arr[$i] = $i;
        }

        do {
            $array = array();

            for ($i = 1; $i <= $n; $i++) {
                $array[$i - 1] = $arr[$i];
                echo $arr[$i];
            }

            array_push($new_arr, $array);
            echo "\n";

            $i = $n - 1;

            while ($i > 0 && $arr[$i] > $arr[$i + 1]) {
                $i--;
            }

            if ($i > 0) {
                $j = $i + 1;

                while ($j < $n && $arr[$j + 1] > $arr[$i]) {
                    $j++;
                }

                $a = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $a;

                for ($j = $i + 1; $j <= round(($n + $i) / 2); $j++) {
                    $a = $arr[$j];
                    $arr[$j] = $arr[$n - $j + $i + 1];
                    $arr[$n - $j + $i + 1] = $a;
                }

                $yes = true;
            } else {
                $yes = false;
            }
        } while ($yes);

        return $new_arr;
    }
}

$a = new Number();
$b = $a->run(3);
