<?php

namespace App\Controller;

abstract class AbstractController
{
    protected function render(string $template, array $data = []): void
    {
        extract($data);

        ob_start();
        require __DIR__ . '/../../views/' . $template . '.php';
        $content = ob_get_clean();

        require __DIR__ . '/../../views/base.php';
    }

    protected function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }

    public function renderError(int $code = 404, string $message = null): void
    {
        http_response_code($code);

        if ($code === 404) {
            $this->render('error/404');
            exit;
        }
    }
}