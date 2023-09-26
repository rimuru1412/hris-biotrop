<?php

namespace App\Http\Controllers;

use App\Models\JenisPelatihan;
use App\Models\Pelatihan;
use App\Models\PeranPelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.daftar-riwayat-hidup.pelatihan.index', [
            'pelatihan' => Pelatihan::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.daftar-riwayat-hidup.pelatihan.create', [
            'jenispelatihan' => JenisPelatihan::all(),
            'peranpelatihan' => PeranPelatihan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kegiatan' => 'required|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'penyelenggara' => 'required|max:255',
            'jenispelatihan_id' => 'required',
            'peranpelatihan_id' => 'required',
            'pdf' => 'mimes:pdf'
        ]);

        if ($request->file('pdf')) {
            $file_nama = $request->pdf->getClientOriginalName();
            $validatedData['pdf'] = $request->file('pdf')->storeAs('pelatihan-pdf', $file_nama);
        }

        $validatedData['user_id'] = auth()->user()->id;
        Pelatihan::create($validatedData);

        return redirect('/user/daftar-riwayat-hidup/pelatihan')->with('message', 'Pelatihan/Seminar berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelatihan $pelatihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelatihan $pelatihan)
    {
        return view('user.daftar-riwayat-hidup.pelatihan.edit', [
            'pelatihan' => $pelatihan,
            'jenispelatihan' => JenisPelatihan::all(),
            'peranpelatihan' => PeranPelatihan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelatihan $pelatihan)
    {
        $rules = [
            'nama_kegiatan' => 'required|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'penyelenggara' => 'required|max:255',
            'jenispelatihan_id' => 'required',
            'peranpelatihan_id' => 'required',
            'pdf' => 'mimes:pdf'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('pdf')) {
            if ($request->oldpdf) {
                Storage::delete($request->oldpdf);
            }
            $file_nama = $request->pdf->getClientOriginalName();
            $validatedData['pdf'] = $request->file('pdf')->storeAs('pelatihan-pdf', $file_nama);
        }

        $validatedData['user_id'] = auth()->user()->id;

        Pelatihan::where('id', $pelatihan->id)
            ->update($validatedData);

        return redirect('/user/daftar-riwayat-hidup/pelatihan')->with('message', 'Pelatihan/Seminar berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelatihan $pelatihan)
    {
        if ($pelatihan->pdf) {
            Storage::delete($pelatihan->pdf);
        }

        Pelatihan::destroy($pelatihan->id);

        return redirect('/user/daftar-riwayat-hidup/pelatihan')->with('message', 'Pelatihan/Seminar berhasil di hapus');
    }
}
