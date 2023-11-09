<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersetujuanCuti;
use App\Http\Controllers\IdentityController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\ListCutiController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\PenghargaanController;
use App\Http\Controllers\admin\UserController;

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

Route::middleware('auth', 'UserAkses:hr')->group(function () {
    Route::get('/admin/user/detail/{id}', [UserController::class, 'showall']);
    Route::resource('/admin/user', UserController::class);
    Route::delete('/admin/user/softdelete/{id}', [UserController::class, 'softdelete']);
    Route::get('/admin/user/restore/{id}', [UserController::class, 'restore']);
    // Route::get('/user/{id}', [UserController::class, 'status']);
    // Route::get('/admin/user', [PegawaiController::class, 'index']);
});


Route::middleware('auth')->group(function () {
    Route::resource('/user/daftar-riwayat-hidup/identity', IdentityController::class);
    Route::delete('/user/daftar-riwayat-hidup/identitas/{id}', [IdentityController::class, 'softdelete']);
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
