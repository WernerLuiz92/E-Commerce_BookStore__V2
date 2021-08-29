<?php

namespace Werner\BookStore\Infra;

use Dotenv\Dotenv;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class EntityManagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {
        $dotenv = Dotenv::createMutable(__DIR__ . '/../../');
        $dotenv->load();
        $dotenv->required(['DB_DRIVER', 'DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASSWORD']);
        
        $paths = [__DIR__.'/../Model/Entity'];
        $isDevMode = true;

        $dbParams = [
            'driver' => $_ENV['DB_DRIVER'],
            'host' => $_ENV['DB_HOST'],
            'dbname'   => $_ENV['DB_NAME'],
            'user'     => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'],
        ];

        $config = Setup::createAnnotationMetadataConfiguration(
            $paths,
            $isDevMode
        );

        return EntityManager::create($dbParams, $config);
    }
}
