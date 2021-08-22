<?php

namespace Werner\BookStore\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {
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
