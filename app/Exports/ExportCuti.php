<?php

namespace App\Exports;

use App\Models\Cuti;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportCuti implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $cuti = Cuti::all();
        return view('admin.data-cuti.exportexcel', compact('cuti'));
    }
}
