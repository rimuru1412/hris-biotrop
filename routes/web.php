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
use App\Http\Controllers\admin\PersetujuanCutiController;

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
    Route::resource('/admin/user', UserController::class);
    Route::get('/admin/user/detail/{id}', [UserController::class, 'showall']);
    Route::delete('/admin/user/softdelete/{id}', [UserController::class, 'softdelete']);
    Route::get('/admin/user/restore/{id}', [UserController::class, 'restore']);

    //identitas
    Route::get('/admin/user/detail/identity/{user:id}/create', [UserController::class, 'createidentitas']);
    Route::post('/admin/user/detail/identity/{user:id}/store', [UserController::class, 'storeidentitas']);
    Route::get('/admin/user/detail/identity/{identity:id}/edit', [UserController::class, 'editidentitas']);
    Route::put('/admin/user/detail/identity/{identity:id}', [UserController::class, 'updateidentitas']);

    //keluarga
    Route::get('/admin/user/detail/keluarga/{user:id}/create', [UserController::class, 'createkeluarga']);
    Route::post('/admin/user/detail/keluarga/{user:id}/store', [UserController::class, 'storekeluarga']);
    Route::get('/admin/user/detail/keluarga/{keluarga:id}/edit', [UserController::class, 'editkeluarga']);
    Route::put('/admin/user/detail/keluarga/{keluarga:id}', [UserController::class, 'updatekeluarga']);
    Route::delete('/admin/user/detail/keluarga/{keluarga:id}', [UserController::class, 'destroykeluarga']);

    //pendidikan
    Route::get('/admin/user/detail/pendidikan/{user:id}/create', [UserController::class, 'creatependidikan']);
    Route::post('/admin/user/detail/pendidikan/{user:id}/store', [UserController::class, 'storependidikan']);
    Route::get('/admin/user/detail/pendidikan/{pendidikan:id}/edit', [UserController::class, 'editpendidikan']);
    Route::put('/admin/user/detail/pendidikan/{pendidikan:id}', [UserController::class, 'updatependidikan']);
    Route::delete('/admin/user/detail/pendidikan/{pendidikan:id}', [UserController::class, 'destroypendidikan']);

    //pengalaman
    Route::get('/admin/user/detail/pengalaman/{user:id}/create', [UserController::class, 'createpengalaman']);
    Route::post('/admin/user/detail/pengalaman/{user:id}/store', [UserController::class, 'storepengalaman']);
    Route::get('/admin/user/detail/pengalaman/{pengalaman:id}/edit', [UserController::class, 'editpengalaman']);
    Route::put('/admin/user/detail/pengalaman/{pengalaman:id}', [UserController::class, 'updatepengalaman']);
    Route::delete('/admin/user/detail/pengalaman/{pengalaman:id}', [UserController::class, 'destroypengalaman']);

    //pelatihan
    Route::get('/admin/user/detail/pelatihan/{user:id}/create', [UserController::class, 'createpelatihan']);
    Route::post('/admin/user/detail/pelatihan/{user:id}/store', [UserController::class, 'storepelatihan']);
    Route::get('/admin/user/detail/pelatihan/{pelatihan:id}/edit', [UserController::class, 'editpelatihan']);
    Route::put('/admin/user/detail/pelatihan/{pelatihan:id}', [UserController::class, 'updatepelatihan']);
    Route::delete('/admin/user/detail/pelatihan/{pelatihan:id}', [UserController::class, 'destroypelatihan']);

    //publikasi
    Route::get('/admin/user/detail/publikasi/{user:id}/create', [UserController::class, 'createpublikasi']);
    Route::post('/admin/user/detail/publikasi/{user:id}/store', [UserController::class, 'storepublikasi']);
    Route::get('/admin/user/detail/publikasi/{publikasi:id}/edit', [UserController::class, 'editpublikasi']);
    Route::put('/admin/user/detail/publikasi/{publikasi:id}', [UserController::class, 'updatepublikasi']);
    Route::delete('/admin/user/detail/publikasi/{publikasi:id}', [UserController::class, 'destroypublikasi']);

    //penghargaan
    Route::get('/admin/user/detail/penghargaan/{user:id}/create', [UserController::class, 'createpenghargaan']);
    Route::post('/admin/user/detail/penghargaan/{user:id}/store', [UserController::class, 'storepenghargaan']);
    Route::get('/admin/user/detail/penghargaan/{penghargaan:id}/edit', [UserController::class, 'editpenghargaan']);
    Route::put('/admin/user/detail/penghargaan/{penghargaan:id}', [UserController::class, 'updatepenghargaan']);
    Route::delete('/admin/user/detail/penghargaan/{penghargaan:id}', [UserController::class, 'destroypenghargaan']);

    //persetujuan cuti admin
    Route::get('/admin/persetujuan-cuti', [PersetujuanCutiController::class, 'index']);
    Route::get('/admin/persetujuan-cuti/setujui_cuti/{id}', [PersetujuanCutiController::class, 'setujui_cuti']);
    Route::get('/admin/persetujuan-cuti/tolak_cuti/{id}', [PersetujuanCutiController::class, 'tolak_cuti']);
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
