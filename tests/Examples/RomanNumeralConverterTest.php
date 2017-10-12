<?php

namespace TDD\Examples;

use TDD\Examples\RomanNumeralConverter;
use \PHPUnit\Framework\TestCase;

class RomanNumeralConverterTest extends TestCase
{
    /**
     * @test
     * @dataProvider singleSymbolsProvider
     */
    public function mustConvertSingleSymbolToIntegerCorrectly($symbol, $integer)
    {
        $converter = new RomanNumeralConverter();

        $this->assertEquals($integer, $converter->toInt($symbol));
    }

    public function singleSymbolsProvider()
    {
        return [
            ['I', 1],
            ['V', 5],
            ['X', 10],
            ['L', 50],
            ['C', 100],
            ['D', 500],
            ['M', 1000],
        ];
    }

    /**
     * @test
     * @dataProvider twoEqualSymbolsProvider
     */
    public function mustConvertNumberWithTwoEqualSymbolsToIntegerCorrectly($symbols, $integer)
    {
        $converter = new RomanNumeralConverter();

        $this->assertEquals($integer, $converter->toInt($symbols));
    }

    public function twoEqualSymbolsProvider()
    {
        return [
            ['II', 2],
            ['XX', 20],
        ];
    }

    /**
     * @test
     */
    public function mustConvertXXIIRomanNumberToIntegerNumber22()
    {
        $converter = new RomanNumeralConverter;
        $result    = $converter->toInt('XXII');
        $this->assertEquals(22, $result);
    }

    /**
     * @test
     */
    public function mustConvertIVToIntegerNumber4()
    {
        $converter = new RomanNumeralConverter;
        $result    = $converter->toInt('IV');
        $this->assertEquals(4, $result);
    }

    /**
     * @test
     */
    public function mustConvertIXToIntegerNumber9()
    {
        $converter = new RomanNumeralConverter;
        $result    = $converter->toInt('IX');
        $this->assertEquals(9, $result);
    }

    /**
     * @test
     */
    public function mustConvertXXIVToIntegerNumber24()
    {
        $converter = new RomanNumeralConverter;
        $result    = $converter->toInt('XXIV');
        $this->assertEquals(24, $result);
    }
}
