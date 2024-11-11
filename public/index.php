<?php

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use App\Service\Converter\Rot13Converter;
use App\Service\Converter\PatternConverter;
use App\Service\Collection\GeneratorCollection;
use App\Service\Collection\ConverterCollection;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$container = new ContainerBuilder();
$container
    ->register('alphanum1', 'App\Service\Generator\AlphanumericGenerator')
    ->addArgument(5);

$container
    ->register('alphanum2', 'App\Service\Generator\AlphanumericGenerator')
    ->addArgument(10);

$container
    ->register('alphanum3', 'App\Service\Generator\AlphanumericGenerator')
    ->addArgument(15);    


$container->register('pattern_converter', 'App\Service\Converter\PatternConverter');
$container->register('rot13_converter', 'App\Service\Converter\Rot13Converter');


$generators = new GeneratorCollection();
$generators->add($container->get('alphanum1'));
$generators->add($container->get('alphanum2'));
$generators->add($container->get('alphanum3'));

$converters = new ConverterCollection();
$converters->add($container->get('pattern_converter'));
$converters->add($container->get('rot13_converter'));

foreach ($generators as $generator) {
    $random_string = $generator->generate();
    echo $random_string;
    echo '<br>';
    echo $converters->getRandomConverter()->convert($random_string);
    echo '<br>';
}
