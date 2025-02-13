<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sppxii;
use App\Models\Tagihanxii;

class SPPXIIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $SPPXII = Sppxii::all();
        $XII = Tagihanxii::all();
        return view('admin.XII.index', compact('SPPXII', 'XII'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.XII.spp.create');
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

        Sppxii::create([
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
        $sppxii = Sppxii::findOrFail($id);
        return view('admin.XII.index', compact('sppxii'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sppxii = Sppxii::findOrFail($id);
        return view('admin.XII.spp.edit', compact('sppxii'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'bulan_XII' => 'required|string|max:255',
            'harga_XII' => 'required|numeric',
        ]);

        $sppxii = Sppxii::findOrFail($id);
        $sppxii->update([
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
        $sppxii = Sppxii::findOrFail($id);
        $sppxii->delete();
        return redirect()->route('admin.XII.index')->with('success', 'Admin deleted successfully.');
    }
}
