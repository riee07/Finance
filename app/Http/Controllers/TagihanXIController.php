<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagihanXI;

class TagihanXIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $admins = Tagihanxi::all();
        return view('admin.dashboard', compact('admins'));
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
            'kelas_XI' => 'required|string|max:10'
        ]);

        TagihanXI::create([
            'judul_XI' => $request->judul_XI,
            'harga_XI' => $request->harga_XI,
            'kelas_XI' => $request->kelas_XI
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Admin created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = TagihanXI::findOrFail($id);
        return view('admin.dashboard', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = TagihanXI::findOrFail($id);
        return view('admin.tagihan.XI.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul_XI' => 'required',
            'harga_XI' => 'required',
            'kelas_XI' => 'required'
        ]);

        $admin = TagihanXI::findOrFail($id);
        $admin->update([
            'judul_XI' => $request->judul_XI,
            'harga_XI' => $request->harga_XI,
            'kelas_XI' => $request->kelas_XI
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Admin updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = TagihanXI::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Admin deleted successfully.');
    }
}