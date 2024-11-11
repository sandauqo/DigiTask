<?php

namespace App\Service\Converter;

class PatternConverter
{
    private $alphabetUpper;
    private $alphabetLower;

    function __construct() {
        $this->alphabetUpper = range('A', 'Z');
        $this->alphabetLower = range('a', 'z');
    }

    // 22aAcd Output: 22/1/1/3/4
    public function convert($string): string
    {

        $converted = '';
        $lastChar = null;
        foreach (str_split($string) as $char) {
            $code = ord($char);
            if ($this->isNumber($code)) {
                if ($this->isLastCharLetter($lastChar)) {
                    $converted .= '/';
                }
                $converted .= $char;
            } else if ($key = $this->findLetterPosition($char)) {
                $converted .= '/';
                $converted .= $key;
            } else {
                // unexpected char, skip
            }
            $lastChar = $char;
        }
        return $converted;
    }

    private function isNumber($code) {
        return $code >= 48 && $code <= 57;
    }

    private function findLetterPosition($char) {
        $key = array_search($char, $this->alphabetUpper);
        if ($key || $key === 0) {
            return strval($key + 1);
        }
        $key = array_search($char, $this->alphabetLower);
        if ($key || $key === 0) {
            return strval($key + 1);
        }
        return false;
    }

    private function isLastCharLetter($char) {
        return $char && !$this->isNumber(ord($char));
    }
}

