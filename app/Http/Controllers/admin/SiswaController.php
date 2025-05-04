<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Siswa;

use Illuminate\Http\Request;
use App\Models\Admin\TahunAjaran;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;



class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('tahunAjaran')->get();
        return view('admin.siswa.index', compact('siswas'));
    }

    public function create()
    {
        $tahun_ajarans = TahunAjaran::all();
        return view('admin.siswa.create', compact('tahun_ajarans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nis' => 'required|numeric|unique:siswas',
            'kelas' => 'required|string',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id_tahun_ajaran',
            'status_aktif' => 'required|in:aktif,non-aktif',
        ]);

        Siswa::create($request->all());

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $tahun_ajarans = TahunAjaran::all();
        return view('admin.siswa.edit', compact('siswa', 'tahun_ajarans'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|numeric|unique:siswas,nis,'.$id.',id_siswa',
            'kelas' => 'required|string',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id_tahun_ajaran',
            'status_aktif' => 'required|in:aktif,non-aktif',
        ]);
        

        $siswa->nama = $request->nama;
        $siswa->nis = $request->nis;
        $siswa->kelas = $request->kelas;
        $siswa->tahun_ajaran_id = $request->tahun_ajaran_id;
        $siswa->status_aktif = $request->status_aktif;

        Log::info('Menyimpan siswa:', $siswa->toArray());   

        $siswa->save();

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
}
