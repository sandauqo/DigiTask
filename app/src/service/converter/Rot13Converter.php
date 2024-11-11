<?php

namespace App\Service\Converter;

use App\Service\Converter\Converter;

class Rot13Converter implements Converter
{

    public function convert(string $string): string
    {
        $converted = '';
        foreach (str_split($string) as $char) {
            $code = ord($char);
            for ($i = 0; $i < 13; $i++) {
                if ($code == 57) {
                    $code = 65;
                } else if ($code == 90) {
                    $code = 97;
                } else if ($code == 122) {
                    $code = 48;
                } else {
                    $code++;
                }
            }
            $converted .= chr($code);
        }
        return $converted;
    }
}
