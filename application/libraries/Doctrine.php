<?php
/**
 * Part of CodeIgniter Doctrine
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/codeigniter-doctrine
 */

/*
 * This code is based on http://doctrine-orm.readthedocs.org/en/latest/cookbook/integrating-with-codeigniter.html
 */
include_once FCPATH . 'vendor/autoload.php';

use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\EntityManager;

class Doctrine
{
    public $em;

    public function __construct()
    {


        // Load the database configuration from CodeIgniter
        require APPPATH . 'config/database.php';

        $connection_options = array(
            'driver'        => $db['default']['dbdriver'],
            'user'          => $db['default']['username'],
            'password'      => $db['default']['password'],
            'host'          => $db['default']['hostname'],
            'dbname'        => $db['default']['database'],
            'charset'       => $db['default']['char_set'],

        );

        // With this configuration, your model files need to be in application/models/Entity
        // e.g. Creating a new Entity\User loads the class from application/models/Entity/User.php
        $models_namespace = 'Entity';
        $models_path = APPPATH . 'models';
        $proxies_dir = APPPATH . 'models/Proxies';
        $metadata_paths = array(APPPATH . 'models/Entity');
        // Set $dev_mode to TRUE to disable caching while you develop
        $config = Setup::createAnnotationMetadataConfiguration($metadata_paths, $dev_mode = true, $proxies_dir);
        $this->em = EntityManager::create($connection_options, $config);

        $loader = new ClassLoader($models_namespace, $models_path);
        $loader->register();
    }
}