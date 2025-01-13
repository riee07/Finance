<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function kelasXDashboard()
    {
        return view('kelas_x.dashboard');
    }

    public function kelasXIDashboard()
    {
        return view('kelas_xi.dashboard');
    }

    public function kelasXIIDashboard()
    {
        return view('kelas_xii.dashboard');
    }
}
