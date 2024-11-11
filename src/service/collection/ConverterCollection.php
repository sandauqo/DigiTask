<?php

namespace App\Service\Collection;

use ArrayIterator;
use IteratorAggregate;
use Traversable;
use App\Service\Converter\Converter;

/**
 * @implements IteratorAggregate<int, Converter>
 */
class ConverterCollection implements IteratorAggregate
{
    /**
     * @var Converter[] 
     */
    private array $_list = [];

    public function add(Converter $converter): void
    {
        $this->_list[] = $converter;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->_list);
    }

    public function getRandomConverter(): Converter
    {
        shuffle($this->_list);
        return $this->_list[0];
    } 
}
