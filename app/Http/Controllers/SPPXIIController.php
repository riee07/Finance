<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sppxii;

class SPPXIIController extends Controller
{
    public function index()
    {
        $sppes = Sppxii::all();
        return view('admin.xii.spp.dashboard', compact('sppes'));
    }
}
