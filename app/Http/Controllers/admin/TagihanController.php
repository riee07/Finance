<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin\Tagihan;
use App\Models\Admin\Siswa;
use App\Models\Admin\TahunAjaran;
use App\Models\Admin\JenisTagihan;
use App\Models\Admin\TarifTagihan;
use App\Models\Admin\DetailTagihan;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tagihans = Tagihan::with('siswa', 'tahunAjaran')->get();
        $tahun_ajarans = TahunAjaran::all();

        $tagihans = Tagihan::query()
            ->with('tahunAjaran', 'siswa')
            ->when($request->search, function($query, $search){
                return $query->where('total_tagihan', 'like', "%{$search}%")
                    ->orWhere('status_pembayaran', 'like', "%{$search}%")
                    ->orWhereHas('siswa', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('tahunAjaran', function($q) use ($search) {
                        $q->where('tahun_ajaran', 'like', "%{$search}%");
                    });
            })
            ->when($request->total_tagihan, function($query, $total) {
            return $query->where('total_tagihan', $total);
            })
            ->when($request->status, function($query, $status) {
                return $query->where('status_pembayaran', $status);
            })
            ->when($request->tahun_ajaran, function($query, $tahunId) {
                return $query->where('id_tahun_ajaran', $tahunId);
            })
            ->when($request->siswa_id, function($query, $siswa_id){
                return $query->where('siswa_id', $siswa_id);
            })
            ->when($request->sort, function($query, $sort) {
                switch($sort) {
                    case 'siswa_asc':
                        return $query->orderBy('siswa', 'asc');
                    case 'siswa_desc':
                        return $query->orderBy('siswa', 'desc');
                    case 'tahun_ajaran_asc':
                        return $query->orderBy('tahun_ajaran', 'asc');
                    case 'tahun_ajaran_desc':
                        return $query->orderBy('tahun_ajaran', 'desc');
                    case 'total_tagihan_asc':
                        return $query->orderBy('total_tagihan', 'asc');
                    case 'total_tagihan_desc':
                        return $query->orderBy('total_tagihan', 'desc');   
                }
            }, function($query) {
                return $query->latest();
            })
            ->paginate(10);
        
        $siswas = Siswa::orderBy('siswa', 'desc')->get();
        return view('admin.tagihan.index', compact('tagihans', 'siswas', 'tahun_ajarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswas = Siswa::all();
        $tahun_ajarans = TahunAjaran::all();
        return view('admin.tagihan.create', compact('siswas', 'tahun_ajarans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id_siswa',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id_tahun_ajaran',
            'total_tagihan' => 'required|numeric',
            'status_pembayaran' => 'required|in:belum_lunas,lunas',
        ]);
    
        Tagihan::create([
            'siswa_id' => $request->siswa_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'total_tagihan' => $request->total_tagihan,
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        return redirect()->route('admin.tagihan.index')->with('success', 'Data Berhasil Ditambah');
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
        $tagihans = Tagihan::findOrFail($id);
        $siswas = Siswa::all();
        $tahun_ajarans = TahunAjaran::all();

        return view('admin.tagihan.edit', compact('tagihans', 'siswas', 'tahun_ajarans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id_siswa',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id_tahun_ajaran',
            'total_tagihan' => 'required|numeric',
            'status_pembayaran' => 'required|in:belum_lunas,lunas',
        ]);
    
        $tagihans = Tagihan::findOrFail($id);
        
        $tagihans->update([
            'siswa_id' => $request->siswa_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'total_tagihan' => $request->total_tagihan,
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        return redirect()->route('admin.tagihan.index')->with('success', 'Data Berhasil Ditambah'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tagihans = Tagihan::findOrFail($id);
        $tagihans->delete();
        return redirect()->route('admin.tagihan.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function generate(Request $request)
    {
        $tahunAjaranId = $request->tahun_ajaran_id;

        $siswaAktif = Siswa::where('status_aktif', 'aktif')
            ->where('tahun_ajaran_id', $tahunAjaranId)
            ->get();

        $jenisTagihans = JenisTagihan::all();

        foreach ($siswaAktif as $siswa) {
            // Cek apakah tagihan utama sudah ada
            $tagihan = Tagihan::firstOrCreate(
                [
                    'siswa_id' => $siswa->id_siswa,
                    'tahun_ajaran_id' => $tahunAjaranId,
                ],
                [
                    'total_tagihan' => 0,
                    'status_pembayaran' => 'belum_lunas',
                ]
            );

            $total = $tagihan->detailTagihan()->sum('jumlah_tagihan');

            foreach ($jenisTagihans as $jenis) {
                $tarif = TarifTagihan::where('jenis_tagihan_id', $jenis->id_jenis_tagihan)
                    ->where('tahun_ajaran_id', $tahunAjaranId)
                    ->first();

                if (!$tarif) continue;

                $cekDetail = DetailTagihan::where('tagihan_id', $tagihan->id_tagihan)
                    ->where('tarif_tagihan_id', $tarif->id_tarif_tagihan)
                    ->first();

                if (!$cekDetail) {
                    DetailTagihan::create([
                        'tagihan_id' => $tagihan->id_tagihan,
                        'tarif_tagihan_id' => $tarif->id_tarif_tagihan,
                        'jumlah_tagihan' => $tarif->jumlah_tarif,
                    ]);

                    $total += $tarif->jumlah_tarif;
                }
            }

            $tagihan->update(['total_tagihan' => $total]);
        }

        return back()->with('success', 'Tagihan berhasil digenerate (termasuk yang belum lengkap)!');
    }

}
