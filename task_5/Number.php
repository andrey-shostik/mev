<?php
class Number
{
    /**
     * this method print numbers
     * @return string
     */
    public function run()
    {
        $n = 3;
        $m = 3;

        for ($i=1; $i <= $n ; $i++) {
            $arr[$i] = 1;
        }

        do {
            for ($i=1; $i <= $n; $i++) {
                echo $arr[$i];
            }

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
    }
}

$a = new Number();
$a->run();
