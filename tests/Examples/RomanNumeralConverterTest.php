<?php

namespace TDD\Examples;

use TDD\Examples\RomanNumeralConverter;
use \PHPUnit\Framework\TestCase;

class RomanNumeralConverterTest extends TestCase
{
    /**
     * @test
     */
    public function mustConvertISymbolTo1()
    {
        $converter = new RomanNumeralConverter();
        $integer   = $converter->toInt('I');

        $this->assertEquals(1, $integer);
    }

    /**
     * @test
     */
    public function mustConvertVSymbolTo5()
    {
        $converter = new RomanNumeralConverter();
        $integer   = $converter->toInt('V');

        $this->assertEquals(5, $integer);
    }

    /**
     * @test
     */
    public function mustConvertXSymbolTo10()
    {
        $converter = new RomanNumeralConverter();
        $integer   = $converter->toInt('X');

        $this->assertEquals(10, $integer);
    }

    /**
     * @test
     */
    public function mustConvertLSymbolTo50()
    {
        $converter = new RomanNumeralConverter();
        $integer   = $converter->toInt('L');

        $this->assertEquals(50, $integer);
    }

    /**
     * @test
     */
    public function mustConvertCSymbolTo100()
    {
        $converter = new RomanNumeralConverter();
        $integer   = $converter->toInt('C');

        $this->assertEquals(100, $integer);
    }

    /**
     * @test
     */
    public function mustConvertDSymbolTo500()
    {
        $converter = new RomanNumeralConverter();
        $integer   = $converter->toInt('D');

        $this->assertEquals(500, $integer);
    }

    /**
     * @test
     */
    public function mustConvertMSymbolTo1000()
    {
        $converter = new RomanNumeralConverter();
        $integer   = $converter->toInt('M');

        $this->assertEquals(1000, $integer);
    }
}
