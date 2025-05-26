<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\JenisTagihan;
use App\Models\Admin\TahunAjaran;
use App\Models\Admin\TarifTagihan;
use Illuminate\Http\Request;

class TarifTagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tarif_tagihans = TarifTagihan::with('tahunAjaran', 'jenisTagihan')->get();
        $tahun_ajarans = TahunAjaran::all();

        $tarif_tagihans = TarifTagihan::query()
            ->with('tahunAjaran', 'jenisTagihan')
            ->when($request->search, function($query, $search) {
                return $query->where('jenis_tagihan_id', 'like', "%{$search}%")
                    ->orWhere('jumlah_tarif', 'like', "%{$search}%")
                    ->orWhereHas('tahunAjaran', function($q) use ($search) {
                        $q->where('tahun_ajaran', 'like', "%{$search}%");
                    });      
            })
            ->when($request->jenis_tagihan, function($query, $jenisTagihan) {
                return $query->where('jenis_tagihan_id', $jenisTagihan);
            })
            ->when($request->tahun_ajaran, function($query, $tahunId) {
                return $query->where('id_tahun_ajaran', $tahunId);
            })
            ->when($request->sort, function($query, $sort) {
                switch($sort) {
                    case 'jenis_tagihan_asc':
                        return $query->orderBy('jenis_tagihan_id', 'asc');
                    case 'jenis_tagihan_desc':
                        return $query->orderBy('jenis_tagihan_id', 'desc');
                    case 'jumlah_tarif_asc':
                        return $query->orderBy('jumlah_tarif', 'asc');
                    case 'jumlah_tarif_desc':
                        return $query->orderBy('jumlah_tarif', 'desc');
                    case 'tahun_ajaran_asc':
                        return $query->orderBy('tahun_ajaran_id', 'asc');
                    case 'tahun_ajaran_desc':
                        return $query->orderBy('tahun_ajaran_id', 'desc');
                    default:
                        return $query->latest();
                }
            },  function($query) {
                return $query->latest();
            })
            ->paginate(10);
        
        $jenis_tagihans = JenisTagihan::orderby('jenis_tagihan')->get();
        $tahunAjarans = TahunAjaran::orderBy('tahun_ajaran', 'desc')->get();
        return view('admin.tarif_tagihan.index', compact('tarif_tagihans', 'jenis_tagihans', 'tahun_ajarans'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_tagihans = JenisTagihan::all();
        $tahun_ajarans = TahunAjaran::all();
        return view('admin.tarif_tagihan.create', compact('jenis_tagihans', 'tahun_ajarans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_tagihan_id' => 'required|exists:jenis_tagihans,id_jenis_tagihan',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id_tahun_ajaran' ,
            'jumlah_tarif' => 'required|numeric',
        ]);

        TarifTagihan::create($request->all());

        return redirect()->route('admin.tarif-tagihan.index')->with('success', 'data berhasil ditambah');
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
    public function edit(string $id)
    {
        $tarif_tagihans = TarifTagihan::findOrFail($id);
        $jenis_tagihans = JenisTagihan::all();
        $tahun_ajarans = TahunAjaran::all();
        return view('admin.tarif_tagihan.edit', compact('tarif_tagihans', 'jenis_tagihans', 'tahun_ajarans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis_tagihan_id' => 'required|exists:jenis_tagihans,id_jenis_tagihan',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id_tahun_ajaran' ,
            'jumlah_tarif' => 'required|numeric',
        ]);

        $tarif_tagihan = TarifTagihan::findOrFail($id);
        $tarif_tagihan->update($request->all());

        return redirect()->route('admin.tarif-tagihan.index')->with('success', 'data berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tarif_tagihan = TarifTagihan::findOrFail($id);
        $tarif_tagihan->delete();

        return redirect()->route('admin.tarif-tagihan.index')->with('success', 'Tarif Tagihan berhasil dihapus');
    }
}
