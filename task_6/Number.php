<?php
class Number
{
    /**
     * this method print numbers
     * @return string
     */
    public function run()
    {
        $arr = array();

        $n = 4;
        for ($i=1; $i <= $n ; $i++) {
            $arr[$i] = $i;
        }
        do {
            for ($i=1; $i <= $n ; $i++) {
                echo $arr[$i];
            }
            echo "\n";

            $i=$n-1;
            while ($i>0 && $arr[$i]>$arr[$i+1]) {
                $i--;
            }
            if ($i>0) {
                $j=$i+1;
                while ($j<$n && $arr[$j+1]>$arr[$i]){
                    $j++;
                }
                $a = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $a;

                for ($j=$i+1; $j <= round(($n+$i) / 2) ; $j++) {
                    $a = $arr[$j];
                    $arr[$j] = $arr[$n-$j+$i+1];
                    $arr[$n-$j+$i+1] = $a;
                }

                $yes = true;
            } else {
                $yes = false;
            }
        } while ($yes);
    }
}

$a = new Number();
$a->run();
