<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\JenisTagihan;
use Illuminate\Http\Request;

class JenisTagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_tagihans = JenisTagihan::all();

        $jenis_tagihans = JenisTagihan::query()
            ->when(request('search'), function($query, $search) {
                return $query->where('jenis_tagihan', 'like', "%{$search}%");
            })
            ->orderBy('jenis_tagihan', 'asc')
            ->get();
        return view('admin.jenis_tagihan.index', compact('jenis_tagihans'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jenis_tagihan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_tagihan' => 'required|string',
        ]);

        JenisTagihan::create($request->all());

        return redirect()->route('admin.jenis-tagihan.index')->with('success', 'berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_jenis_tagihan)
    {
        $jenis_tagihans = JenisTagihan::findOrFail($id_jenis_tagihan);

        return view('admin.jenis_tagihan.edit', compact('jenis_tagihans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis_tagihan' => 'required|string',
        ]);

        $jenis_tagihan = JenisTagihan::findOrFail($id);

        $jenis_tagihan->update($request->all());

        return redirect()->route('admin.jenis-tagihan.index')->with('success', 'berhasil ditambah');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenis_tagihan = JenisTagihan::findOrFail($id);
        $jenis_tagihan->delete();
        return redirect()->route('admin.jenis-tagihan.index')->with('success', 'berhasil diubah');
    }

    public function ajaxStore(Request $request)
    {
        $request->validate([
            'jenis_tagihan' => 'required|string|max:255',
        ]);

        $jenis = JenisTagihan::create([
            'jenis_tagihan' => $request->jenis_tagihan
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $jenis
        ]);
    }

}
