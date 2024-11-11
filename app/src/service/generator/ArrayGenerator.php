<?php

namespace App\Service\Generator;

use App\Service\Generator\AlphanumericGenerator;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ArrayGenerator
{
    function __construct(private int $array_length, private int $string_length)
    {
    }

    /**
     * @return array<string> 
     */
    public function generate()
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

