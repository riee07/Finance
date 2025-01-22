<?php 

namespace App\Http\Controllers;

use App\Models\tes\Tesharga;  // Pastikan namespace model sesuai
use Illuminate\Http\Request;

use App\Models\User;

class SppController extends Controller
{
    public function index()
    {
        // Ambil data bulan dan harga
        $items = Tesharga::select('id', 'bulan', 'harga')->get();

        // users
        $user = auth()->user();

        // Kirim data ke view siswa.index
        return view('siswa.x.tes', compact('items', 'user'));
    }
}
