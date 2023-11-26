<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Identity;
use App\Models\Keluarga;
use App\Models\Pelatihan;
use App\Models\Publikasi;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use App\Models\Penghargaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Departemen;
use App\Models\Golongan;
use App\Models\Identifier;
use App\Models\Jabatan;
use App\Models\JenisPelatihan;
use App\Models\JenisPublikasi;
use App\Models\JenjangPendidikan;
use App\Models\KeteranganKeluarga;
use App\Models\PeranPelatihan;
use App\Models\StatusUser;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = User::all();
        $user = User::withTrashed()->get();

        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $enumrole = ['hr', 'kepala', 'user'];

        return view('admin.user.edit', [
            'user' => $user,
            'enumrole' => $enumrole
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ];

        $validatedData = $request->validate($rules);

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/admin/user')->with('message', 'User berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        DB::table('identities')->where('user_id', $user->id)->delete();
        DB::table('keluargas')->where('user_id', $user->id)->delete();
        DB::table('pendidikans')->where('user_id', $user->id)->delete();
        DB::table('pengalamen')->where('user_id', $user->id)->delete();
        DB::table('pelatihans')->where('user_id', $user->id)->delete();
        DB::table('publikasis')->where('user_id', $user->id)->delete();
        DB::table('penghargaans')->where('user_id', $user->id)->delete();
        DB::table('cutis')->where('user_id', $user->id)->delete();

        $user->forceDelete();

        return redirect('/admin/user')->with('message', 'User berhasil di hapus');
    }

    public function restore($id)
    {

        $user = User::withTrashed()->find($id);

        if ($user) {
            $user->restore();
            $user->status = 1;
            $user->save();
        }

        return redirect('/admin/user')->with('message', 'User berhasil di aktifkan');
    }

    public function softdelete($id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $user->delete();
            $user->status = 0;
            $user->save();
        }

        return redirect('/admin/user')->with('message', 'User berhasil di non-aktifkan');
    }

    //bagian show

    public function showall($id)
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
            'admin.user.show',
            compact('user', 'identity', 'keluarga', 'pendidikan', 'pengalaman', 'pelatihan', 'publikasi', 'penghargaan', 'showCreateButton')
        );
    }

    //IDENTITAS

    public function createidentitas($id)
    {
        return view('admin.daftar-riwayat-hidup.identitas.create', [
            'jabatan' => Jabatan::all(),
            'departemen' => Departemen::all(),
            'golongan' => Golongan::all(),
            'statususer' => StatusUser::all(),
            'user' => User::findOrFail($id)
        ]);
    }

    public function storeidentitas(Request $request, $id)
    {
        $request->validate([
            'departemen_id' => 'required',
            'jabatan_id' => 'required',
            'nik' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'alamat' => 'required',
            'statususer_id' => 'required',
            'golongan_id' => 'required',
            'npwp' => 'required|max:255',
            'rekening' => 'required|max:255',
            'hp' => 'required|max:255',
            'email_pribadi' => 'required|email',
            'tahun_bekerja' => 'required|date',
            'image' => 'image|file|max:4096',
        ]);


        $identitas = new Identity([
            'user_id' => $id,
            'departemen_id' => $request->input('departemen_id'),
            'jabatan_id' => $request->input('jabatan_id'),
            'nik' => $request->input('nik'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'alamat' => $request->input('alamat'),
            'statususer_id' => $request->input('statususer_id'),
            'golongan_id' => $request->input('golongan_id'),
            'npwp' => $request->input('npwp'),
            'rekening' => $request->input('rekening'),
            'hp' => $request->input('hp'),
            'email_pribadi' => $request->input('email_pribadi'),
            'tahun_bekerja' => $request->input('tahun_bekerja'),
        ]);

        if ($request->file('image')) {
            $file_nama = $request->image->getClientOriginalName();
            $request->file('image')->storeAs('identitas-image', $file_nama);
            $identitas->image = 'identitas-image/' . $file_nama;
        }

        $identitas->save();

        return redirect('/admin/user')->with('message', 'Identitas berhasil di tambahkan');
    }

    public function editidentitas(Identity $identity)
    {
        return view('admin.daftar-riwayat-hidup.identitas.edit', [
            'identity' => $identity,
            'jabatan' => Jabatan::all(),
            'departemen' => Departemen::all(),
            'golongan' => Golongan::all(),
            'statususer' => StatusUser::all()
        ]);
    }

    public function updateidentitas(Request $request, $id)
    {
        $request->validate([
            'departemen_id' => 'required',
            'jabatan_id' => 'required',
            'nik' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'alamat' => 'required',
            'statususer_id' => 'required',
            'golongan_id' => 'required',
            'npwp' => 'required|max:255',
            'rekening' => 'required|max:255',
            'hp' => 'required|max:255',
            'email_pribadi' => 'required|email',
            'tahun_bekerja' => 'required|date',
            'image' => 'image|file|max:4096',
        ]);

        $identitas = Identity::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($identitas->image) {
                Storage::delete($identitas->image);
            }

            $file_nama = $request->image->getClientOriginalName();
            $request->file('image')->storeAs('identitas-image', $file_nama);
            $identitas->image = 'identitas-image/' . $file_nama;
        }

        $identitas->update([
            'departemen_id' => $request->input('departemen_id'),
            'jabatan_id' => $request->input('jabatan_id'),
            'nik' => $request->input('nik'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'alamat' => $request->input('alamat'),
            'statususer_id' => $request->input('statususer_id'),
            'golongan_id' => $request->input('golongan_id'),
            'npwp' => $request->input('npwp'),
            'rekening' => $request->input('rekening'),
            'hp' => $request->input('hp'),
            'email_pribadi' => $request->input('email_pribadi'),
            'tahun_bekerja' => $request->input('tahun_bekerja'),

        ]);

        return redirect('/admin/user')->with('message', 'Identitas berhasil di update');
    }

    //KELUARGA

    public function createkeluarga($id)
    {
        $keterangankeluarga = KeteranganKeluarga::all();
        $jenjangpendidikan = JenjangPendidikan::all();
        $enumjeniskelamin = ['L', 'P'];
        $user = User::findOrFail($id);
        return view('admin.daftar-riwayat-hidup.keluarga.create', compact('enumjeniskelamin', 'keterangankeluarga', 'jenjangpendidikan', 'user'));
    }

    public function storekeluarga(Request $request, $id)
    {
        $request->validate([
            'keterangankeluarga_id' => 'required',
            'nama' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'jenjangpendidikan_id' => 'required',
            'pekerjaan' => 'required|max:255',
        ]);

        $keluarga = new Keluarga([
            'user_id' => $id,
            'keterangankeluarga_id' => $request->input('keterangankeluarga_id'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'jenjangpendidikan_id' => $request->input('jenjangpendidikan_id'),
            'pekerjaan' => $request->input('pekerjaan'),
        ]);

        $keluarga->save();

        return redirect('/admin/user')->with('message', 'Susunan Keluarga berhasil di tambahkan');
    }

    public function editkeluarga(Keluarga $keluarga)
    {
        $keterangankeluarga = KeteranganKeluarga::all();
        $jenjangpendidikan = JenjangPendidikan::all();
        $enumjeniskelamin = ['L', 'P'];
        return view('admin.daftar-riwayat-hidup.keluarga.edit', [
            'keluarga' => $keluarga,
            'keterangankeluarga' => $keterangankeluarga,
            'enumjeniskelamin' => $enumjeniskelamin,
            'jenjangpendidikan' => $jenjangpendidikan,
        ]);
    }

    public function updatekeluarga(Request $request, $id)
    {
        $request->validate([
            'keterangankeluarga_id' => 'required',
            'nama' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'jenjangpendidikan_id' => 'required',
            'pekerjaan' => 'required|max:255',
        ]);

        $keluarga = Keluarga::findOrFail($id);

        $keluarga->update([
            'keterangankeluarga_id' => $request->input('keterangankeluarga_id'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'jenjangpendidikan_id' => $request->input('jenjangpendidikan_id'),
            'pekerjaan' => $request->input('pekerjaan'),

        ]);

        return redirect('/admin/user')->with('message', 'Susunan Keluarga berhasil di update');
    }

    public function destroykeluarga(Keluarga $keluarga)
    {
        Keluarga::destroy($keluarga->id);

        return back()->with('message', 'Susunan Keluarga berhasil di hapus');
    }

    //PENDIDIKAN

    public function creatependidikan($id)
    {
        $jenjangpendidikan = JenjangPendidikan::all();
        $user = User::findOrFail($id);

        return view('admin.daftar-riwayat-hidup.pendidikan.create', compact('jenjangpendidikan', 'user'));
    }

    public function storependidikan(Request $request, $id)
    {
        $request->validate([
            'nama_instansi' => 'required|max:255',
            'jurusan' => 'max:255',
            'tahun_lulus' => 'required|max:255',
            'jenjangpendidikan_id' => 'required',
        ]);

        $pendidikan = new Pendidikan([
            'user_id' => $id,
            'nama_instansi' => $request->input('nama_instansi'),
            'jurusan' => $request->input('jurusan'),
            'tahun_lulus' => $request->input('tahun_lulus'),
            'jenjangpendidikan_id' => $request->input('jenjangpendidikan_id'),
        ]);

        $pendidikan->save();

        return redirect('/admin/user')->with('message', 'Keluarga berhasil di tambahkan');
    }


    public function editpendidikan(Pendidikan $pendidikan)
    {
        $jenjangpendidikan = JenjangPendidikan::all();

        return view('admin.daftar-riwayat-hidup.pendidikan.edit', [
            'pendidikan' => $pendidikan,
            'jenjangpendidikan' => $jenjangpendidikan
        ]);
    }

    public function updatependidikan(Request $request, $id)
    {
        $request->validate([
            'nama_instansi' => 'required|max:255',
            'jurusan' => 'max:255',
            'tahun_lulus' => 'required|max:255',
            'jenjangpendidikan_id' => 'required',
        ]);

        $pendidikan = Pendidikan::findOrFail($id);

        $pendidikan->update([
            'nama_instansi' => $request->input('nama_instansi'),
            'jurusan' => $request->input('jurusan'),
            'tahun_lulus' => $request->input('tahun_lulus'),
            'jenjangpendidikan_id' => $request->input('jenjangpendidikan_id'),

        ]);

        return redirect('/admin/user')->with('message', 'Pendidikan berhasil di update');
    }

    public function destroypendidikan(Pendidikan $pendidikan)
    {
        Pendidikan::destroy($pendidikan->id);

        return back()->with('message', 'Pendidikan berhasil di hapus');
    }

    //PENGALAMAN

    public function createpengalaman($id)
    {

        $user =  User::findOrFail($id);

        return view('admin.daftar-riwayat-hidup.pengalaman.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storepengalaman(Request $request, $id)
    {
        $request->validate([
            'jabatan' => 'required|max:255',
            'nama_perusahaan' => 'required|max:255',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date',
            'uraian_pekerjaan' => ''
        ]);

        $pengalaman = new Pengalaman([
            'user_id' => $id,
            'jabatan' => $request->input('jabatan'),
            'nama_perusahaan' => $request->input('nama_perusahaan'),
            'tanggal_masuk' => $request->input('tanggal_masuk'),
            'tanggal_keluar' => $request->input('tanggal_keluar'),
            'uraian_pekerjaan' => $request->input('uraian_pekerjaan'),
        ]);

        $pengalaman->save();


        return redirect('/admin/user')->with('message', 'Pengalaman berhasil di tambahkan');
    }

    public function editpengalaman(Pengalaman $pengalaman)
    {
        return view('admin.daftar-riwayat-hidup.pengalaman.edit', [
            'pengalaman' => $pengalaman
        ]);
    }

    public function updatepengalaman(Request $request, $id)
    {
        $request->validate([
            'jabatan' => 'required|max:255',
            'nama_perusahaan' => 'required|max:255',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date',
            'uraian_pekerjaan' => ''
        ]);

        $pengalaman = Pengalaman::findOrFail($id);

        $pengalaman->update([
            'jabatan' => $request->input('jabatan'),
            'nama_perusahaan' => $request->input('nama_perusahaan'),
            'tanggal_masuk' => $request->input('tanggal_masuk'),
            'tanggal_keluar' => $request->input('tanggal_keluar'),
            'uraian_pekerjaan' => $request->input('uraian_pekerjaan'),

        ]);

        return redirect('/admin/user')->with('message', 'Pengalaman berhasil di update');
    }

    public function destroypengalaman(Pengalaman $pengalaman)
    {
        Pengalaman::destroy($pengalaman->id);

        return back()->with('message', 'Pengalaman berhasil di hapus');
    }

    //PELATIHAN

    public function createpelatihan($id)
    {
        return view('admin.daftar-riwayat-hidup.pelatihan.create', [
            'jenispelatihan' => JenisPelatihan::all(),
            'peranpelatihan' => PeranPelatihan::all(),
            'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storepelatihan(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'penyelenggara' => 'required|max:255',
            'jenispelatihan_id' => 'required',
            'peranpelatihan_id' => 'required',
            'pdf' => 'mimes:pdf'
        ]);

        $pelatihan = new Pelatihan([
            'user_id' => $id,
            'nama_kegiatan' => $request->input('nama_kegiatan'),
            'tanggal_mulai' => $request->input('tanggal_mulai'),
            'tanggal_selesai' => $request->input('tanggal_selesai'),
            'penyelenggara' => $request->input('penyelenggara'),
            'jenispelatihan_id' => $request->input('jenispelatihan_id'),
            'peranpelatihan_id' => $request->input('peranpelatihan_id'),
        ]);

        if ($request->file('pdf')) {
            $file_nama = $request->pdf->getClientOriginalName();
            $request->file('pdf')->storeAs('pelatihan-pdf', $file_nama);
            $pelatihan->pdf = 'pelatihan-pdf/' . $file_nama;
        }

        $pelatihan->save();

        return redirect('/admin/user')->with('message', 'Pelatihan/Seminar berhasil di tambahkan');
    }

    public function editpelatihan(Pelatihan $pelatihan)
    {
        return view('admin.daftar-riwayat-hidup.pelatihan.edit', [
            'pelatihan' => $pelatihan,
            'jenispelatihan' => JenisPelatihan::all(),
            'peranpelatihan' => PeranPelatihan::all()
        ]);
    }

    public function updatepelatihan(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'penyelenggara' => 'required|max:255',
            'jenispelatihan_id' => 'required',
            'peranpelatihan_id' => 'required',
            'pdf' => 'mimes:pdf'
        ]);

        $pelatihan = Pelatihan::findOrFail($id);

        if ($request->hasFile('pdf')) {
            if ($pelatihan->pdf) {
                Storage::delete($pelatihan->pdf);
            }

            $file_nama = $request->pdf->getClientOriginalName();
            $request->file('pdf')->storeAs('pelatihan-pdf', $file_nama);
            $pelatihan->pdf = 'pelatihan-pdf/' . $file_nama;
        }

        $pelatihan->update([
            'nama_kegiatan' => $request->input('nama_kegiatan'),
            'tanggal_mulai' => $request->input('tanggal_mulai'),
            'tanggal_selesai' => $request->input('tanggal_selesai'),
            'penyelenggara' => $request->input('penyelenggara'),
            'jenispelatihan_id' => $request->input('jenispelatihan_id'),
            'peranpelatihan_id' => $request->input('peranpelatihan_id'),
        ]);

        return redirect('/admin/user')->with('message', 'Pelatihan/Seminar berhasil di update');
    }

    public function destroypelatihan(Pelatihan $pelatihan)
    {
        if ($pelatihan->pdf) {
            Storage::delete($pelatihan->pdf);
        }

        Pelatihan::destroy($pelatihan->id);

        return back()->with('message', 'Pelatihan/Seminar berhasil di hapus');
    }

    //PUBLIKASI

    public function createpublikasi($id)
    {
        return view('admin.daftar-riwayat-hidup.publikasi.create', [
            'jenispublikasi' => JenisPublikasi::all(),
            'identifier' => Identifier::all(),
            'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storepublikasi(Request $request, $id)
    {
        $request->validate([
            'jenispublikasi_id' => 'required',
            'judul' => 'required|max:255',
            'kegiatan' => 'required|max:255',
            'tahun' => 'required|max:255',
            'link' => '',
            'pdf' => 'mimes:pdf',
            'identifier_id' => 'required'
        ]);

        $publikasi = new Publikasi([
            'user_id' => $id,
            'jenispublikasi_id' => $request->input('jenispublikasi_id'),
            'judul' => $request->input('judul'),
            'kegiatan' => $request->input('kegiatan'),
            'tahun' => $request->input('tahun'),
            'link' => $request->input('link'),
            'identifier_id' => $request->input('identifier_id'),
        ]);

        if ($request->file('pdf')) {
            $file_nama = $request->pdf->getClientOriginalName();
            $request->file('pdf')->storeAs('publikasi-pdf', $file_nama);
            $publikasi->pdf = 'publikasi-pdf/' . $file_nama;
        }

        $publikasi->save();

        return redirect('/admin/user')->with('message', 'Publikasi berhasil di tambahkan');
    }

    public function editpublikasi(Publikasi $publikasi)
    {
        return view('admin.daftar-riwayat-hidup.publikasi.edit', [
            'publikasi' => $publikasi,
            'jenispublikasi' => JenisPublikasi::all(),
            'identifier' => Identifier::all()

        ]);
    }

    public function updatepublikasi(Request $request, $id)
    {
        $request->validate([
            'jenispublikasi_id' => 'required',
            'judul' => 'required|max:255',
            'kegiatan' => 'required|max:255',
            'tahun' => 'required|max:255',
            'link' => '',
            'pdf' => 'mimes:pdf',
            'identifier_id' => 'required'
        ]);

        $publikasi = Publikasi::findOrFail($id);

        if ($request->hasFile('pdf')) {
            if ($publikasi->pdf) {
                Storage::delete($publikasi->pdf);
            }

            $file_nama = $request->pdf->getClientOriginalName();
            $request->file('pdf')->storeAs('publikasi-pdf', $file_nama);
            $publikasi->pdf = 'publikasi-pdf/' . $file_nama;
        }

        $publikasi->update([
            'jenispublikasi_id' => $request->input('jenispublikasi_id'),
            'judul' => $request->input('judul'),
            'kegiatan' => $request->input('kegiatan'),
            'tahun' => $request->input('tahun'),
            'link' => $request->input('link'),
            'identifier_id' => $request->input('identifier_id'),

        ]);

        return redirect('/admin/user')->with('message', 'Publikasi berhasil di update');
    }

    public function destroypublikasi(Publikasi $publikasi)
    {
        if ($publikasi->pdf) {
            Storage::delete($publikasi->pdf);
        }

        Publikasi::destroy($publikasi->id);

        return back()->with('message', 'Publikasi berhasil di hapus');
    }

    //PENGHARGAAN

    public function createpenghargaan($id)
    {

        $user = User::findOrFail($id);

        return view('admin.daftar-riwayat-hidup.penghargaan.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storepenghargaan(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'pemberi' => 'required|max:255',
            'tahun' => 'required|max:255',
            'pdf' => 'mimes:pdf'
        ]);

        $penghargaan = new Penghargaan([
            'user_id' => $id,
            'nama' => $request->input('nama'),
            'pemberi' => $request->input('pemberi'),
            'tahun' => $request->input('tahun'),
        ]);

        if ($request->file('pdf')) {
            $file_nama = $request->pdf->getClientOriginalName();
            $request->file('pdf')->storeAs('penghargaan-pdf', $file_nama);
            $penghargaan->pdf = 'penghargaan-pdf/' . $file_nama;
        }

        $penghargaan->save();

        return redirect('/admin/user')->with('message', 'Penghargaan berhasil di tambahkan');
    }

    public function editpenghargaan(Penghargaan $penghargaan)
    {
        return view('admin.daftar-riwayat-hidup.penghargaan.edit', [
            'penghargaan' => $penghargaan
        ]);
    }

    public function updatepenghargaan(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'pemberi' => 'required|max:255',
            'tahun' => 'required|max:255',
            'pdf' => 'mimes:pdf'
        ]);

        $penghargaan = Penghargaan::findOrFail($id);

        if ($request->hasFile('pdf')) {
            if ($penghargaan->pdf) {
                Storage::delete($penghargaan->pdf);
            }

            $file_nama = $request->pdf->getClientOriginalName();
            $request->file('pdf')->storeAs('penghargaan-pdf', $file_nama);
            $penghargaan->pdf = 'penghargaan-pdf/' . $file_nama;
        }

        $penghargaan->update([
            'nama' => $request->input('nama'),
            'pemberi' => $request->input('pemberi'),
            'tahun' => $request->input('tahun'),
        ]);

        return redirect('/admin/user')->with('message', 'Penghargaan berhasil di update');
    }

    public function destroypenghargaan(Penghargaan $penghargaan)
    {

        if ($penghargaan->pdf) {
            Storage::delete($penghargaan->pdf);
        }

        Penghargaan::destroy($penghargaan->id);

        return back()->with('message', 'Penghargaan berhasil di hapus');
    }
}
