<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihanxii;

class TagihanXIIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $XII = Tagihanxii::all();
        return view('admin.tagihan.XII.index', compact('XII'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tagihan.XII.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_XII' => 'required|string|max:255',
            'harga_XII' => 'required|numeric',
            'kelas_XII' => 'required|string|max:10'
        ]);

        Tagihanxii::create([
            'judul_XII' => $request->judul_XII,
            'harga_XII' => $request->harga_XII,
            'kelas_XII' => $request->kelas_XII
        ]);

        return redirect()->route('admin.tagihan.XII.index')->with('success', 'Admin created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $xii = Tagihanxii::findOrFail($id);
        return view('admin.tagihan.XII.index', compact('xii'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $xii = Tagihanxii::findOrFail($id);
        return view('admin.tagihan.XII.edit', compact('xii'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul_XII' => 'required',
            'harga_XII' => 'required',
            'kelas_XII' => 'required'
        ]);

        $xii = Tagihanxii::findOrFail($id);
        $xii->update([
            'judul_XII' => $request->judul_XII,
            'harga_XII' => $request->harga_XII,
            'kelas_XII' => $request->kelas_XII
        ]);

        return redirect()->route('admin.tagihan.XII.index')->with('success', 'Admin updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $xii = Tagihanxii::findOrFail($id);
        $xii->delete();
        return redirect()->route('admin.tagihan.XII.index')->with('success', 'Admin deleted successfully.');
    }
}