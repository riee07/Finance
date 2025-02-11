<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\TagihanXI;
use App\Models\Tagihanxii;
use App\Models\Sppx;
use App\Models\Sppxi;
use App\Models\Sppxii;


class AdminController extends Controller
{
    public function index()
    {   
        $X = Tagihan::all();
        $XI = Tagihanxi::all();
        $XII = Tagihanxii::all();
        $SPPX = Sppx::all();
        $SPPXI = Sppxi::all();
        $SPPXII = Sppxii::all();
        return view('admin.dashboard', compact('X', 'XI', 'XII', 'SPPX', 'SPPXI', 'SPPXII'));
    }
}
