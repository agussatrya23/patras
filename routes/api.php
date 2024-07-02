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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/iclock/devicecmd', [App\Http\Controllers\FingerController::class, 'devicecmd']);
Route::post('/iclock/cdata', [App\Http\Controllers\FingerController::class, 'getdata']);

Route::get('/iclock/cdata', [App\Http\Controllers\FingerController::class, 'inisialisasi']);
