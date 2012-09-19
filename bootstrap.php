<?php
/**
 * Bootstrap file
 */
require 'lib/vendor/doctrine-common/lib/Doctrine/Common/ClassLoader.php';

use Doctrine\Common\ClassLoader,
    Doctrine\Common\Annotations\AnnotationReader,
    Doctrine\ODM\MongoDB\DocumentManager,
    Doctrine\ODM\MongoDB\Configuration,
    Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver,
    Doctrine\MongoDB\Connection;


// ODM Classes
$classODMLoader = new ClassLoader('Doctrine\ODM\MongoDB', __DIR__ . '/lib/vendor/doctrine-mongodb-odm/lib');
$classODMLoader->register();

// Common Classes
$classCommonLoader = new ClassLoader('Doctrine\Common', __DIR__ . '/lib/vendor/doctrine-common/lib');
$classCommonLoader->register();

// MongoDB Classes
$classMongoDBLoader = new ClassLoader('Doctrine\MongoDB', __DIR__ . '/lib/vendor/doctrine-mongodb/lib');
$classMongoDBLoader->register();

// Models classes
$classLoader = new ClassLoader('Documents', __DIR__ . '/src');
$classLoader->register();

$config = new Configuration();

$config->setDefaultDB('blog_db');

$config->setProxyDir(__DIR__ . '/cache/proxies');
$config->setProxyNamespace('Proxies');

$config->setHydratorDir(__DIR__ . '/cache/hydrators');
$config->setHydratorNamespace('Hydrators');

$reader = new AnnotationReader();
$config->setMetadataDriverImpl(new AnnotationDriver($reader, __DIR__ . '/src/Documents'));

AnnotationDriver::registerAnnotationClasses();

$dm = DocumentManager::create(new Connection(), $config);
