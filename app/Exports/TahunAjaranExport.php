<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use App\Models\TahunAjaran;

class TahunAjaranExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): \Illuminate\Contracts\View\View
    {
        return view('export.table_tahun_ajaran', [
            'tahun_ajarans' => TahunAjaran::all(),
            'isExport' => true,
        ]);
    }
}
