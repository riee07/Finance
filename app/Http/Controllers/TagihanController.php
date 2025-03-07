<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\Sppx;



class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $X = Tagihan::all();
        $SPPX = Sppx::all();
        return view('admin.X.index', compact('X', 'SPPX'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.X.tagihan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);
        
        Tagihan::create([
            'judul' => $request->judul,
            'harga' => $request->harga,
        ]);

        return redirect()->route('x.index')->with('success', 'Admin created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $x = Tagihan::findOrFail($id);
        return view('admin.X.index', compact('x'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $x = Tagihan::findOrFail($id);
        return view('admin.X.tagihan.edit', compact('x'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'judul' => 'required',
        'harga' => 'required',
    ]);

        $x = Tagihan::findOrFail($id);
        $x->update([
            'judul' => $request->judul,
            'harga' => $request->harga,
        ]);

        return redirect()->route('x.index')->with('success', 'Admin updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $x = Tagihan::findOrFail($id);
        $x->delete();
        return redirect()->route('x.index')->with('success', 'Admin deleted successfully.');
    }
}


