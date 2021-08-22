<?php

use Werner\BookStore\Controller\DeleteCourse;
use Werner\BookStore\Controller\HomePage;
use Werner\BookStore\Controller\InsertCourse;
use Werner\BookStore\Controller\ListCourses;
use Werner\BookStore\Controller\ListCoursesJson;
use Werner\BookStore\Controller\ListCoursesXML;
use Werner\BookStore\Controller\LoginForm;
use Werner\BookStore\Controller\Logout;
use Werner\BookStore\Controller\PageNotFound;
use Werner\BookStore\Controller\Persist;
use Werner\BookStore\Controller\UpdateCourse;
use Werner\BookStore\Controller\ValidateLogin;

$routes = [
];

$routes = [
    'needAuth' => [
        '/listar-cursos' => ListCourses::class,
        '/novo-curso' => InsertCourse::class,
        '/salvar-curso' => Persist::class,
        '/excluir-curso' => DeleteCourse::class,
        '/alterar-curso' => UpdateCourse::class,
        '/logout' => Logout::class,
    ],
    'byPass' => [
        '/' => HomePage::class,
        '/*' => PageNotFound::class,
        '/login' => LoginForm::class,
        '/realiza-login' => ValidateLogin::class,
        '/listarCursosJson' => ListCoursesJson::class,
        '/listarCursosXML' => ListCoursesXML::class,
        '/resetar-senha' => LoginForm::class,
    ],
];

return $routes;
