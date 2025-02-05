<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\Tagihanxi;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $admins = Tagihan::all();
        $XI = Tagihanxi::all();
        return view('admin.dashboard', compact('admins', 'XI'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tagihan.X.create');
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
        
        Tagihan::create([
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
        $admin = Tagihan::findOrFail($id);
        return view('admin.dashboard', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Tagihan::findOrFail($id);
        return view('admin.tagihan.X.edit', compact('admin'));
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

        $admin = Tagihan::findOrFail($id);
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
        $admin = Tagihan::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Admin deleted successfully.');
    }
}


