<?php

namespace App\Entities\WebSupport\DnsRecords;

class SRV extends DnsRecord
{
    protected int $prio;

    protected int $port;

    protected int $weight;

    protected ?string $ips;

    public function getPrio(): int
    {
        return $this->prio;
    }

    public function setPrio(int $prio): void
    {
        $this->prio = $prio;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function setPort(int $port): void
    {
        $this->port = $port;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    public function getIps(): string
    {
        return $this->ips;
    }

    public function setIps(?string $ips): void
    {
        $this->ips = $ips;
    }
}