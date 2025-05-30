<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin\Pembayaran;
use App\Models\Admin\Tagihan;
use App\Exports\PembayaranExport;
use Maatwebsite\Excel\Facades\Excel;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pembayarans = Pembayaran::all();
        
        // $permbayarans = Pembayaran::query()
        //     ->with('tagihan')
        //     ->when($request->search, function($query, $search) {
        //         return $query->where(function($q) use ($search) {
        //             $q->where('metode_pembayaran', 'like', "%{$search}%")
        //               ->orWhere('tanggal_pembayaran', 'like', "%{$search}%")
        //               ->orWhere('jumlah_pembayaran', 'like', "%{$search}%")
        //               ->orWhere('metode_pembayaran', 'like', "%{$search}%")
        //               ->orWhereHas('tagihan', function($q) use ($search) {
        //                 $q->where('tagihan', 'like', "%{$search}%");
        //             });           

        //     });
            $pembayarans = Pembayaran::query()
                ->with('tagihan')
                ->when($request->search, function($query, $search) {
                    return $query->where(function($q) use ($search) {
                        $q->where('metode_pembayaran', 'like', "%{$search}%")
                        ->orWhere('tanggal_pembayaran', 'like', "%{$search}%")
                        ->orWhere('jumlah_pembayaran', 'like', "%{$search}%")
                        ->orWhereHas('tagihan', function($q) use ($search) {
                                $q->where('tagihan', 'like', "%{$search}%");
                            });  
                    });
                
            })
            ->when($request->tagihan_id, function($query, $tagihan_id) {
                return $query->where('tagihan_id', $tagihan_id);
            })
            ->when($request->tanggal_pembayaran, function($query, $tanggal_pembayaran) {
                return $query->whereDate('tanggal_pembayaran', $tanggal_pembayaran);
            })
            ->when($request->jumlah_pembayaran, function($query, $jumlah_pembayaran) {
                return $query->where('jumlah_pembayaran', $jumlah_pembayaran);
            })
            ->when($request->metode_pembayaran, function($query, $metode_pembayaran) {
                return $query->where('metode_pembayaran', $metode_pembayaran);
            })
            ->when($request->sort, function($query, $sort) {
                switch($sort) {
                    case 'tanggal_pembayaran_asc':
                        return $query->orderBy('tanggal_pembayaran', 'asc');
                    case 'tanggal_pembayaran_desc':
                        return $query->orderBy('tanggal_pembayaran', 'desc');
                    case 'jumlah_pembayaran_asc':
                        return $query->orderBy('jumlah_pembayaran', 'asc');
                    case 'jumlah_pembayaran_desc':
                        return $query->orderBy('jumlah_pembayaran', 'desc');
                }
            }, function($query) {
                return $query->latest();
            })
            ->paginate(10);

            

        $tagihans = Tagihan::orderBy('tagihan', 'asc')->get();
        return view('admin.pembayaran.index', compact('pembayarans', 'tagihans'));
    }

    public function export()
    {
        return Excel::download(new PembayaranExport, 'admin.pembayaran.xlsx');
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tagihans = Tagihan::all();
        return view('admin.pembayaran.create', compact('tagihans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tagihan_id' => 'required|exists:tagihans,id_tagihan',
            'tanggal_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|numeric',
            'metode_pembayaran' => 'required|in:Transfer,Tunai',
        ]);
        
        Pembayaran::create([
            'tagihan_id' => $request->tagihan_id,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        return redirect()->route('admin.pembayaran.index')->with('success', 'Data Berhasil Ditambah');
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
        $pembayarans = Pembayaran::findOrFail($id);
        $tagihans = Tagihan::all();
        return view('admin.pembayaran.edit', compact('pembayarans', 'tagihans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tagihan_id' => 'required|exists:tagihans,id_tagihan',
            'tanggal_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
        ]);

        $pembayarans = Pembayaran::findOrFail($id);
        
        $pembayarans->update([
            'tagihan_id' => $request->tagihan_id,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        return redirect()->route('admin.pembayaran.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pembayarans = Pembayaran::findOrFail($id);
        $pembayarans->delete();
        return redirect()->route('admin.pembayaran.index')->with('success', 'Data Berhail Dihapus');
    }
}
