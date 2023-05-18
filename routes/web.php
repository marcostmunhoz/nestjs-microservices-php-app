<?php

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('simulate-account-creation', function () {
    $id = (string) Str::uuid();

    $account = [
        'accountId' => $id,
        'email' => "{$id}@example.com",
    ];

    Redis::publish('account.created', json_encode($account));

    return 'Event published.';
});
