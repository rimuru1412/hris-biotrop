<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use App\Models\Identity;
use App\Models\JenisCuti;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PersetujuanCutiController extends Controller
{
    public function index()
    {

        return view('admin.persetujuan-cuti.index', [
            'cuti' => Cuti::where('jabatan_id', '=', 1)->get(),
        ]);
    }

    public function show($id)
    {

        return view('admin.persetujuan-cuti.show', [
            'cuti' => Cuti::where('id', $id)->get(),
        ]);
    }

    public function edit(Cuti $cuti)
    {

        $iduser = $cuti->user_id;
        $tanggal = Identity::where('user_id', $iduser)->get();
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


        return view('admin.persetujuan-cuti.edit', [
            'cuti' => $cuti,
            'identity' => Identity::where('user_id', $iduser)->get(),
            'jeniscuti' => JenisCuti::all(),
            'masa_kerja' => $masa_kerja
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
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

        $cuti = Cuti::findOrFail($id);

        $cuti->update([
            'nama' => $request->input('nama'),
            'jabatan_id' => $request->input('jabatan_id'),
            'departemen_id' => $request->input('departemen_id'),
            'nik' => $request->input('nik'),
            'tahun_bekerja' => $request->input('tahun_bekerja'),
            'jeniscuti_id' => $request->input('jeniscuti_id'),
            'alasan' => $request->input('alasan'),
            'tanggal_mulai' => $request->input('tanggal_mulai'),
            'tanggal_selesai' => $request->input('tanggal_selesai'),
            'durasi' => $request->input('durasi'),
            'alamat' => $request->input('alamat'),
            'telepon' => $request->input('telepon'),

        ]);

        return redirect('/admin/persetujuan-cuti')->with('message', 'Cuti berhasil di update');
    }

    public function destroy($id)
    {

        $cuti = Cuti::findOrFail($id);
        $cuti->delete();

        return redirect('/admin/persetujuan-cuti')->with('message', 'Cuti berhasil di hapus');
    }

    public function setujui_cuti($id)
    {
        $cuti = Cuti::find($id);

        $cuti->status = 'disetujui';

        $cuti->save();

        return redirect()->back();
    }

    public function tolak_cuti($id)
    {
        $cuti = Cuti::find($id);

        $cuti->status = 'tidak disetujui';

        $cuti->save();

        return redirect()->back();
    }
}
