<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sppx;

class SPPXController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $SPPX = Sppx::all();
        return view('admin.X.index', compact('SPPX'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.X.spp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        Sppx::create([
            'bulan' => $request->bulan,
            'harga' => $request->harga,
        ]);

        return redirect()->route('admin.X.index')->with('success', 'Admin created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sppx = Sppx::findOrFail($id);
        return view('admin.X.index', compact('sppx'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sppx = Sppx::findOrFail($id);
        return view('admin.X.spp.edit', compact('sppx'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'bulan' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        $sppx = Sppx::findOrFail($id);
        $sppx->update([
            'bulan' => $request->bulan,
            'harga' => $request->harga,
        ]);

        return redirect()->route('admin.X.index')->with('success', 'Admin updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sppx = Sppx::findOrFail($id);
        $sppx->delete();
        return redirect()->route('admin.X.index')->with('success', 'Admin deleted successfully.');
    }
}
