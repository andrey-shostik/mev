<?php

require('DiffDate.php');

class DiffDateTest extends PHPUnit_Framework_TestCase
{
  protected function setUp()
  {
    $this->date = new DiffDate(strtotime('now'), strtotime('04-01-1998'));
  }

  protected function tearDown()
  {
    $this->date = null;
  }

  public function testCalcDiff()
  {
    $result = $this->date->calcDiff($this->date->getFirstDate(), $this->date->getSecondDate());
    $this->assertInternalType("double", $result);
  }
}
