<?php

namespace App\Task8;

/**
 * have property $own_expression of type string
 * have methods to convert to polish notation, count res., and write res.
 */
class MathematicalExpression
{
    private $own_expression;

    /**
     * @param string $expression - mathematical expression
     */
    public function __construct($expression = '(((5-1)-1)+9)/4')
    {
        $this->own_expression = $expression;
    }

    /**
     * @return string $expression - mathematical expression
     */
    public function getOwnExpression()
    {
        return $this->own_expression;
    }

    /**
     * this method parsed mathematical expression to polish notation
     * @param string $s - mathematical expression(no parsed)
     * @return array $out - mathematical expression(parsed)
     */
    private function convertToPolishNotation($s)
    {
        static $prior = array('^' => 3, '*' => 3, '/' => 3, '+' => 2, '-' => 2, '(' => 1);
        $stack = $out = $items = array();
        $pair = array();
        // get operators & operands
        $d = null;
        for ($i = 0, $l = strlen($s); $i < $l; ++$i) {
            // scan expression
            if (is_numeric($s{$i}) || $s{$i} == '.') {
                $d = $s{$i};
            } else {
                if ($d != null) {
                    $out[] = $d; // add operand(numeric)
                    $pair[] = $d;
                    $d = null;
                }
                // add operator
                if (sizeof($stack) == 0 || $s{$i} == '(') {
                    $stack[] = $s{$i};
                } elseif ($s{$i} == ')') {
                    for ($j = sizeof($stack) - 1; $j >= 0; --$j) {
                        if ($stack[$j] != '(') {
                            $out[] = array_pop($stack);
                        } else {
                            array_pop($stack);
                            break;
                        }
                    }
                } else {
                    // + - * /
                    for ($j = sizeof($stack) - 1; $j >= 0; --$j) {
                        if ($prior[$stack[$j]] < $prior[$s{$i}]) {
                            break;
                        }

                        $out[] = $stack[$j];
                        unset($stack[$j]);
                    }
                    $stack = array_values($stack);
                    $stack[] = $s{$i};
                }
            } // else
        }
        if ($d != null) {
            $out[] = $d;
        }

        if (sizeof($stack)) {
            $out = array_merge($out, array_reverse($stack));
        }

        return $out;
    }

    /**
     * this method count result of mathematical expression
     * @param array $arr mathematical expression(parsed)
     * @return integer result of count $arr
     */
    private function countResults($arr)
    {
        for ($i = 0; $i < count($arr); $i++) {
            if (!is_numeric($arr[$i])) {
                switch ($arr[$i]) {
                    case '+':
                        if (!is_numeric($arr[$i - 2])) {
                            $res += $arr[$i - 1];
                            break;
                        } else if (!is_numeric($arr[$i]) && !is_numeric($arr[$i - 1])) {
                            $res += $arr[$i - 4];
                            break;
                        } else {
                            $res = $arr[$i - 2] + $arr[$i - 1];
                            break;
                        }
                    case '-':
                        if (!is_numeric($arr[$i - 2])) {
                            $res -= $arr[$i - 1];
                            break;
                        } else if (!is_numeric($arr[$i]) && !is_numeric($arr[$i - 1])) {
                            $res = $arr[$i - 4] - $res;
                            break;
                        } else {
                            $res = $arr[$i - 2] - $arr[$i - 1];
                            break;
                        }
                    case '*':
                        if (!is_numeric($arr[$i - 2])) {
                            $res *= $arr[$i - 1];
                            break;
                        } else if ($i > 2 && !is_numeric($arr[$i]) && is_numeric($arr[$i - 3])) {
                            $res = $arr[$i - 2] * $arr[$i - 1];
                            break;
                        } else {
                            $res = $arr[$i - 2] * $arr[$i - 1];
                            break;
                        }
                    case '/':
                        if (!is_numeric($arr[$i - 2])) {
                            $res /= $arr[$i - 1];
                            break;
                        } else if ($i > 2 && !is_numeric($arr[$i]) && is_numeric($arr[$i - 3])) {
                            $res = $arr[$i - 2] / $arr[$i - 1];
                            break;
                        } else {
                            $res = $arr[$i - 2] / $arr[$i - 1];
                            break;
                        }
                }
            }
        }
        return $res;
    }

    /**
     * this method write results
     * @param array $arr mathematical expression(no parsed)
     * @return float
     */
    public function writeResults($expression)
    {
        $parsed_expression = $this->convertToPolishNotation($expression);
        print_r($parsed_expression);

        return $this->countResults($parsed_expression);
    }
}

$object = new MathematicalExpression;

echo "Results: ", $object->writeResults($object->getOwnExpression());
