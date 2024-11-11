<?php

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use App\Service\Converter\Rot13Converter;
use App\Service\Converter\PatternConverter;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$container = new ContainerBuilder();
$container
    ->register('alphanum_generator', 'App\Service\Generator\AlphanumericGenerator')
    ->addArgument(1);

$container
    ->register('array_generator', 'App\Service\Generator\ArrayGenerator')
    ->addArgument(10)
    ->addArgument(30);

echo $container->get('alphanum_generator')->generate();

echo '<pre>'; print_r($container->get('array_generator')->generate()); echo '</pre>';

$rotConverter = new Rot13Converter();
$string = 'ABCDIFGHIJKLMNOPQRSTUVWXYZ';
echo $rotConverter->convert($string);

$patternConverter = new PatternConverter();
echo $patternConverter->convert('22aAcd22sdfg897sdfg98');