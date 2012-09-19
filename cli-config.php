<?php
require_once 'bootstrap.php';

use Doctrine\Common\ClassLoader;

// MongoDB Classes
$classSymfonyLoader = new ClassLoader('Symfony\Component\Console', __DIR__ . '/lib/vendor');
$classSymfonyLoader->register();


$helpers = array(
    'dm' => new Doctrine\ODM\MongoDB\Tools\Console\Helper\DocumentManagerHelper($dm),
);