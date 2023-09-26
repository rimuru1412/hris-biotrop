<?php

namespace App\Http\Controllers;

use App\Models\JenjangPendidikan;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.daftar-riwayat-hidup.pendidikan.index', [
            'pendidikan' => Pendidikan::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenjangpendidikan = JenjangPendidikan::all();

        return view('user.daftar-riwayat-hidup.pendidikan.create', compact('jenjangpendidikan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_instansi' => 'required|max:255',
            'jurusan' => 'max:255',
            'tahun_lulus' => 'required|max:255',
            'jenjangpendidikan_id' => 'required',

        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Pendidikan::create($validatedData);

        return redirect('/user/daftar-riwayat-hidup/pendidikan')->with('message', 'Pendidikan berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendidikan $pendidikan)
    {
        $jenjangpendidikan = JenjangPendidikan::all();

        return view('user.daftar-riwayat-hidup.pendidikan.edit', [
            'pendidikan' => $pendidikan,
            'jenjangpendidikan' => $jenjangpendidikan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendidikan $pendidikan)
    {
        $rules = [
            'nama_instansi' => 'required|max:255',
            'jurusan' => 'max:255',
            'tahun_lulus' => 'required|max:255',
            'jenjangpendidikan_id' => 'required',

        ];

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Pendidikan::where('id', $pendidikan->id)
            ->update($validatedData);

        return redirect('/user/daftar-riwayat-hidup/pendidikan')->with('message', 'Pendidikan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendidikan $pendidikan)
    {
        Pendidikan::destroy($pendidikan->id);

        return redirect('/user/daftar-riwayat-hidup/pendidikan')->with('message', 'Pendidikan berhasil di hapus');
    }
}
