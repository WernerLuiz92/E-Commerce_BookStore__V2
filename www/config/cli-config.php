<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Werner\BookStore\Infra\EntityManagerCreator;

require_once __DIR__.'/../vendor/autoload.php';

return ConsoleRunner::createHelperSet(
    (new EntityManagerCreator())->getEntityManager()
);
