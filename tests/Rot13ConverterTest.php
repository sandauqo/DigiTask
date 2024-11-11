<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use App\Service\Converter\Rot13Converter;

class Rot13ConverterTest extends TestCase
{
    #[Test]
    public function convertsUpperCase(): void
    {
        $converter = new Rot13Converter();
        $result = $converter->convert('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $this->assertEquals($result, 'NOPQRSTUVWXYZabcdefghijklm');
    }

    #[Test]
    public function convertsLowerCase(): void
    {
        $converter = new Rot13Converter();
        $result = $converter->convert('abcdefghijklmnopqrstuvwxyz');
        $this->assertEquals($result, 'nopqrstuvwxyz0123456789ABC');
    }

    #[Test]
    public function convertsDigits(): void
    {
        $converter = new Rot13Converter();
        $result = $converter->convert('0123456789');
        $this->assertEquals($result, 'DEFGHIJKLM');
    }
}