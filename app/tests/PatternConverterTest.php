<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use App\Service\Converter\PatternConverter;

class PatternConverterTest extends TestCase
{
    #[Test]
    public function convertsExamplePattern(): void
    {
        $converter = new PatternConverter();
        $result = $converter->convert('22aAcd');
        $this->assertEquals($result, '22/1/1/3/4');
    }
}