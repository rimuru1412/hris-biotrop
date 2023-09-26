<?php

namespace App\Http\Controllers;

use App\Models\JenjangPendidikan;
use App\Models\Keluarga;
use App\Models\KeteranganKeluarga;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.daftar-riwayat-hidup.keluarga.index', [
            'keluarga' => Keluarga::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keterangankeluarga = KeteranganKeluarga::all();
        $jenjangpendidikan = JenjangPendidikan::all();
        $enumjeniskelamin = ['L', 'P'];
        return view('user.daftar-riwayat-hidup.keluarga.create', compact('enumjeniskelamin', 'keterangankeluarga', 'jenjangpendidikan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'keterangankeluarga_id' => 'required',
            'nama' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'jenjangpendidikan_id' => 'required',
            'pekerjaan' => 'required|max:255',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Keluarga::create($validatedData);

        return redirect('/user/daftar-riwayat-hidup/keluarga')->with('message', 'Susunan Keluarga berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keluarga $keluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keluarga $keluarga)
    {
        $keterangankeluarga = KeteranganKeluarga::all();
        $jenjangpendidikan = JenjangPendidikan::all();
        $enumjeniskelamin = ['L', 'P'];
        return view('user.daftar-riwayat-hidup.keluarga.edit', [
            'keluarga' => $keluarga,
            'keterangankeluarga' => $keterangankeluarga,
            'enumjeniskelamin' => $enumjeniskelamin,
            'jenjangpendidikan' => $jenjangpendidikan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keluarga $keluarga)
    {
        $rules = [
            'keterangankeluarga_id' => 'required',
            'nama' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'jenjangpendidikan_id' => 'required',
            'pekerjaan' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Keluarga::where('id', $keluarga->id)
            ->update($validatedData);

        return redirect('/user/daftar-riwayat-hidup/keluarga')->with('message', 'Susunan Keluarga berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keluarga $keluarga)
    {
        Keluarga::destroy($keluarga->id);

        return redirect('/user/daftar-riwayat-hidup/keluarga')->with('message', 'Susunan Keluarga berhasil di hapus');
    }
}
