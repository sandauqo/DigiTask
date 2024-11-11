<?php

namespace App\Service\Converter;

use App\Service\Converter\Converter;

class PatternConverter implements Converter
{

    /**
     * @var array<string> 
     */
    private array $_alphabetUpper;
    /**
     * @var array<string> 
     */
    private array $_alphabetLower;

    function __construct()
    {
        $this->_alphabetUpper = range('A', 'Z');
        $this->_alphabetLower = range('a', 'z');
    }

    // 22aAcd Output: 22/1/1/3/4
    public function convert(string $string): string
    {
        $converted = '';
        $lastChar = null;
        foreach (str_split($string) as $char) {
            $code = ord($char);
            if ($this->_isNumber($code)) {
                if ($this->_isLastCharLetter($lastChar)) {
                    $converted .= '/';
                }
                $converted .= $char;
            } else if ($key = $this->_findLetterPosition($char)) {
                if (strlen($converted)) {
                    $converted .= '/';
                }
                $converted .= $key;
            } else {
                // unexpected char, skip
            }
            $lastChar = $char;
        }
        return $converted;
    }

    private function _isNumber(int $code): bool
    {
        return $code >= 48 && $code <= 57;
    }

    private function _findLetterPosition(?string $char): ?string
    {
        $key = array_search($char, $this->_alphabetUpper);
        if ($key || $key === 0) {
            return strval($key + 1);
        }
        $key = array_search($char, $this->_alphabetLower);
        if ($key || $key === 0) {
            return strval($key + 1);
        }
        return null;
    }

    private function _isLastCharLetter(?string $char): bool
    {
        return $char && !$this->_isNumber(ord($char));
    }
}
