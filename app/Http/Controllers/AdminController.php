<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\TagihanXI;
use App\Models\Tagihanxii;

class AdminController extends Controller
{
    public function index()
    {   
        $X = Tagihan::all();
        $XI = Tagihanxi::all();
        $XII = Tagihanxii::all();
        return view('admin.dashboard', compact('X', 'XI', 'XII'));
    }
}
