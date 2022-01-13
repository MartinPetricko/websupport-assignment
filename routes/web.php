<?php

use App\Helpers\Route;
use App\Http\Controllers\DnsRecordController;

/*
|--------------------------------------------------------------------------
|   DNS Records
|--------------------------------------------------------------------------
*/
Route::get('/', [new DnsRecordController, 'index']);
Route::get('/dns-records', [new DnsRecordController, 'index']);
Route::get('/dns-records/create', [new DnsRecordController, 'create']);
Route::post('/dns-records/store', [new DnsRecordController, 'store']);
Route::delete('/dns-records/{dns_record_id}', [new DnsRecordController, 'destroy']);
