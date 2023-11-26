<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use App\Models\Identity;
use Illuminate\Http\Request;

class PersetujuanCutiController extends Controller
{
    public function index()
    {


        $kepala = Identity::where('user_id', auth()->user()->id)->get();
        foreach ($kepala as $kepala) {
            $kepalajabatan = $kepala->jabatan_id;
        }

        return view('admin.persetujuan-cuti.index', [
            'cuti' => Cuti::where('jabatan_id', '=', 1)->where('status', '=', 'menunggu')->get(),
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
