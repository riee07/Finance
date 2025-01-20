<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagihanX;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $admins = TagihanXI::all();
        return view('admin.dashboard', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tagihan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'kelas' => 'required|string|max:10'
        ]);

        TagihanXI::create([
            'judul' => $request->judul,
            'harga' => $request->harga,
            'kelas' => $request->kelas
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
        return view('admin.tagihan.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'harga' => 'required',
            'kelas' => 'required'
        ]);

        $admin = TagihanXI::findOrFail($id);
        $admin->update([
            'judul' => $request->judul,
            'harga' => $request->harga,
            'kelas' => $request->kelas
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
