<?php

namespace Werner\BookStore\Controller\Course;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\BookStore\Model\Entity\Course;

class ListCoursesJson implements RequestHandlerInterface
{
    private ObjectRepository $coursesRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->coursesRepository = $entityManager->getRepository(Course::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $courses = $this->coursesRepository->findAll();

        return new Response(200, [
            'Content-Type' => 'application/json',
        ], json_encode($courses));
    }
}
