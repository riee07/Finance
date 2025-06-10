<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LengkapiProfilController extends Controller
{
    public function form()
    {
        return view('siswa.lengkapi-nohp');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'no_hp' => 'required|string|min:10',
        ]);

        $user = Auth::user();

        $user->siswa->update([
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('siswa.dashboard')->with('success', 'Nomor HP berhasil disimpan!');
    }
}
