<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\Identity;
use Illuminate\Support\Facades\Auth;

class PersetujuanCuti extends Controller
{
    public function index()
    {


        $kepala = Identity::where('user_id', auth()->user()->id)->get();
        foreach($kepala as $kepala){
            $kepaladepartemen = $kepala->departemen_id;
        }
        // $isicuti = Cuti::where('departemen_id', $kepaladepartemen)->where('status', '=', 'menunggu')->get();
        // $showList = $isicuti->null();

        return view('kepala.persetujuan-cuti.index', [
            'cuti' => Cuti::where('departemen_id', $kepaladepartemen)->where('status', '=', 'menunggu')->get(),
            // 'showlist' => $showList
        ]);
    }

    public function setujui_cuti($id)
    {
        $cuti = Cuti::find($id);

        $cuti->status = 'disetujui';

        $cuti->save();

        return redirect()->back();
    }

    public function tolak_cuti($id)
    {
        $cuti = Cuti::find($id);

        $cuti->status = 'tidak disetujui';

        $cuti->save();

        return redirect()->back();
    }
}
