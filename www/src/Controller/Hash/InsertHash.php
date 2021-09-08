<?php

namespace Werner\BookStore\Controller\Hash;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\BookStore\Helper\HtmlRenderTrait;

class InsertHash implements RequestHandlerInterface
{
    use HtmlRenderTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderView('hashes/formHash.php', [
            'title' => 'Criar nova Hash',
            'activePage' => '/hash',
        ]);

        return new Response(200, [], $html);
    }
}
