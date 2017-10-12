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
        $sum = 0;
        $prevDigit = 0;
        for ($i = strlen($romanNumeral) -1; $i >= 0; $i--) {
            $current = 0;
            $symbol  = $romanNumeral[$i];
            if (array_key_exists($symbol, $this->symbols)) {
                $current = $this->symbols[$symbol];
            }

            $multiplier = 1;
            if ($current < $prevDigit) {
                $multiplier = -1;
            }

            $sum += ($current * $multiplier);

            $prevDigit = $current;
        }

        return (int) $sum;
    }
}
