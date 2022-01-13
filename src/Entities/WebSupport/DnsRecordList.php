<?php

namespace App\Entities\WebSupport;

use App\Entities\Entity;
use App\Entities\WebSupport\DnsRecords\A;
use App\Entities\WebSupport\DnsRecords\NS;
use App\Entities\WebSupport\DnsRecords\MX;
use App\Entities\WebSupport\DnsRecords\TXT;
use App\Entities\WebSupport\DnsRecords\SRV;
use App\Entities\WebSupport\DnsRecords\AAAA;
use App\Entities\WebSupport\DnsRecords\CNAME;
use App\Entities\WebSupport\DnsRecords\ANAME;

class DnsRecordList extends Entity
{
    /**
     * @var A[]
     */
    protected array $a_records;

    /**
     * @var AAAA[]
     */
    protected array $aaaa_records;

    /**
     * @var ANAME[]
     */
    protected array $aname_records;

    /**
     * @var CNAME[]
     */
    protected array $cname_records;

    /**
     * @var MX[]
     */
    protected array $mx_records;

    /**
     * @var NS[]
     */
    protected array $ns_records;

    /**
     * @var SRV[]
     */
    protected array $srv_records;

    /**
     * @var TXT[]
     */
    protected array $txt_records;

    public function getARecords(): array
    {
        return $this->a_records;
    }

    public function setARecords(array $A_records): void
    {
        $this->a_records = $A_records;
    }

    public function getAaaaRecords(): array
    {
        return $this->aaaa_records;
    }

    public function setAaaaRecords(array $aaaa_records): void
    {
        $this->aaaa_records = $aaaa_records;
    }

    public function getAnameRecords(): array
    {
        return $this->aname_records;
    }

    public function setAnameRecords(array $aname_records): void
    {
        $this->aname_records = $aname_records;
    }

    public function getCnameRecords(): array
    {
        return $this->cname_records;
    }

    public function setCnameRecords(array $cname_records): void
    {
        $this->cname_records = $cname_records;
    }

    public function getMxRecords(): array
    {
        return $this->mx_records;
    }

    public function setMxRecords(array $mx_records): void
    {
        $this->mx_records = $mx_records;
    }

    public function getNsRecords(): array
    {
        return $this->ns_records;
    }

    public function setNsRecords(array $ns_records): void
    {
        $this->ns_records = $ns_records;
    }

    public function getSrvRecords(): array
    {
        return $this->srv_records;
    }

    public function setSrvRecords(array $srv_records): void
    {
        $this->srv_records = $srv_records;
    }

    public function getTxtRecords(): array
    {
        return $this->txt_records;
    }

    public function setTxtRecords(array $txt_records): void
    {
        $this->txt_records = $txt_records;
    }
}
