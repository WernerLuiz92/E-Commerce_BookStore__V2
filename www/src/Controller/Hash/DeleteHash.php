<?php

namespace Werner\BookStore\Controller\Hash;

use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\BookStore\Helper\FlashMessageTrait;
use Werner\BookStore\Model\Entity\Hash;

class DeleteHash implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $queryParams = $request->getQueryParams();

        $id = filter_var($queryParams['id'], FILTER_VALIDATE_INT);

        $response = new Response(302, [
            'Location' => '/links',
        ]);

        if (is_null($id) || $id === false) {
            $this->setFlashMessage('warning', 'Por favor verifique.', false, 'ID inválido ou em branco!');

            return $response;
        }

        $hash = $this->entityManager->find(Hash::class, $id);

        if (is_null($hash)) {
            $this->setFlashMessage('danger', 'Por favor verifique.', false, 'ID não encontrado!');

            return $response;
        }

        $this->setFlashMessage('success', "Link {$hash->getHash()} excluído!", true);

        $this->entityManager->remove($hash);
        $this->entityManager->flush();

        return $response;
    }
}
