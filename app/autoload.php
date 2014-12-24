<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

$loader->add('Model', __DIR__.'/../src/AppBundle');

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
