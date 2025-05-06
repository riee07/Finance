<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\TahunAjaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {   
        $tahunAjarans = TahunAjaran::all();
        return view('admin.dashboard', compact('tahunAjarans'));
    }

    public function xIndex()
    {   
        return view('admin.x.dashboard');
    }

    public function xiIndex()
    {   
        return view('admin.xi.dashboard');
    }

    public function xiiIndex()
    {   
        return view('admin.xii.dashboard');
    }

    public function show($id)
    {
        //
    }
}
