<?php

namespace App\Http\Controllers;

use App\Models\Penghargaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenghargaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.daftar-riwayat-hidup.penghargaan.index', [
            'penghargaan' => Penghargaan::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.daftar-riwayat-hidup.penghargaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'pemberi' => 'required|max:255',
            'tahun' => 'required|max:255',
            'pdf' => 'mimes:pdf'
        ]);

        if ($request->file('pdf')) {
            $file_nama = $request->pdf->getClientOriginalName();
            $validatedData['pdf'] = $request->file('pdf')->storeAs('penghargaan-pdf', $file_nama);
        }

        $validatedData['user_id'] = auth()->user()->id;
        Penghargaan::create($validatedData);

        return redirect('/user/daftar-riwayat-hidup/penghargaan')->with('message', 'Penghargaan berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penghargaan $penghargaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penghargaan $penghargaan)
    {
        return view('user.daftar-riwayat-hidup.penghargaan.edit', [
            'penghargaan' => $penghargaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penghargaan $penghargaan)
    {
        $rules = [
            'nama' => 'required|max:255',
            'pemberi' => 'required|max:255',
            'tahun' => 'required|max:255',
            'pdf' => 'mimes:pdf'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('pdf')) {
            if ($request->oldpdf) {
                Storage::delete($request->oldpdf);
            }
            $file_nama = $request->pdf->getClientOriginalName();
            $validatedData['pdf'] = $request->file('pdf')->storeAs('penghargaan-pdf', $file_nama);
        }

        $validatedData['user_id'] = auth()->user()->id;

        Penghargaan::where('id', $penghargaan->id)
            ->update($validatedData);

        return redirect('/user/daftar-riwayat-hidup/penghargaan')->with('message', 'Penghargaan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penghargaan $penghargaan)
    {

        if ($penghargaan->pdf) {
            Storage::delete($penghargaan->pdf);
        }

        Penghargaan::destroy($penghargaan->id);

        return redirect('/user/daftar-riwayat-hidup/penghargaan')->with('message', 'Penghargaan berhasil di hapus');
    }
}
