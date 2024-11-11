<?php

namespace App\Service\Converter;

interface Converter
{
    /**
     * @return string
     */
    public function convert(string $string);
}