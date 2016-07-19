<?php

namespace App\Task12;

class DiffDate
{
    private $f_date;
    private $s_date;

    function __construct($firstDate, $secondDate)
    {
        $this->f_date = $firstDate;
        $this->s_date = $secondDate;
    }

    public function getFirstDate()
    {
        return $this->f_date;
    }

    public function getSecondDate()
    {
        return $this->s_date;
    }

    /**
     * this method to calculate difference between two date
     * @param double $firstDate, $secondDate
     * @return double $diff
     */
    public function calcDiff($firstDate, $secondDate)
    {
        $difference = intval(abs($firstDate - $secondDate));
        $diff = round($difference / (3600 * 24));

        return $diff;
    }
}

$obj = new DiffDate(strtotime('now'), strtotime('04-01-1998'));
echo $obj->calcDiff($obj->getFirstDate(), $obj->getSecondDate()), ' days';
