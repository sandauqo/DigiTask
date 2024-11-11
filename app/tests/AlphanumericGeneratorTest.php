<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use App\Service\Generator\AlphanumericGenerator;

class AlphanumericGeneratorTest extends TestCase
{
    #[Test]
    public function verifyLength(): void
    {
        $generator = new AlphanumericGenerator(10);
        $result = $generator->generate();
        $this->assertEquals(strlen($result), 10);
    }
}