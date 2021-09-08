<?php

namespace Werner\BookStore\Helper;

use Psr\Http\Message\ServerRequestInterface;

class PathHandler
{
    public static function handle(ServerRequestInterface $request, array $routes): string
    {
        $uri = $request->getUri();
        $path = $uri->getPath();

        $needAuthRoutes = array_merge(
            $routes['needAuth']['root'],
            $routes['needAuth']['admin'],
            $routes['needAuth']['team'],
            $routes['needAuth']['costumer']
        );

        $classControllerRoutes = array_merge(
            $needAuthRoutes,
            $routes['byPass']
        );

        if (!array_key_exists($path, $classControllerRoutes)) {
            $path = '/*';
        }

        if (!isset($_SESSION['logged_user']) && array_key_exists($path, $needAuthRoutes)) {
            $path = '/login';
        }

        if (isset($_SESSION['logged_user'])) {
            if (!in_array($_SESSION['logged_user_access_level'], ['r']) && array_key_exists($path, $routes['needAuth']['root'])) {
                $path = '/unauthorized';
            }
    
            if (!in_array($_SESSION['logged_user_access_level'], ['r', 'a']) && array_key_exists($path, $routes['needAuth']['admin'])) {
                $path = '/unauthorized';
            }
    
            if (!in_array($_SESSION['logged_user_access_level'], ['r', 'a', 't']) && array_key_exists($path, $routes['needAuth']['team'])) {
                $path = '/unauthorized';
            }
    
            if (!in_array($_SESSION['logged_user_access_level'], ['r', 'a', 't', 'c']) && array_key_exists($path, $routes['needAuth']['costumer'])) {
                $path = '/unauthorized';
            }
        }

        $classController = $classControllerRoutes[$path];

        return $classController;
    }
}
