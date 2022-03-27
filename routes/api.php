<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\AsalController;
use App\Http\Controllers\API\KeretaController;
use App\Http\Controllers\API\TujuanController;
use App\Http\Controllers\API\PenumpangController;
use App\Http\Controllers\API\TransaksiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('ApiAsal', AsalController::class);
Route::resource('ApiTujuan', TujuanController::class);
Route::resource('ApiKereta', KeretaController::class);
Route::resource('ApiPenumpang', PenumpangController::class);
Route::resource('ApiTransaksi', TransaksiController::class);
