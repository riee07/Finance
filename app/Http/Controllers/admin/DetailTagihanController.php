<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\DetailTagihan;
use Illuminate\Http\Request;
use App\Models\Admin\Tagihan;
use App\Models\Admin\TarifTagihan;

class DetailTagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail_tagihans = DetailTagihan::all();

        return view('admin.detail_tagihan.index', compact('detail_tagihans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tagihans = Tagihan::all();
        $tarif_tagihans = TarifTagihan::all();

        return view('admin.detail_tagihan.create', compact('tagihans', 'tarif_tagihans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tagihan_id' => 'required|exists:tagihans,id_tagihan',
            'tarif_tagihan_id' => 'required|exists:tarif_tagihans,id_tarif_tagihan',
            'jumlah_tagihan' => 'required|numeric',
        ]);

        DetailTagihan::create([
            'tagihan_id' => $request->tagihan_id,
            'tarif_tagihan_id' => $request->tarif_tagihan_id,
            'jumlah_tagihan' => $request->jumlah_tagihan,
        ]);

        return redirect()->route('admin.detail-tagihan.index')->with('success', 'Data Berhasil Ditambah');
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
        $detail_tagihans = DetailTagihan::findOrFail($id);
        $tagihans = Tagihan::all();
        $tarif_tagihans = TarifTagihan::all();
        return view('admin.detail_tagihan.edit', compact('detail_tagihans', 'tagihans', 'tarif_tagihans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tagihan_id' => 'required|exists:tagihans,id_tagihan',
            'tarif_tagihan_id' => 'required|exists:tarif_tagihans,id_tarif_tagihan',
            'jumlah_tagihan' => 'required|numeric',
        ]);

        $detail_tagihans = DetailTagihan::findOrFail($id);

        $detail_tagihans->update([
            'tagihan_id' => $request->tagihan_id,
            'tarif_tagihan_id' => $request->tarif_tagihan_id,
            'jumlah_tagihan' => $request->jumlah_tagihan,
        ]);

        return redirect()->route('admin.detail-tagihan.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail_tagihans = DetailTagihan::findOrFail($id);
        $detail_tagihans->delete();
        return redirect()->route('admin.detail-tagihan.index')->with('success', 'Data Berhasil Dihapus');
    }
}
