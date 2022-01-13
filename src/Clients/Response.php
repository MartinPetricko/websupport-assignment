<?php

namespace App\Clients;

class Response
{
    private ?string $body;

    private int $code;

    public function getCode(): int
    {
        return $this->code;
    }

    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(?string $body): void
    {
        $this->body = $body;
    }

    public function json()
    {
        return json_decode($this->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }

    public function successful(): bool
    {
        return $this->getCode() >= 200 && $this->getCode() < 300;
    }
}