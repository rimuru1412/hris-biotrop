<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Departemen;
use App\Models\Golongan;
use App\Models\Identity;
use App\Models\Jabatan;
use App\Models\StatusUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $identity = Identity::where('user_id', auth()->user()->id)->get();
        $showCreateButton = $identity->isEmpty();
        $cutinya = Cuti::where('user_id', auth()->user()->id)->where('status', 'disetujui')->where('jeniscuti_id', 1)->get();

        return view('user.daftar-riwayat-hidup.identitas.index', compact('identity', 'showCreateButton', 'cutinya'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.daftar-riwayat-hidup.identitas.create', [
            'jabatan' => Jabatan::all(),
            'departemen' => Departemen::all(),
            'golongan' => Golongan::all(),
            'statususer' => StatusUser::all()
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

        if ($request->file('image')) {
            $file_nama = $request->image->getClientOriginalName();
            $validatedData['image'] = $request->file('image')->storeAs('identitas-image', $file_nama);
        }

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
            'golongan' => Golongan::all(),
            'statususer' => StatusUser::all()
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
            'alamat' => 'required',
            'statususer_id' => 'required',
            'golongan_id' => 'required',
            'npwp' => 'required|max:255',
            'rekening' => 'required|max:255',
            'hp' => 'required|max:255',
            'email_pribadi' => 'required|email',
            'tahun_bekerja' => 'required|date',
            'image' => 'image|file|max:4096',
        ];


        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldimage) {
                Storage::delete($request->oldimage);
            }
            $file_nama = $request->image->getClientOriginalName();
            $validatedData['image'] = $request->file('image')->storeAs('identitas-image', $file_nama);
        }

        $validatedData['user_id'] = auth()->user()->id;

        Identity::where('id', $identity->id)
            ->update($validatedData);

        return redirect('/user/daftar-riwayat-hidup/identity')->with('message', 'Identitas berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Request $request)
    {
    }

    public function softdelete($id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $user->delete();
            $user->status = 0;
            $user->save();
        }

        return redirect('/user/daftar-riwayat-hidup/identity')->with('message', 'User berhasil di hapus');
    }
}
