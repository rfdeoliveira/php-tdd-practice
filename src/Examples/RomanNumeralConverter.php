<?php

namespace TDD\Examples;

class RomanNumeralConverter
{
    private $symbols = array(
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    );

    public function toInt($romanNumeral)
    {
        if (! array_key_exists($romanNumeral, $this->symbols)) {
            return 0;
        }

        return $this->symbols[$romanNumeral];
    }
}
