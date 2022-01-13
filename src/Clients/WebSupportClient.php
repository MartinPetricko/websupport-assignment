<?php

namespace App\Clients;

use Exception;
use App\Entities\WebSupport\DnsRecords\A;
use App\Entities\WebSupport\DnsRecords\NS;
use App\Entities\WebSupport\DnsRecords\MX;
use App\Entities\WebSupport\DnsRecordList;
use App\Entities\WebSupport\DnsRecords\TXT;
use App\Entities\WebSupport\DnsRecords\SRV;
use App\Entities\WebSupport\DnsRecords\AAAA;
use App\Entities\WebSupport\DnsRecords\CNAME;
use App\Entities\WebSupport\DnsRecords\ANAME;
use App\Entities\WebSupport\DnsRecords\DnsRecord;

class WebSupportClient extends Client
{
    private const BASE_URL = "https://rest.websupport.sk";

    private string $api_key;

    private string $api_secret;

    public function __construct()
    {
        parent::__construct();

        $this->api_key    = env('WEBSUPPORT_API_KEY');
        $this->api_secret = env('WEBSUPPORT_API_SECRET');
    }

    public function getRecords(string $domain_name): DnsRecordList
    {
        $response = $this->getRequest("/v1/user/self/zone/$domain_name/record");

        $body = $response->json();

        if (!$response->successful()) {
            throw new Exception($body['message']);
        }

        $A_records     = [];
        $AAAA_records  = [];
        $ANAME_records = [];
        $CNAME_records = [];
        $MX_records    = [];
        $NS_records    = [];
        $SRV_records   = [];
        $TXT_records   = [];

        foreach ($body['items'] as $record) {
            if ($record['type'] === DnsRecord::A) {
                $A_record = new A();
                $A_record->fill($record);
                $A_records[] = $A_record;
            } else if ($record['type'] === DnsRecord::AAAA) {
                $AAAA_record = new AAAA();
                $AAAA_record->fill($record);
                $AAAA_records[] = $AAAA_record;
            } else if ($record['type'] === DnsRecord::ANAME) {
                $ANAME_record = new ANAME();
                $ANAME_record->fill($record);
                $ANAME_records[] = $ANAME_record;
            } else if ($record['type'] === DnsRecord::CNAME) {
                $CNAME_record = new CNAME();
                $CNAME_record->fill($record);
                $CNAME_records[] = $CNAME_record;
            } else if ($record['type'] === DnsRecord::MX) {
                $MX_record = new MX();
                $MX_record->fill($record);
                $MX_records[] = $MX_record;
            } else if ($record['type'] === DnsRecord::NS) {
                $NS_record = new NS();
                $NS_record->fill($record);
                $NS_records[] = $NS_record;
            } else if ($record['type'] === DnsRecord::SRV) {
                $SRV_record = new SRV();
                $SRV_record->fill($record);
                $SRV_records[] = $SRV_record;
            } else if ($record['type'] === DnsRecord::TXT) {
                $TXT_record = new TXT();
                $TXT_record->fill($record);
                $TXT_records[] = $TXT_record;
            }
        }

        $dnsRecordList = new DnsRecordList();

        $dnsRecordList->setARecords($A_records);
        $dnsRecordList->setAAAARecords($AAAA_records);
        $dnsRecordList->setANAMERecords($ANAME_records);
        $dnsRecordList->setCNAMERecords($CNAME_records);
        $dnsRecordList->setMXRecords($MX_records);
        $dnsRecordList->setNSRecords($NS_records);
        $dnsRecordList->setSRVRecords($SRV_records);
        $dnsRecordList->setTXTRecords($TXT_records);

        return $dnsRecordList;
    }

    public function createRecord(string $domain_name, DnsRecord $dnsRecord): DnsRecord
    {
        $response = $this->postRequest("/v1/user/self/zone/$domain_name/record", $dnsRecord->toArray());

        $body = $response->json();

        if (!$response->successful() || $body['status'] !== 'success') {
            throw new Exception($body['errors']['content']);
        }

        unset($body['item']['zone']);

        $dnsRecord->fill($body['item']);

        return $dnsRecord;
    }

    public function deleteRecord(string $domain_name, mixed $dns_record_id): void
    {
        $response = $this->deleteRequest("/v1/user/self/zone/$domain_name/record/$dns_record_id");

        $body = $response->json();

        if (!$response->successful()) {
            throw new Exception($body['message']);
        }
    }

    private function getRequest(string $url): Response
    {
        return $this->buildRequest($url, 'GET')->get($url);
    }

    private function postRequest(string $url, array $data = []): Response
    {
        return $this->buildRequest($url, 'POST')->post($url, $data);
    }

    private function deleteRequest(string $url, array $data = []): Response
    {
        return $this->buildRequest($url, 'DELETE')->delete($url, $data);
    }

    private function buildRequest(string $url, string $method): Client
    {
        $time = time();

        $signature = hash_hmac('sha1', "$method $url $time", $this->api_secret);

        return $this->withBasicAuth($this->api_key, $signature)
                    ->withHeaders([
                        'Date: ' . gmdate('Ymd\THis\Z', $time),
                        'Content-Type: application/json',
                    ])
                    ->baseUrl(self::BASE_URL);
    }
}
