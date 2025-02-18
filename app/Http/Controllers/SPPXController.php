<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sppx;

class SPPXController extends Controller
{
    public function index()
    {
        $sppes = Sppx::all();
        return view('admin.x.spp.dashboard', compact('sppes')); 
    }

    public function create()
    {
        return view('admin.x.spp.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required|in:Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember',
            'harga' => 'required|integer',
        ]);

        Sppx::create([
            'bulan' => $request->bulan,
            'harga' => $request->harga,
        ]);

        return redirect()->route('admin.x.spp.index');
    }

    public function show()
    {
        // kosongkan dulu lek
    }

    public function edit(string $id)
    {
        $sppes = Sppx::findOrFail($id);
        return view('admin.x.spp.edit', compact('sppes'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'bulan' => 'required|in:Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember',
            'harga' => 'required|integer',
        ]);

        $sppes = Sppx::findOrFail($id);
        $sppes::create([
            'bulan' => $request->bulan,
            'harga' => $request->harga,
        ]);

        return redirect()->route('admin.x.spp.index')->with('success', 'Data kuntul berhasil di sigma kan');
    }

    public function destroy(string $id)
    {
        $sppes = Sppx::findOrFail($id);
        $sppes->delete();
        return redirect()->route('admin.x.spp.index')->with('success', 'Admin deleted successfully.');
    }
}
