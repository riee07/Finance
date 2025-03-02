<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Tagihan;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayarans = Pembayaran::all();
        return view('pembayaran.index', compact('pembayarans'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tagihans = Tagihan::all();
        return view('pembayaran.create', compact('tagihans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tagihan_id' => 'required|exists:tagihans,id_tagihan',
            'tanggal_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|numeric',
            'metode_pembayaran' => 'required|in:Transfer,Tunai',
        ]);
        
        Pembayaran::create([
            'tagihan_id' => $request->tagihan_id,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Data Berhasil Ditambah');
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
        $pembayarans = Pembayaran::findOrFail($id);
        $tagihans = Tagihan::all();
        return view('pembayaran.edit', compact('pembayarans', 'tagihans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tagihan_id' => 'required|exists:tagihans,id_tagihan',
            'tanggal_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
        ]);

        $pembayarans = Pembayaran::findOrFail($id);
        
        $pembayarans->update([
            'tagihan_id' => $request->tagihan_id,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pembayarans = Pembayaran::findOrFail($id);
        $pembayarans->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Data Berhail Dihapus');
    }
}
