<?php

namespace App\Helpers;

class Request
{
    public array $query;

    public array $input;

    public array $files;

    private array $dynamic;

    public function __construct()
    {
        $this->query = $_GET;
        $this->input = $_POST;
        $this->files = $_FILES;

        $this->dynamic = $this->query;
    }

    public function __get(string $name)
    {
        return $this->dynamic[$name] ?? null;
    }

    public function __set(string $name, mixed $value): void
    {
        $this->dynamic[$name] = $value;
    }

    public function __isset(string $name): bool
    {
        return isset($this->dynamic[$name]);
    }

    public function query(string $key = null, mixed $default = null): mixed
    {
        return $key ? $this->query[$key] ?? $default : $this->query;
    }

    public function input(string $key = null, mixed $default = null): mixed
    {
        return $key ? $this->input[$key] ?? $default : $this->input;
    }
}
