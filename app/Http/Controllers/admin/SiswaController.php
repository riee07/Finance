<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Admin\Siswa;
use App\Models\Admin\TahunAjaran;
use Illuminate\Support\Str;

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
            'nisn' => 'required|unique:siswas',
            'kelas' => 'required|string',
            'jurusan' => 'required|string',
            'no_hp' => 'nullable|string',
            'tahun_ajaran_id' => 'nullable|exists:tahun_ajarans,id_tahun_ajaran',
            'status_aktif' => 'required|in:aktif,non-aktif',
        ]);

        DB::transaction(function () use ($validated) {
            // Email: "AF" + 4 digit acak dari NISN
            $nisnDigits = str_split($validated['nisn']);
            shuffle($nisnDigits);
            $emailCode = implode('', array_slice($nisnDigits, 0, 4));
            $email = 'AF' . $emailCode . '@gmail.com';

            // Password: 3 huruf kapital + 3 angka
            $passwordLetters = strtoupper(Str::random(3));
            $passwordNumbers = str_pad(random_int(0, 999), 3, '0', STR_PAD_LEFT);
            $rawPassword = $passwordLetters . $passwordNumbers;

            // Buat user akun
            $user = User::create([
                'name' => $validated['name'],
                'email' => $email,
                'password' => Hash::make($rawPassword),
                'password_polos' => $rawPassword,
                'role' => 'siswa',
            ]);

            // Buat data siswa
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

            // Optional: Simpan info login (email & password) ke session
            session()->flash('generated_email', $email);
            session()->flash('generated_password', $rawPassword);
        });

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

}
