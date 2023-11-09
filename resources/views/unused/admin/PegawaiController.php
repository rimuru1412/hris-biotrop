<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Identity;
use App\Models\Keluarga;
use App\Models\Pelatihan;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use App\Models\Penghargaan;
use App\Models\Publikasi;
use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('admin.informasi_pegawai.index', [
            'user' => User::withTrashed()->get()
        ]);
    }

    public function show($id)
    {
        $user = User::withTrashed()->find($id);
        $identity = Identity::where('user_id', $id)->get();
        $keluarga = Keluarga::where('user_id', $id)->get();
        $pendidikan = Pendidikan::where('user_id', $id)->get();
        $pengalaman = Pengalaman::where('user_id', $id)->get();
        $pelatihan = Pelatihan::where('user_id', $id)->get();
        $publikasi = Publikasi::where('user_id', $id)->get();
        $penghargaan = Penghargaan::where('user_id', $id)->get();
        $showCreateButton = $identity->isEmpty();

        return view(
            'admin.informasi_pegawai.show',
            compact('user', 'identity', 'keluarga', 'pendidikan', 'pengalaman', 'pelatihan', 'publikasi', 'penghargaan', 'showCreateButton')
        );
    }
}
