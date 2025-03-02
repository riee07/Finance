<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\Siswa;
use App\Models\TahunAjaran;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tagihans = Tagihan::with('siswa', 'tahunAjaran')->get();
        return view('tagihan.index', compact('tagihans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswas = Siswa::all();
        $tahun_ajarans = TahunAjaran::all();
        return view('tagihan.create', compact('siswas', 'tahun_ajarans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id_siswa',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id_tahun_ajaran',
            'total_tagihan' => 'required|numeric',
            'status_pembayaran' => 'required|in:belum_lunas,lunas',
        ]);
    
        Tagihan::create([
            'siswa_id' => $request->siswa_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'total_tagihan' => $request->total_tagihan,
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        return redirect()->route('tagihan.index')->with('success', 'Data Berhasil Ditambah');
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
        $tagihans = Tagihan::findOrFail($id);
        $siswas = Siswa::all();
        $tahun_ajarans = TahunAjaran::all();

        return view('tagihan.edit', compact('tagihans', 'siswas', 'tahun_ajarans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id_siswa',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id_tahun_ajaran',
            'total_tagihan' => 'required|numeric',
            'status_pembayaran' => 'required|in:belum_lunas,lunas',
        ]);
    
        $tagihans = Tagihan::findOrFail($id);
        
        $tagihans->update([
            'siswa_id' => $request->siswa_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'total_tagihan' => $request->total_tagihan,
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        return redirect()->route('tagihan.index')->with('success', 'Data Berhasil Ditambah'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tagihans = Tagihan::findOrFail($id);
        $tagihans->delete();
        return redirect()->route('tagihan.index')->with('success', 'Data Berhasil Dihapus');
    }
}
