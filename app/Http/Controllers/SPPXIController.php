<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sppxi;

class SPPXIController extends Controller
{
    public function index()
    {
        $sppes = Sppxi::all();
        return view('admin.xi.spp.dashboard', compact('sppes'));
    }
}
