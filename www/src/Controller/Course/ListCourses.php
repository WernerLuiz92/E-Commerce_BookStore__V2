<?php

namespace Werner\BookStore\Controller\Course;

use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\BookStore\Helper\HtmlRenderTrait;
use Werner\BookStore\Model\Entity\Course;

class ListCourses implements RequestHandlerInterface
{
    use HtmlRenderTrait;

    private $coursesRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->coursesRepository = $entityManager->getRepository(Course::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $courses = $this->coursesRepository->findAll();

        $html = $this->renderView('courses/listCourses.php', [
            'title' => 'Lista de Cursos',
            'activePage' => '/listar-cursos',
            'courses' => $courses,
        ]);

        return new Response(200, [], $html);
    }
}
