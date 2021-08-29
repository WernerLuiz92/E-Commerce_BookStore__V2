<?php

namespace Werner\BookStore\Controller\Auth;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\BookStore\Helper\FlashMessageTrait;

class Logout implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        session_destroy();

        session_start();
        $this->setFlashMessage('info', 'Usuário desconectado!', true);

        return new Response(302, [
            'Location' => '/',
        ]);
    }
}
