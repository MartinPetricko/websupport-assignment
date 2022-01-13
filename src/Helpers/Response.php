<?php

namespace App\Helpers;

class Response
{
    public static function view(string $view, array $data = []): void
    {
        extract($data, EXTR_OVERWRITE);

        include __DIR__ . "/../../resources/views/$view.php";
    }

    public static function redirect(string $url): void
    {
        header("Location: $url");
    }
}
