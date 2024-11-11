<?php

namespace App\Service\Generator;

class AlphanumericGenerator
{
    function __construct(public $length) {}

    public function generate(): string
    {
        $string = '';
        for ($i = 0; $i < $this->length; $i++) {
            $random_int = $this->getRandomChar();
            $string .= chr($random_int);
        }
        return $string;
    }

    private function getRandomChar(): int {
        // Digits: ASCII codes 48 to 57 represent the digits 0 to 9.
        // Uppercase Letters: ASCII codes 65 to 90 represent uppercase letters from ‘A’ to ‘Z’.
        // Lowercase Letters: ASCII codes 97 to 122 represent lowercase letters from ‘a’ to ‘z’.
        $choice = [[48, 57], [65, 90], [97, 122]];
        shuffle($choice);
        $min = $choice[0][0];
        $max = $choice[0][1];
        return random_int($min, $max);
    }
}

