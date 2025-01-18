<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function kelasXDashboard()
    {
        return view('siswa.X.tes');
    }

    public function kelasXIDashboard()
    {
        return view('kelas_xi.dashboard');
    }

    public function kelasXIIDashboard()
    {
        return view('kelas_xii.dashboard');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function superAdminDashboard()
    {
        return view('superadmin.dashboard');
    }
}
