<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sppx;

class SPPXController extends Controller
{
    public function index()
    {
        $sppes = Sppx::all();
        return view('admin.x.spp.dashboard', compact('sppes')); 
    }
}
