<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\Pembayaran;

class PembayaranExport implements FromView, WithHeadings, WithTitle
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

    // public function headings(): array
    // {
    //     return ['ID Pembayaran', 'Tagihan ID', 'Tanggal Pembayaran', 'Jumlah Pembayaran', 'Keterangan'];
    // }
}