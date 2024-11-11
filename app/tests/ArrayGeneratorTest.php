<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use App\Service\Generator\ArrayGenerator;

class ArrayGeneratorTest extends TestCase
{
    #[Test]
    public function verifyArrayLength(): void
    {
        $generator = new ArrayGenerator(10, 5);
        $result = $generator->generate();
        $this->assertEquals(count($result), 10);
    }

    #[Test]
    public function verifyStringLength(): void
    {
        $generator = new ArrayGenerator(10, 5);
        $result = $generator->generate();
        $this->assertEquals(strlen($result[0]), 5);
    }
}