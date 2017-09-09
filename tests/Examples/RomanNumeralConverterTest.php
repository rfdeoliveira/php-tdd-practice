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
}
