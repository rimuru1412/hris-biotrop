<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Identity;
use App\Models\Keluarga;
use App\Models\Pelatihan;
use App\Models\Publikasi;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use App\Models\Penghargaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = User::all();
        $user = User::withTrashed()->get();


        return view('admin.user.index', compact('user'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $enumrole = ['hr', 'kepala', 'user'];

        return view('admin.user.edit', [
            'user' => $user,
            'enumrole' => $enumrole
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ];

        $validatedData = $request->validate($rules);

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/admin/user')->with('message', 'User berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        DB::table('identities')->where('user_id', $user->id)->delete();
        DB::table('keluargas')->where('user_id', $user->id)->delete();
        DB::table('pendidikans')->where('user_id', $user->id)->delete();
        DB::table('pengalamen')->where('user_id', $user->id)->delete();
        DB::table('pelatihans')->where('user_id', $user->id)->delete();
        DB::table('publikasis')->where('user_id', $user->id)->delete();
        DB::table('penghargaans')->where('user_id', $user->id)->delete();
        DB::table('cutis')->where('user_id', $user->id)->delete();

        $user->forceDelete();

        return redirect('/admin/user')->with('message', 'User berhasil di hapus');
    }

    public function restore($id)
    {

        $user = User::withTrashed()->find($id);

        if ($user) {
            $user->restore();
            $user->status = 1;
            $user->save();
        }

        return redirect('/admin/user')->with('message', 'User berhasil di aktifkan');
    }

    public function softdelete($id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $user->delete();
            $user->status = 0;
            $user->save();
        }

        return redirect('/admin/user')->with('message', 'User berhasil di non-aktifkan');
    }

    public function showall($id)
    {
        $user = User::withTrashed()->find($id);
        $identity = Identity::where('user_id', $id)->get();
        $keluarga = Keluarga::where('user_id', $id)->get();
        $pendidikan = Pendidikan::where('user_id', $id)->get();
        $pengalaman = Pengalaman::where('user_id', $id)->get();
        $pelatihan = Pelatihan::where('user_id', $id)->get();
        $publikasi = Publikasi::where('user_id', $id)->get();
        $penghargaan = Penghargaan::where('user_id', $id)->get();
        $showCreateButton = $identity->isEmpty();

        return view(
            'admin.user.show',
            compact('user', 'identity', 'keluarga', 'pendidikan', 'pengalaman', 'pelatihan', 'publikasi', 'penghargaan', 'showCreateButton')
        );
    }
}
