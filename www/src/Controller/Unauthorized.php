<?php

namespace Werner\BookStore\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\BookStore\Helper\FlashMessageTrait;
use Werner\BookStore\Helper\HtmlRenderTrait;

class Unauthorized implements RequestHandlerInterface
{
    use HtmlRenderTrait;
    use FlashMessageTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $this->setFlashMessage('danger', '<i class="fas fa-exclamation-triangle me-1"></i> Acesso não autorizado!');

        $html = $this->renderView('unauthorized.php', [
            'title' => '403 - Acesso não autorizado!',
            'activePage' => '',
        ]);

        return new Response(403, [], $html);
    }
}
