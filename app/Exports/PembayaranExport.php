<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Pembayaran;

class PembayaranExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): \Illuminate\Contracts\View\View
    {
        return view('export.table_pembayaran', [
            'pembayarans' => Pembayaran::all(),
            'isExport' => true,
        ]);
    }
}