<?php

use Werner\BookStore\Controller\Course\DeleteCourse;
use Werner\BookStore\Controller\HomePage;
use Werner\BookStore\Controller\Course\InsertCourse;
use Werner\BookStore\Controller\Course\ListCourses;
use Werner\BookStore\Controller\Course\ListCoursesJson;
use Werner\BookStore\Controller\Course\ListCoursesXML;
use Werner\BookStore\Controller\Auth\LoginForm;
use Werner\BookStore\Controller\Auth\Logout;
use Werner\BookStore\Controller\PageNotFound;
use Werner\BookStore\Controller\Course\Persist;
use Werner\BookStore\Controller\Course\UpdateCourse;
use Werner\BookStore\Controller\Auth\ValidateLogin;

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
