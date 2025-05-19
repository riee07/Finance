<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Admin\Siswa;
use App\Models\User;

class SiswaImportController extends Controller
{
    public function form()
    {
        return view('import-siswa');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new SiswaImport, $request->file('file'));

        return back()->with('success', 'Data siswa berhasil diimpor!');
    }
}

