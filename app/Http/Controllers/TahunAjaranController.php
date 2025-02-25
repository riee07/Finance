<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahun_ajarans = TahunAjaran::all();
        return view('tahun_ajaran.index', compact('tahun_ajarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tahun_ajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required|string',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        TahunAjaran::create([
            'tahun_ajaran' => $request->tahun_ajaran,
            'status' => $request->status,
        ]);

        return redirect()->route('tahun-ajaran.index')->with('success', 'berhasil ditambah');
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
    public function edit(string $id_tahun_ajaran)
    {
        $tahun_ajarans = TahunAjaran::findOrFail($id_tahun_ajaran);
        return view('tahun_ajaran.edit', compact('tahun_ajarans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tahun_ajaran' => 'required|string',
            'status' => 'required|string',
        ]);

        $tahun_ajaran = TahunAjaran::findOrFail($id);

        $tahun_ajaran->update([
            'tahun_ajaran' => $request->tahun_ajaran,
            'status' => $request->status,
        ]);

        return redirect()->route('tahun-ajaran.index')->with('success', 'berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_tahun_ajaran)
    {
        $tahun_ajaran = TahunAjaran::findOrFail($id_tahun_ajaran);

        $tahun_ajaran->siswa()->update(['tahun_ajaran_id' => null]);

        $tahun_ajaran->delete();

        return redirect()->route('tahun-ajaran.index')->with('success', 'berhasil dihapus');
    }
    
}
