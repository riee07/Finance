<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihanx;

class TagihanXController extends Controller
{
    public function index()
    {
        $tagihans = Tagihanx::all();
        return view('admin.x.tagihan.dashboard', compact('tagihans'));
    }
}
