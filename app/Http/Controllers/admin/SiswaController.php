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
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('tahunAjaran', 'user')->get();
        return view('admin.siswa.index', compact('siswas'));
    }

    public function excel()
    {
        return Excel::download(new SiswaExport, 'DataSiswa.xlsx');
        
        Excel::import(new SiswaImport, $request->file('file'));
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        return back()->with('success', 'Data siswa berhasil diimpor!');
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
            'kelas' => 'required|in:x,xi,xii',
            'jurusan' => 'required|in:pplg,tjkt,an,dkv,ak,mp,dpb,lps,br',
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
            // $passwordLetters = strtoupper(Str::random(3));
            // $passwordNumbers = str_pad(random_int(0, 999), 3, '0', STR_PAD_LEFT);
            // $rawPassword = $passwordLetters . $passwordNumbers;

            // Buat user akun
            $user = User::create([
                'name' => $validated['name'],
                'email' => $email,
                'password' => Hash::make($validated['nisn']),
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
            // session()->flash('generated_password', $rawPassword);
        });

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function destroy(Siswa $siswa)
    {
        try {
            // Hapus akun user terkait jika ada
            if ($siswa->user) {
                $siswa->user->delete();
            }

            // Hapus data siswa
            $siswa->delete();

            return redirect()->route('siswa.index')
                ->with('success', 'Data siswa dan akun berhasil dihapus');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
