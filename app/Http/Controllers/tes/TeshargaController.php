<?php

namespace App\Http\Controllers\tes;
namespace app\Models\tes\Tesharga;

use App\Http\Controllers\Controller;
use App\Models\tes\Tesharga;
use Illuminate\Http\Request;


class TeshargaaController extends Controller
{
    public function index(){
    // Ambil data dari model Tesharga
        $items = Tesharga::select('id', 'bulan', 'harga')->get();
        
        // Kirim data ke view
        return view('siswa.index', compact('items'));
    }
}
