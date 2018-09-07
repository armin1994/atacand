<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
define('APPPATH', dirname(__FILE__).'/');
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');
define('BASEPATH', APPPATH . '/../system/');
define('FCPATH', APPPATH . '/../');

include FCPATH . 'vendor/autoload.php';
if (! file_exists($file_path = APPPATH.'config/'.ENVIRONMENT.'/database.php')
    && ! file_exists($file_path = APPPATH.'config/database.php')) {
    throw new Exception('The configuration file database.php does not exist.');
}
require $file_path;

$classLoader = new \Doctrine\Common\ClassLoader('Entity', __DIR__);
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Proxies', __DIR__);
$classLoader->register();

// config
$config = new \Doctrine\ORM\Configuration();
$config->setMetadataDriverImpl($config->newDefaultAnnotationDriver(__DIR__ . '/models/Entity'));
$config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
$config->setProxyDir(__DIR__ . '/Proxies');
$config->setProxyNamespace('Proxies');


$connectionParams = array(
    'driver' => $db['default']['dbdriver'],
    'host' => $db['default']['hostname'],
    'user' => $db['default']['username'],
    'password' => $db['default']['password'],
    'dbname' => $db['default']['database'],
    'charset' => $db['default']['char_set'],
);

$em = \Doctrine\ORM\EntityManager::create($connectionParams, $config);

// custom datatypes (not mapped for reverse engineering)
$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('set', 'string');
$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

// fetch metadata
$driver = new \Doctrine\ORM\Mapping\Driver\DatabaseDriver(
                $em->getConnection()->getSchemaManager()
);
$driver->setNamespace('models/Entity');
$em->getConfiguration()->setMetadataDriverImpl($driver);
$cmf = new \Doctrine\ORM\Tools\DisconnectedClassMetadataFactory($em);
$cmf->setEntityManager($em);
$classes = $driver->getAllClassNames();
$metadata = $cmf->getAllMetadata();
$generator = new Doctrine\ORM\Tools\EntityGenerator();
$generator->setUpdateEntityIfExists(true);
$generator->setGenerateStubMethods(true);
$generator->setGenerateAnnotations(true);
$generator->generate($metadata, __DIR__ . '/models/Entity');
print 'Done!';