<?php

namespace App\Http\Controllers;

use App\Helpers\Request;
use App\Helpers\Response;
use App\Clients\WebSupportClient;

class DnsRecordController
{
    private WebSupportClient $webSupportClient;

    public function __construct()
    {
        $this->webSupportClient = new WebSupportClient;
    }

    public function index(Request $request): void
    {
        Response::view('dns_records/index', [
            'dnsRecordList' => $this->webSupportClient->getRecords(env('APP_DOMAIN')),
        ]);
    }

    public function create(Request $request): void
    {
        Response::view('dns_records/create');
    }

    public function store(Request $request): void
    {
        $dns_record_object = "App\\Entities\\WebSupport\\DnsRecords\\" . $request->input('type');

        $dnsRecord = new $dns_record_object;

        $dnsRecord->fill($request->input());

        $this->webSupportClient->createRecord(env('APP_DOMAIN'), $dnsRecord);

        Response::redirect('/dns-records');
    }

    public function destroy(Request $request, string $dns_record_id): void
    {
        $this->webSupportClient->deleteRecord(env('APP_DOMAIN'), $dns_record_id);

        Response::redirect('/dns-records');
    }
}
