<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihanxii;
use App\Models\Sppxii;

class TagihanXIIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $XII = Tagihanxii::all();
        $SPPXII = Sppxii::all();
        return view('admin.XII.index', compact('XII', 'SPPXII'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.XII.tagihan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bulan_XII' => 'required|string|max:255',
            'harga_XII' => 'required|numeric',
        ]);

        Tagihanxii::create([
            'bulan_XII' => $request->bulan_XII,
            'harga_XII' => $request->harga_XII,
        ]);

        return redirect()->route('admin.XII.index')->with('success', 'Admin created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $xii = Tagihanxii::findOrFail($id);
        return view('admin.XII.index', compact('xii'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $xii = Tagihanxii::findOrFail($id);
        return view('admin.XII.tagihan.edit', compact('xii'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'bulan_XII' => 'required',
            'harga_XII' => 'required',
        ]);

        $xii = Tagihanxii::findOrFail($id);
        $xii->update([
            'bulan_XII' => $request->bulan_XII,
            'harga_XII' => $request->harga_XII,
        ]);

        return redirect()->route('admin.XII.index')->with('success', 'Admin updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $xii = Tagihanxii::findOrFail($id);
        $xii->delete();
        return redirect()->route('admin.XII.index')->with('success', 'Admin deleted successfully.');
    }
}