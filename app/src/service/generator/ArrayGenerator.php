<?php

namespace App\Service\Generator;

use App\Service\Generator\AlphanumericGenerator;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ArrayGenerator
{
    function __construct(public $array_length, public $string_length) {}

    public function generate(): array
    {
        $container = new ContainerBuilder();
        $container
            ->register('alphanum_generator', 'App\Service\Generator\AlphanumericGenerator')
            ->addArgument($this->string_length);

        $array = [];
        for ($i = 0; $i < $this->array_length; $i++) {
            $array[] = $container->get('alphanum_generator')->generate();
        }
        return $array;
    }
}

