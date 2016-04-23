<?php
namespace hybase\manager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

require_once __DIR__ . '/../../../vendor/autoload.php';

$paths = array (
		__DIR__ . '/entities' 
);
$isDevMode = false;
/* $connectionParams = array (
		'driver' => 'pdo_mysql',
		'host' => '192.168.164.134',
		'user' => 'baron',
		'password' => '123456',
		'dbname' => 'hyucms' ,
		'charset'=>'utf8'
); */

$connectionParams = array (
		'driver' => 'pdo_mysql',
		'host' => 'qdm225205388.my3w.com',
		'user' => 'qdm225205388',
		'password' => 'Xian528091535',
		'dbname' => 'qdm225205388_db',
		'charset'=>'utf8'
);

$config = Setup::createConfiguration ( $isDevMode );
$driver = new AnnotationDriver ( new AnnotationReader (), $paths );

// registering noop annotation autoloader - allow all annotations by default
AnnotationRegistry::registerLoader ( 'class_exists' );
$config->setMetadataDriverImpl($driver);
$entityManager = EntityManager::create($connectionParams, $config);
