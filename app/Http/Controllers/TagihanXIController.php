<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihanxi;

class TagihanXIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $XI = Tagihanxi::all();
        return view('admin.tagihan.XI.index', compact('XI'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tagihan.XI.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $request->validate([
            'judul_XI' => 'required|string|max:255',
            'harga_XI' => 'required|numeric',
        ]);

        Tagihanxi::create([
            'judul_XI' => $request->judul_XI,
            'harga_XI' => $request->harga_XI,
        ]);

        return redirect()->route('admin.tagihan.XI.index')->with('success', 'Admin created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $xi = Tagihanxi::findOrFail($id);
        return view('admin.tagihan.XI.index', compact('xi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $xi = Tagihanxi::findOrFail($id);
        return view('admin.tagihan.XI.edit', compact('xi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul_XI' => 'required',
            'harga_XI' => 'required',
        ]);

        $xi = Tagihanxi::findOrFail($id);
        $xi->update([
            'judul_XI' => $request->judul_XI,
            'harga_XI' => $request->harga_XI,
        ]);

        return redirect()->route('admin.tagihan.XI.index')->with('success', 'Admin updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $xi = Tagihanxi::findOrFail($id);
        $xi->delete();
        return redirect()->route('admin.tagihan.XI.index')->with('success', 'Admin deleted successfully.');
    }
}