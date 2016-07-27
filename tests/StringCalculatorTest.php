<?php

use App\StringCalculator;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


/**
 * @group stringcalc
 */
class StringCalculatorTest extends TestCase
{
    /**
     * Test 2 is returned for 1 + 1.
     *
     * @return integer 2
     */
    public function testItReturns2For1Add1()
    {
        $ans = StringCalculator::add('1,1');
        $this->assertEquals(2, $ans);
    }

    /**
     * Test 15 is returned for 5 + 5 + 5.
     *
     * @return integer 15
     */
    public function testItReturns15For5Add5Add5()
    {
        $ans = StringCalculator::add('5,5,5');
        $this->assertEquals(15, $ans);
    }

    /**
     * Test values over 1000 are not added.
     *
     * @return integer 15
     */
    public function testValuesOver1000AreNotAdded()
    {
        $ans = StringCalculator::add('5,5,5,1000');
        $this->assertEquals(15, $ans);
    }

    /**
     * Test that an empty string returns 0.
     *
     * @return integer 0
     */
    public function testEmptyStringReturnsZero()
    {
        $ans = StringCalculator::add('0');
        $this->assertEquals(0, $ans);
    }

    /**
     * Test that negative no throws exception.
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Invalid number provided: -3
     */
    public function testNegativeNoThrowsException()
    {
        StringCalculator::add('1,2,-3');
    }

    /**
     * Test that it allows a specified delimiter.
     *
     * @return integer 10
     */
    public function testThatItAllowsSpecifiedDelimiters()
    {
        $ans = StringCalculator::add('5\n5');
        $this->assertEquals(10, $ans);
    }
}
