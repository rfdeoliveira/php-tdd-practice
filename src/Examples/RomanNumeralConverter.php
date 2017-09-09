<?php

namespace TDD\Examples;

class RomanNumeralConverter
{
    public function toInt($romanNumeral)
    {
        if ($romanNumeral === 'I') {
            return 1;
        } else if ($romanNumeral === 'V') {
            return 5;
        } else if ($romanNumeral === 'X') {
            return 10;
        } else if ($romanNumeral === 'L') {
            return 50;
        } else if ($romanNumeral === 'C') {
            return 100;
        } else if ($romanNumeral === 'D') {
            return 500;
        } else if ($romanNumeral === 'M') {
            return 1000;
        } else {
            return 0;
        }
    }
}
