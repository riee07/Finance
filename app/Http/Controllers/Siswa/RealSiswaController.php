<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Admin\DetailTagihan;
use App\Models\Admin\Tagihan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data siswa dari user yang sedang login
        $siswa = Auth::user()->siswa;

        $tagihans = Tagihan::where('siswa_id', $siswa->id_siswa)->where('tahun_ajaran_id', $siswa->tahun_ajaran_id)->latest()->first();

        // Ambil hanya detail tagihan yang:
        // - Berasal dari tagihan milik siswa ini
        // - Tahun ajaran-nya sama dengan tahun_ajaran_id milik siswa
        $detail_tagihans = DetailTagihan::with([
                'tarifTagihan.jenisTagihan',
                'tarifTagihan.tahunAjaran',
                'tagihan'
            ])
            ->whereHas('tagihan', function ($query) use ($siswa) {
                $query->where('siswa_id', $siswa->id_siswa)
                    ->where('tahun_ajaran_id', $siswa->tahun_ajaran_id);
            })
            ->get();

        return view('siswa.dashboard', compact('siswa', 'detail_tagihans', 'tagihans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function account()
    {
        $user = Auth::user();

        return view('siswa.account', compact('user'));
    }
}
