<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Identity;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;

class IdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $identity = Identity::where('user_id', auth()->user()->id)->get();
        $showCreateButton = $identity->isEmpty();
        return view('user.daftar-riwayat-hidup.identitas.index', compact('identity', 'showCreateButton'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.daftar-riwayat-hidup.identitas.create',[
            'jabatan' => Jabatan::all(),
            'departemen' => Departemen::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'departemen_id' => 'required',
            'jabatan_id' => 'required',
            'nik' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'npwp' => 'required|max:255',
            'rekening' => 'required|max:255',
            'hp' => 'required|max:255',
            'tahun_bekerja' => 'required|max:255',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Identity::create($validatedData);

        return redirect('/user/daftar-riwayat-hidup/identity')->with('message', 'Identitas berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Identity $identity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Identity $identity)
    {
        return view('user.daftar-riwayat-hidup.identitas.edit', [
            'identity' => $identity,
            'jabatan' => Jabatan::all(),
            'departemen' => Departemen::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Identity $identity)
    {
        $rules = [
            'departemen_id' => 'required',
            'jabatan_id' => 'required',
            'nik' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'npwp' => 'required|max:255',
            'rekening' => 'required|max:255',
            'hp' => 'required|max:255',
            'tahun_bekerja' => 'required|max:255',
        ];


        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Identity::where('id', $identity->id)
            ->update($validatedData);

        return redirect('/user/daftar-riwayat-hidup/identity')->with('message', 'Identitas berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Identity $identity)
    {
        //
    }
}
