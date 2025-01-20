<?php 

namespace App\Http\Controllers;

use App\Models\tes\Tesharga;  // Pastikan namespace model sesuai
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        // Ambil data bulan dan harga
        $items = Tesharga::select('id', 'bulan', 'harga')->get();

        // Kirim data ke view siswa.index
        return view('siswa.X.tes', compact('items'));
    }
}
