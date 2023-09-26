<?php

namespace App\Http\Controllers;

use App\Models\Identifier;
use App\Models\JenisPublikasi;
use App\Models\Publikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.daftar-riwayat-hidup.publikasi.index', [
            'publikasi' => Publikasi::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.daftar-riwayat-hidup.publikasi.create', [
            'jenispublikasi' => JenisPublikasi::all(),
            'identifier' => Identifier::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenispublikasi_id' => 'required',
            'judul' => 'required|max:255',
            'kegiatan' => 'required|max:255',
            'tahun' => 'required|max:255',
            'link' => 'required',
            'pdf' => 'mimes:pdf',
            'identifier_id' => 'required'
        ]);

        if ($request->file('pdf')) {
            $file_nama = $request->pdf->getClientOriginalName();
            $validatedData['pdf'] = $request->file('pdf')->storeAs('publikasi-pdf', $file_nama);
        }

        $validatedData['user_id'] = auth()->user()->id;
        Publikasi::create($validatedData);

        return redirect('/user/daftar-riwayat-hidup/publikasi')->with('message', 'Publikasi berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publikasi $publikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publikasi $publikasi)
    {
        return view('user.daftar-riwayat-hidup.publikasi.edit', [
            'publikasi' => $publikasi,
            'jenispublikasi' => JenisPublikasi::all(),
            'identifier' => Identifier::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publikasi $publikasi)
    {
        $rules = [
            'jenispublikasi_id' => 'required',
            'judul' => 'required|max:255',
            'kegiatan' => 'required|max:255',
            'tahun' => 'required|max:255',
            'link' => 'required',
            'pdf' => 'mimes:pdf',
            'identifier_id' => 'required'
        ];

        if ($request->file('pdf')) {
            if ($request->oldpdf) {
                Storage::delete($request->oldpdf);
            }
            $file_nama = $request->pdf->getClientOriginalName();
            $validatedData['pdf'] = $request->file('pdf')->storeAs('publikasi-pdf', $file_nama);
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Publikasi::where('id', $publikasi->id)
            ->update($validatedData);

        return redirect('/user/daftar-riwayat-hidup/publikasi')->with('message', 'Publikasi berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publikasi $publikasi)
    {
        if ($publikasi->pdf) {
            Storage::delete($publikasi->pdf);
        }

        Publikasi::destroy($publikasi->id);

        return redirect('/user/daftar-riwayat-hidup/publikasi')->with('message', 'Publikasi berhasil di hapus');
    }
}
