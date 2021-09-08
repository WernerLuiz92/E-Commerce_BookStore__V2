<?php

namespace Werner\BookStore\Helper;

trait HtmlRenderTrait
{
    public function renderView(string $content, array $data): string
    {
        extract($data);
        ob_start();
        require_once __DIR__.'/../View/layout.php';
        $view = ob_get_clean();

        return $view;
    }
}
