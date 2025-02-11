<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sppxi;

class SPPXIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $SPPXI = Sppxi::all();
        return view('admin.XI.index', compact('SPPXI'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.XI.spp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bulan_XI' => 'required|string|max:255',
            'harga_XI' => 'required|numeric',
        ]);

        Sppxi::create([
            'bulan_XI' => $request->bulan,
            'harga_XI' => $request->harga,
        ]);

        return redirect()->route('admin.XI.index')->with('success', 'Admin created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sppxi = Sppxi::findOrFail($id);
        return view('admin.XI.index', compact('sppxi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sppxi = Sppxi::findOrFail($id);
        return view('admin.XI.spp.edit', compact('sppxi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'bulan_XI' => 'required|string|max:255',
            'harga_XI' => 'required|numeric',
        ]);

        $sppxi = Sppxi::findOrFail($id);
        $sppxi->update([
            'bulan_XI' => $request->bulan,
            'harga_XI' => $request->harga,
        ]);

        return redirect()->route('admin.XI.index')->with('success', 'Admin updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sppxi = Sppxi::findOrFail($id);
        $sppxi->delete();
        return redirect()->route('admin.XI.index')->with('success', 'Admin deleted successfully.');
    }
}
