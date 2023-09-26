<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::whereNotIn('role', ['admin'])->get();
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

        $user->delete();

        return redirect('/admin/user')->with('message', 'User berhasil di hapus');
    }
}
