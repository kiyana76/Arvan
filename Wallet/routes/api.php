<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/wallet/deposit', 'WalletController@deposit');
Route::get('/wallet/withdraw', 'WalletController@withdraw');
Route::get('/wallet/charge', 'WalletController@charge');
