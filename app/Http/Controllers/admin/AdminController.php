<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {   
        return view('admin.dashboard');
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
}
