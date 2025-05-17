<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Admin\Siswa;
use App\Models\Admin\TahunAjaran;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('tahunAjaran', 'user')->get();
        return view('admin.siswa.index', compact('siswas'));
    }

    public function create()
    {
        $tahun_ajarans = TahunAjaran::all();
        return view('admin.siswa.create', compact('tahun_ajarans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'nisn' => 'required|unique:siswas',
            'kelas' => 'required|string',
            'jurusan' => 'required|string',
            'no_hp' => 'nullable|string',
            'tahun_ajaran_id' => 'nullable|exists:tahun_ajarans,id_tahun_ajaran',
            'status_aktif' => 'required|in:aktif,non-aktif',
        ]);

        DB::transaction(function () use ($validated) {
            // 1. Buat user akun
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'password_polos' => $validated['password'],
                'role' => 'siswa',
            ]);

            // 2. Buat data siswa
            Siswa::create([
                'user_id' => $user->id,
                'name' => $validated['name'],
                'nisn' => $validated['nisn'],
                'kelas' => $validated['kelas'],
                'jurusan' => $validated['jurusan'],
                'no_hp' => $validated['no_hp'] ?? null,
                'tahun_ajaran_id' => $validated['tahun_ajaran_id'] ?? null,
                'status_aktif' => $validated['status_aktif'],
            ]);
        });

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }
}
