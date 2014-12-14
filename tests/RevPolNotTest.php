<?php

use RevPolNotation\RevPolNot;

class RevPolNotTest extends PHPUnit_Framework_TestCase
{
    public function testCalculator()
    {
        $revPolNot = new RevPolNot("+", "-", "*", "/");
        $result = $revPolNot->calculator([4, 13, 5, "/", "+"]);
        $this->assertEquals(6, $result);
    }

    public function testCalculator2()
    {
        $revPolNot = new RevPolNot("+", "-", "*", "/");
        $result = $revPolNot->calculator([2, 1, "+", 3, "*"]);
        $this->assertEquals(9, $result);
    }

}
