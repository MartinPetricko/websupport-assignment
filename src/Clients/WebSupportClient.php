<?php

namespace App\Clients;

use Exception;
use App\Entities\WebSupport\DnsRecords\A;
use App\Entities\WebSupport\DnsRecordList;
use App\Entities\WebSupport\DnsRecords\NS;
use App\Entities\WebSupport\DnsRecords\MX;
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

        $a_records     = [];
        $aaaa_records  = [];
        $aname_records = [];
        $cname_records = [];
        $mx_records    = [];
        $ns_records    = [];
        $srv_records   = [];
        $txt_records   = [];

        foreach ($body['items'] as $record) {
            if ($record['type'] === DnsRecord::A) {
                $A = new A();
                $A->fill($record);
                $a_records[] = $A;
            } else if ($record['type'] === DnsRecord::AAAA) {
                $AAAA = new AAAA();
                $AAAA->fill($record);
                $aaaa_records[] = $AAAA;
            } else if ($record['type'] === DnsRecord::ANAME) {
                $ANAME = new ANAME();
                $ANAME->fill($record);
                $aname_records[] = $ANAME;
            } else if ($record['type'] === DnsRecord::CNAME) {
                $CNAME = new CNAME();
                $CNAME->fill($record);
                $cname_records[] = $CNAME;
            } else if ($record['type'] === DnsRecord::MX) {
                $MX = new MX();
                $MX->fill($record);
                $mx_records[] = $MX;
            } else if ($record['type'] === DnsRecord::NS) {
                $NS = new NS();
                $NS->fill($record);
                $ns_records[] = $NS;
            } else if ($record['type'] === DnsRecord::SRV) {
                $SRV = new SRV();
                $SRV->fill($record);
                $srv_records[] = $SRV;
            } else if ($record['type'] === DnsRecord::TXT) {
                $TXT = new TXT();
                $TXT->fill($record);
                $txt_records[] = $TXT;
            }
        }

        $dnsRecordList = new DnsRecordList();

        $dnsRecordList->setARecords($a_records);
        $dnsRecordList->setAaaaRecords($aaaa_records);
        $dnsRecordList->setAnameRecords($aname_records);
        $dnsRecordList->setCnameRecords($cname_records);
        $dnsRecordList->setMxRecords($mx_records);
        $dnsRecordList->setNsRecords($ns_records);
        $dnsRecordList->setSrvRecords($srv_records);
        $dnsRecordList->setTxtRecords($txt_records);

        return $dnsRecordList;
    }

    public function createRecord(string $domain_name, DnsRecord $dnsRecord): DnsRecord
    {
        $response = $this->postRequest("/v1/user/self/zone/$domain_name/record", $dnsRecord->toArray());

        $body = $response->json();

        if (!$response->successful() || $body['status'] !== 'success') {
            $error_message = '';

            foreach ($body['errors'] as $field => $errors) {
                foreach ($errors as $error) {
                    $error_message .= "$field: $error\n";
                }
            }

            throw new Exception($error_message);
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
