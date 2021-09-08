<?php

namespace Werner\BookStore\Controller\Hash;

use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\BookStore\Helper\FlashMessageTrait;
use Werner\BookStore\Model\Entity\Hash;

class PersistHash implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $parsedBody = $request->getParsedBody();

        $id = filter_var($parsedBody['id'], FILTER_VALIDATE_INT);
        $link = filter_var($parsedBody['link'], FILTER_SANITIZE_URL);

        if (is_null($id) || $id === false) {
            $hash = $this->newHash($link);
            $message = "Link {$hash->getHash()} salvo com sucesso!";
        } else {
            $hash = $this->updateHash($id, $link);
            $message = "Link {$hash->getHash()} alterado com sucesso!";
        }

        $this->entityManager->persist($hash);
        $this->entityManager->flush();

        $this->setFlashMessage('success', $message, true);

        // Implementar verificação, se usuário root estiver logado, redirecionar para tela de links

        return new Response(302, [
            'Location' => '/hash',
        ]);
    }

    private function newHash(string $link): Hash
    {
        $course = new Hash($link);

        return $course;
    }

    private function updateHash(int $id, string $link)
    {
        $hash = $this->entityManager
            ->getReference(Hash::class, $id);

        $hash->setHash($link);

        return $hash;
    }
}
