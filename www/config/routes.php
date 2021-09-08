<?php

use Werner\BookStore\Controller\HomePage;
use Werner\BookStore\Controller\Auth\Logout;
use Werner\BookStore\Controller\PageNotFound;
use Werner\BookStore\Controller\Auth\LoginForm;
use Werner\BookStore\Controller\Course\Persist;
use Werner\BookStore\Controller\Hash\ListLinks;
use Werner\BookStore\Controller\Hash\InsertHash;
use Werner\BookStore\Controller\Hash\PersistHash;
use Werner\BookStore\Controller\Auth\ValidateLogin;
use Werner\BookStore\Controller\Course\ListCourses;
use Werner\BookStore\Controller\Course\DeleteCourse;
use Werner\BookStore\Controller\Course\InsertCourse;
use Werner\BookStore\Controller\Course\UpdateCourse;
use Werner\BookStore\Controller\Course\ListCoursesXML;
use Werner\BookStore\Controller\Course\ListCoursesJson;
use Werner\BookStore\Controller\Hash\DeleteHash;
use Werner\BookStore\Controller\Unauthorized;

$routes = [
];

$routes = [
    'needAuth' => [
        'root' => [
            // Acesso mais alto
            '/links' => ListLinks::class,
            '/excluir-link' => DeleteHash::class,
        ],
        'admin' => [
            // Acesso administrativo
        ],
        'team' => [
            // Acesso a vendas e alguns relatórios e cadastros
        ],
        'costumer' => [
            // Acesso geral ao perfil, pedidos, compras e etc...
            '/listar-cursos' => ListCourses::class,
            '/novo-curso' => InsertCourse::class,
            '/salvar-curso' => Persist::class,
            '/excluir-curso' => DeleteCourse::class,
            '/alterar-curso' => UpdateCourse::class,
            '/logout' => Logout::class,
        ],
    ],
    'byPass' => [

        // Acesso à loja, login, homePage e outros de acesso geral
        '/' => HomePage::class,
        '/*' => PageNotFound::class,
        '/unauthorized' => Unauthorized::class,
        '/login' => LoginForm::class,
        '/realiza-login' => ValidateLogin::class,
        '/listarCursosJson' => ListCoursesJson::class,
        '/listarCursosXML' => ListCoursesXML::class,
        '/resetar-senha' => LoginForm::class,
        '/hash' => InsertHash::class,
        '/salvar-hash' => PersistHash::class,
    ],
];

return $routes;
