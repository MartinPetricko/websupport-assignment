<?php

namespace App\Entities\WebSupport\DnsRecords;

class MX extends DnsRecord
{
    protected int $prio;

    public function getPrio(): int
    {
        return $this->prio;
    }

    public function setPrio(int $prio): void
    {
        $this->prio = $prio;
    }
}