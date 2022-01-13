<?php

namespace App\Entities\WebSupport\DnsRecords;

use App\Entities\Entity;

abstract class DnsRecord extends Entity
{
    public const A     = 'A';
    public const AAAA  = 'AAAA';
    public const ANAME = 'ANAME';
    public const CNAME = 'CNAME';
    public const MX    = 'MX';
    public const NS    = 'NS';
    public const SRV   = 'SRV';
    public const TXT   = 'TXT';

    protected int $id;

    protected string $type;

    protected string $name;

    protected string $content;

    protected ?int $ttl;

    protected ?string $note;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getTtl(): ?int
    {
        return $this->ttl;
    }

    public function setTtl(?int $ttl): void
    {
        $this->ttl = $ttl;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): void
    {
        $this->note = $note;
    }
}