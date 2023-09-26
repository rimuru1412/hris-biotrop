<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;

class ListCutiController extends Controller
{
    public function index()
    {
        return view('user.list-cuti.index', [
            'cuti' => Cuti::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
