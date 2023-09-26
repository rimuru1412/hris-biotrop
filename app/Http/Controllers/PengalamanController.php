<?php

namespace App\Http\Controllers;

use App\Models\Pengalaman;
use Illuminate\Http\Request;

class PengalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.daftar-riwayat-hidup.pengalaman.index', [
            'pengalaman' => Pengalaman::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.daftar-riwayat-hidup.pengalaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jabatan' => 'required|max:255',
            'nama_perusahaan' => 'required|max:255',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date',
            'uraian_pekerjaan' => ''
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Pengalaman::create($validatedData);

        return redirect('/user/daftar-riwayat-hidup/pengalaman')->with('message', 'Pengalaman berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengalaman $pengalaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengalaman $pengalaman)
    {
        return view('user.daftar-riwayat-hidup.pengalaman.edit', [
            'pengalaman' => $pengalaman
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengalaman $pengalaman)
    {
        $rules = [
            'jabatan' => 'required|max:255',
            'nama_perusahaan' => 'required|max:255',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date',
            'uraian_pekerjaan' => ''
        ];

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Pengalaman::where('id', $pengalaman->id)
            ->update($validatedData);

        return redirect('/user/daftar-riwayat-hidup/pengalaman')->with('message', 'Pengalaman berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengalaman $pengalaman)
    {
        Pengalaman::destroy($pengalaman->id);

        return redirect('/user/daftar-riwayat-hidup/pengalaman')->with('message', 'Pengalaman berhasil di hapus');
    }
}
