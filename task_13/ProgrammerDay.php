<?php

namespace mev\task_13;

class ProgrammerDay
{
    private $year;

    function __construct($year = '2016')
    {
        $this->year = $year;
    }

    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param string $year
     * @return string $date of programmer day
     */
    public function printProgrammerDay($year)
    {
        if ((intval($year)) % 4 == 0){
            $date = '2016-09-12';
        } else {
            $date = '2016-09-13';
        }
        echo $date_now = date("l, d/m/Y"), " - Today\n";
        $date = strftime("%A, %d/%m/%Y", strtotime($date));

        return $date;
    }
}

$object = new ProgrammerDay;
echo $object->printProgrammerDay($object->getYear()), " - Programmer day";
