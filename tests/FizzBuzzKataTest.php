<?php

use App\FizzBuzz;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


/**
 * @group fizzbuzz
 */
class FizzBuzzKataTest extends TestCase
{
    /**
     * Test 1 is returned for 1.
     *
     * @return integer
     */
    public function testItReturns1For1()
    {
        $no = FizzBuzz::execute(1);
        $this->assertEquals(1, $no);
    }

    /**
     * Test 2 is returned for 2.
     *
     * @return integer
     */
    public function testItReturns2For2()
    {
        $no = FizzBuzz::execute(2);
        $this->assertEquals(2, $no);
    }

    /**
     * Test fizz is returned for 3.
     *
     * @return string 'fizz'
     */
    public function testItReturnsFizzFor3()
    {
        $no = FizzBuzz::execute(3);
        $this->assertEquals('fizz', $no);
        $this->assertTrue(is_string($no));
    }

    /**
     * Test buzz is returned for 5.
     *
     * @return string 'buzz'
     */
    public function testItReturnsBuzzFor5()
    {
        $no = FizzBuzz::execute(5);
        $this->assertEquals('buzz', $no);
        $this->assertTrue(is_string($no));
    }

    /**
     * Test fizzbuzz is returned for 15.
     *
     * @return string 'fizzbuzz'
     */
    public function testItReturnsFizzBuzzFor15()
    {
        $no = FizzBuzz::execute(15);
        $this->assertEquals('fizzbuzz', $no);
        $this->assertTrue(is_string($no));
    }

    /**
     * Test fizz is returned for no divisible by 3.
     *
     * @return string 'fizz'
     */
    public function testItReturnsFizzForNosDivisibleBy3()
    {
        $no = FizzBuzz::execute(6);
        $this->assertEquals('fizz', $no);
        $this->assertTrue(is_string($no));
    }

    /**
     * Test fizzbuzz is returned for no divisible by 15.
     *
     * @return string 'fizzbuzz'
     */
    public function testItReturnsFizzBuzzForNosDivisibleBy15()
    {
        $no = FizzBuzz::execute(30);
        $this->assertEquals('fizzbuzz', $no);
        $this->assertTrue(is_string($no));
    }

    /**
     * Test buzz is returned for no divisible by 5.
     *
     * @return string 'buzz'
     */
    public function testItReturnsBuzzForNosDivisibleBy5()
    {
        $no = FizzBuzz::execute(10);
        $this->assertEquals('buzz', $no);
        $this->assertTrue(is_string($no));
    }

    /**
     * Test int is returned for no not divisible by 3, 5 or 15.
     *
     * @return integer
     */
    public function testItReturnsANumericValueForNotDivisibleBy3_5_or_15()
    {
        $no = FizzBuzz::execute(1);
        $this->assertTrue(is_numeric($no));

        $no = FizzBuzz::execute(4);
        $this->assertTrue(is_numeric($no));

        $no = FizzBuzz::execute(8);
        $this->assertTrue(is_numeric($no));
    }

    /**
     * Test string is returned for no divisible by 3, 5 or 15.
     *
     * @return string
     */
    public function testItReturnsANonNumericValueForNosDivisibleBy3_5_or_15()
    {
        $no = FizzBuzz::execute(3);
        $this->assertFalse(is_numeric($no));

        $no = FizzBuzz::execute(5);
        $this->assertFalse(is_numeric($no));

        $no = FizzBuzz::execute(15);
        $this->assertFalse(is_numeric($no));
    }

    /**
     * Test correct array of vals is returned for no's up to 5.
     *
     * @return array
     */
    public function testItWorksOnARangeOfNos()
    {
        $noArr = FizzBuzz::executeUpTo(5);
        $this->assertEquals([1, 2, 'fizz', 4, 'buzz'], $noArr);
    }
}
