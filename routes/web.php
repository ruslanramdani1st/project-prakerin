<?php

use App\Http\Controllers\AsalController;
use App\Http\Controllers\KeretaController;
use App\Http\Controllers\PenumpangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TujuanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Menampilkan Halaman Index
Route::get('/', function () {
    return view('welcome');
});

// ROLE
Route::middleware(['auth:sanctum', 'verified'])->get('redirects', 'App\Http\Controllers\AdminController@role');

// Laporan
Route::middleware(['auth:sanctum', 'verified'])->get('/Laporan', 'App\Http\Controllers\AdminController@laporan');

// Admin Controller
Route::middleware(['auth:sanctum', 'verified'])->get('Admin/Penumpang', 'App\Http\Controllers\AdminController@index')->name('DataPengguna');
Route::middleware(['auth:sanctum', 'verified'])->get('Admin/Dashboard', 'App\Http\Controllers\AdminController@dashboard', function () {
    return view('layouts.admin.dashboard');
})->name('DashboardAdmin');

// Penumpang Controller
Route::middleware(['auth:sanctum', 'verified'])->resource('penumpang', PenumpangController::class);
Route::middleware(['auth:sanctum', 'verified'])->get('Penumpang/Jadwal_Kereta', 'App\Http\Controllers\AdminController@dataJadwal')->name('jadwalKereta');

// Tabel Asal
Route::middleware(['auth:sanctum', 'verified'])->resource('/asal', AsalController::class);

// Tabel Tujuan
Route::middleware(['auth:sanctum', 'verified'])->resource('/tujuan', TujuanController::class);

// Tabel Kereta
Route::middleware(['auth:sanctum', 'verified'])->resource('/kereta', KeretaController::class);

// Tabel Transaksi
Route::middleware(['auth:sanctum', 'verified'])->resource('/transaksi', TransaksiController::class);

// Laporan Transaksi
Route::middleware(['auth:sanctum', 'verified'])->get('Admin/Laporan', 'App\Http\Controllers\AdminController@laporanTiket')->name('laporanTransaksi');

// Pengambilan Tiket
Route::middleware(['auth:sanctum', 'verified'])->get('Transaksi/Tiket/{id}', 'App\Http\Controllers\AdminController@getTiket')->name('GETiket');
