<?php

namespace App\Service\Collection;

use ArrayIterator;
use IteratorAggregate;
use Traversable;
use App\Service\Generator\Generator;

/**
 * @implements IteratorAggregate<int, Generator>
 */
class GeneratorCollection implements IteratorAggregate
{
    /**
     * @var Generator[] 
     */
    private array $_list = [];

    public function add(Generator $generator): void
    {
        $this->_list[] = $generator;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->_list);
    }
}
