<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sppxi;

class SPPXIController extends Controller
{
    public function index()
    {
        $sppes = Sppxi::all();
        return view('admin.xi.spp.dashboard', compact('sppes')); 
    }

    public function create()
    {
        return view('admin.xi.spp.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required|in:Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember',
            'harga' => 'required|integer',
        ]);

        Sppxi::create([
            'bulan' => $request->bulan,
            'harga' => $request->harga,
        ]);

        return redirect()->route('admin.xi.spp.index');
    }

    public function show()
    {
        // kosongkan dulu lek
    }

    public function edit(string $id)
    {
        $sppes = Sppxi::findOrFail($id);
        return view('admin.xi.spp.edit', compact('sppes'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'bulan' => 'required|in:Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember',
            'harga' => 'required|integer',
        ]);

        $sppes = Sppxi::findOrFail($id);
        $sppes::create([
            'bulan' => $request->bulan,
            'harga' => $request->harga,
        ]);

        return redirect()->route('admin.xi.spp.index')->with('success', 'Data kuntul berhasil di sigma kan');
    }

    public function destroy(string $id)
    {
        $sppes = Sppxi::findOrFail($id);
        $sppes->delete();
        return redirect()->route('admin.xi.spp.index')->with('success', 'Admin deleted successfully.');
    }
}
