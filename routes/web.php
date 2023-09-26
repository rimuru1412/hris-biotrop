<?php

use App\Http\Controllers\admin\PegawaiController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\IdentityController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\ListCutiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\PenghargaanController;
use App\Http\Controllers\PersetujuanCuti;
use App\Http\Controllers\PublikasiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth', 'UserAkses:admin')->group(function () {
    Route::get('/admin/data-pegawai', [PegawaiController::class, 'index']);
    Route::get('/admin/data-pegawai/detail/{id}', [PegawaiController::class, 'show']);
    Route::resource('/admin/user', UserController::class);
});


Route::middleware('auth')->group(function () {
    Route::resource('/user/daftar-riwayat-hidup/identity', IdentityController::class);
    Route::resource('/user/daftar-riwayat-hidup/keluarga', KeluargaController::class);
    Route::resource('/user/daftar-riwayat-hidup/pendidikan', PendidikanController::class);
    Route::resource('/user/daftar-riwayat-hidup/pengalaman', PengalamanController::class);
    Route::resource('/user/daftar-riwayat-hidup/pelatihan', PelatihanController::class);
    Route::resource('/user/daftar-riwayat-hidup/publikasi', PublikasiController::class);
    Route::resource('/user/daftar-riwayat-hidup/penghargaan', PenghargaanController::class);
    Route::resource('/user/cuti', CutiController::class);
    Route::get('/user/list-cuti', [ListCutiController::class, 'index']);
});

Route::middleware('auth', 'UserAkses:kepala')->group(function () {
    Route::get('/user/persetujuan-cuti', [PersetujuanCuti::class, 'index']);
    Route::get('/user/persetujuan-cuti/setujui_cuti/{id}', [PersetujuanCuti::class, 'setujui_cuti']);
    Route::get('/user/persetujuan-cuti/tolak_cuti/{id}', [PersetujuanCuti::class, 'tolak_cuti']);
});
