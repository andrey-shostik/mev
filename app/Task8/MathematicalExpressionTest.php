<?php

namespace App\Task8;

class MathematicalExpressionTest extends \PHPUnit_Framework_TestCase
{
    protected $expression;

    protected function setUp()
    {
        $this->expression = new MathematicalExpression();
    }

    protected function tearDown()
    {
        $this->expression = null;
    }

    public function testWriteResults()
    {
        $result = $this->expression->writeResults($this->expression->getOwnExpression());
        $this->assertEquals(3, $result);
        $this->assertInternalType("int", $result);
    }
}
