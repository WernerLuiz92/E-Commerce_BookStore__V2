<?php

use Dotenv\Dotenv;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Container\ContainerInterface;
use Werner\BookStore\Helper\PathHandler;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Http\Server\RequestHandlerInterface;

session_start();

require_once __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv::createMutable(__DIR__ . '/../');
$dotenv->load();
$dotenv->required(['DB_DRIVER', 'DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASSWORD']);

$routes = require_once __DIR__.'/../config/routes.php';

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();

$classController = PathHandler::handle($request, $routes);

/** @var ContainerInterface $container */
$container = require_once __DIR__.'/../config/dependencies.php';

/** @var RequestHandlerInterface $controller */
$controller = $container->get($classController);
$response = $controller->handle($request);

foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
