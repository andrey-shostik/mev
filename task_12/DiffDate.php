<?php

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
     * @return double
     */
    public function calcDiff($firstDate, $secondDate)
    {
        $difference = intval(abs($firstDate - $secondDate));
        return round($difference / (3600 * 24));
    }
}

$obj = new DiffDate(strtotime('now'), strtotime('04-01-1998'));
echo $obj->calcDiff($obj->getFirstDate(), $obj->getSecondDate()), ' days';
