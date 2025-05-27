<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\DetailTagihan;
use Illuminate\Http\Request;
use App\Models\Admin\Tagihan;
use App\Models\Admin\TarifTagihan;
use App\Models\Admin\TahunAjaran;

class DetailTagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $detail_tagihans = DetailTagihan::all();
        
        // Query untuk Detail Tagihan (sesuai yang sudah diperbaiki sebelumnya)
    $detail_tagihans = DetailTagihan::query()
        ->with('tagihan', 'tarifTagihan', 'tahunAjaran')
        ->when($request->search, function($query, $search) {
            return $query->where(function($q) use ($search) {
                $q->where('tagihan_id', 'like', "%{$search}%")
                  ->orWhere('jumlah_tagihan', 'like', "%{$search}%")
                  ->orWhereHas('tagihan', function($subQ) use ($search) {
                      $subQ->where('tagihan_id', 'like', "%{$search}%");
                  })
                  ->orWhereHas('tarifTagihan', function($subQ) use ($search) {
                      $subQ->where('jenis_tagihan_id', 'like', "%{$search}%");
                  })
                  ->orWhereHas('tagihan.tahunAjaran', function($subQ) use ($search) {
                      $subQ->where('tahun_ajaran', 'like', "%{$search}%");
                  });
            });
        })
        ->when($request->tagihan_id, function($query, $tagihanId) {
            return $query->where('tagihan_id', $tagihanId);
        })
        ->when($request->tarif_tagihan_id, function($query, $tarifTagihanId) {
            return $query->where('tarif_tagihan_id', $tarifTagihanId);
        })
        ->when($request->tahun_ajaran, function($query, $tahunId) {
            return $query->whereHas('tagihan', function($q) use ($tahunId) {
                $q->where('id_tahun_ajaran', $tahunId);
            });
        })
        ->when($request->sort, function($query, $sort) {
            switch($sort) {
                case 'tagihan_asc':
                    return $query->orderBy('tagihan_id', 'asc');
                case 'tagihan_desc':
                    return $query->orderBy('tagihan_id', 'desc');
                case 'tarif_asc':
                    return $query->orderBy('tarif_tagihan_id', 'asc');
                case 'tarif_desc':
                    return $query->orderBy('tarif_tagihan_id', 'desc');
                case 'tahun_ajaran_asc':
                    return $query->join('tagihans', 'detail_tagihans.tagihan_id', '=', 'tagihans.id_tagihan')
                               ->join('tahun_ajarans', 'tagihans.id_tahun_ajaran', '=', 'tahun_ajarans.id_tahun_ajaran')
                               ->orderBy('tahun_ajarans.tahun_ajaran', 'asc')
                               ->select('detail_tagihans.*');
                case 'tahun_ajaran_desc':
                    return $query->join('tagihans', 'detail_tagihans.tagihan_id', '=', 'tagihans.id_tagihan')
                               ->join('tahun_ajarans', 'tagihans.id_tahun_ajaran', '=', 'tahun_ajarans.id_tahun_ajaran')
                               ->orderBy('tahun_ajarans.tahun_ajaran', 'desc')
                               ->select('detail_tagihans.*');
                case 'jumlah_tagihan_asc':
                    return $query->orderBy('jumlah_tagihan', 'asc');
                case 'jumlah_tagihan_desc':
                    return $query->orderBy('jumlah_tagihan', 'desc');
                default:
                    return $query->latest();
            }
        }, function($query) {
            return $query->latest();
        })
        ->paginate(10);

    // Data untuk Filter Dropdown
    $tagihans = Tagihan::orderBy('tagihan', 'asc')->get(); // Ambil semua tagihan dengan relasi siswa
    $tarif_tagihans = TarifTagihan::with('jenisTagihan')->get(); // Ambil semua tarif tagihan dengan relasi jenis
    $tahun_ajarans = TahunAjaran::all(); // Ambil semua tahun ajaran
        
        return view('admin.detail_tagihan.index', compact('detail_tagihans', 'tagihans', 'tarif_tagihans', 'tahun_ajarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tagihans = Tagihan::all();
        $tarif_tagihans = TarifTagihan::all();

        return view('admin.detail_tagihan.create', compact('tagihans', 'tarif_tagihans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tagihan_id' => 'required|exists:tagihans,id_tagihan',
            'tarif_tagihan_id' => 'required|exists:tarif_tagihans,id_tarif_tagihan',
            'jumlah_tagihan' => 'required|numeric',
        ]);

        DetailTagihan::create([
            'tagihan_id' => $request->tagihan_id,
            'tarif_tagihan_id' => $request->tarif_tagihan_id,
            'jumlah_tagihan' => $request->jumlah_tagihan,
        ]);

        return redirect()->route('admin.detail-tagihan.index')->with('success', 'Data Berhasil Ditambah');
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
        $detail_tagihans = DetailTagihan::findOrFail($id);
        $tagihans = Tagihan::all();
        $tarif_tagihans = TarifTagihan::all();
        return view('admin.detail_tagihan.edit', compact('detail_tagihans', 'tagihans', 'tarif_tagihans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tagihan_id' => 'required|exists:tagihans,id_tagihan',
            'tarif_tagihan_id' => 'required|exists:tarif_tagihans,id_tarif_tagihan',
            'jumlah_tagihan' => 'required|numeric',
        ]);

        $detail_tagihans = DetailTagihan::findOrFail($id);

        $detail_tagihans->update([
            'tagihan_id' => $request->tagihan_id,
            'tarif_tagihan_id' => $request->tarif_tagihan_id,
            'jumlah_tagihan' => $request->jumlah_tagihan,
        ]);

        return redirect()->route('admin.detail-tagihan.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail_tagihans = DetailTagihan::findOrFail($id);
        $detail_tagihans->delete();
        return redirect()->route('admin.detail-tagihan.index')->with('success', 'Data Berhasil Dihapus');
    }
}
