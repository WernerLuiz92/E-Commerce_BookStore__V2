<?php

namespace Werner\BookStore\Controller\Hash;

use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\BookStore\Helper\HtmlRenderTrait;
use Werner\BookStore\Model\Entity\Hash;

class ListLinks implements RequestHandlerInterface
{
    use HtmlRenderTrait;

    private $hashesRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->hashesRepository = $entityManager->getRepository(Hash::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $links = $this->hashesRepository->findAll();

        $html = $this->renderView('hashes/listLinks.php', [
            'title' => 'Links',
            'activePage' => '/links',
            'links' => $links,
        ]);

        return new Response(200, [], $html);
    }
}
