<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Identity;
use App\Models\JenisCuti;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //untuk membuat selisih antara tahun bekerja dengan tanggal hari terbaru
        $tanggal = Identity::where('user_id', auth()->user()->id)->get();
        foreach ($tanggal as $tanggal)
            $tanggalSebelumnya = Carbon::parse($tanggal->tahun_bekerja);
        $tanggalHariIni = Carbon::now();
        $perbedaanTanggal = $tanggalHariIni->diffInDays($tanggalSebelumnya);
        $tanggalAkhir = $tanggalHariIni->copy()->addDays($perbedaanTanggal);

        // Menghitung perbedaan tahun, bulan, dan hari
        $perbedaanTahun = $tanggalAkhir->diffInYears($tanggalHariIni);
        $perbedaanBulan = $tanggalAkhir->diffInMonths($tanggalHariIni) % 12;
        $perbedaanHari = $tanggalAkhir->diffInDays($tanggalHariIni) % 30; // Menggunakan modulo 30 untuk menghindari perbedaan bulan lebih dari 30 hari

        // Format tanggal sebagai tahun-bulan-hari
        $masa_kerja = sprintf('%d tahun %d bulan %d hari', $perbedaanTahun, $perbedaanBulan, $perbedaanHari);

        $cutinya = Cuti::where('user_id', auth()->user()->id)->where('status', 'disetujui')->where('jeniscuti_id', 1)->get();

        return view('user.cuti.index', [
            'jeniscuti' => JenisCuti::all(),
            'identity' => Identity::where('user_id', auth()->user()->id)->get(),
            'masa_kerja' => $masa_kerja,
            'cutinya' => $cutinya
        ]);
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
    public function store(Request $request, Cuti $cuti)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'jabatan_id' => 'required',
            'departemen_id' => 'required',
            'nik' => 'required',
            'tahun_bekerja' => 'required',
            'jeniscuti_id' => 'required',
            'alasan' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'durasi' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Cuti::create($validatedData);



        // buat nambahin selisih, lalu dimasukan ke kolom selisih

        // $cuti = Cuti::create($validatedData);
        // //untuk membuat selisih antar tanggal
        // $tanggalMulai = Carbon::parse($cuti->tanggal_mulai);
        // $tanggalSelesai = Carbon::parse($cuti->tanggal_selesai);
        // $selisih = $tanggalSelesai->diffInDays($tanggalMulai);
        // $cuti->update(['selisih' => $selisih]);

        return redirect('/user/daftar-riwayat-hidup/identity')->with('message', 'Cuti berhasil diajukan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuti $cuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuti $cuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuti $cuti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuti $cuti)
    {
        //
    }
}
