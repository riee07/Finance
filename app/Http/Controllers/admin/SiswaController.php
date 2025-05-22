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

    public function edit(Siswa $siswa)
    {
        $siswas = Siswa::with('tahunAjaran', 'user')->get();
        $tahun_ajarans = TahunAjaran::all();
        return view('admin.siswa.edit', compact('siswa', 'tahun_ajarans'));
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
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id_tahun_ajaran',
            'status_aktif' => 'required|in:aktif,non-aktif',
        ]);

        DB::transaction(function () use ($validated) {
            // Email otomatis: "AF" + 4 angka acak dari NISN
            $nisnDigits = str_split($validated['nisn']);
            shuffle($nisnDigits);
            $emailCode = implode('', array_slice($nisnDigits, 0, 4));
            $email = 'AF' . $emailCode . '@gmail.com';

            // Password: NISN
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
        });

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

public function update(Request $request, $id)
{
    $siswa = Siswa::findOrFail($id);
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'nisn' => 'required|unique:siswas,nisn,' . $siswa->id . 'id',
        'kelas' => 'required|in:x,xi,xii',
        'jurusan' => 'required|in:pplg,tjkt,an,dkv,ak,mp,dpb,lps,br',
        'no_hp' => 'nullable|string',
        'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id_tahun_ajaran',
        'status_aktif' => 'required|in:aktif,non-aktif',
    ]);

    try {
        DB::transaction(function () use ($validated, $siswa) {
            // Find the associated user
            $user = User::findOrFail($siswa->user_id);

            // Update user data (name & password)
            $user->update([
                'name' => $validated['name'],
                'password' => Hash::make($validated['nisn']), // Update password if NISN changed
            ]);
            if ($validated['nisn'] !== $siswa->nisn) {
                $user->password = Hash::make($validated['nisn']);
            }

            // Update siswa data
            $siswa->update([
                'name' => $validated['name'],
                'nisn' => $validated['nisn'],
                'kelas' => $validated['kelas'],
                'jurusan' => $validated['jurusan'],
                'no_hp' => $validated['no_hp'] ?? null,
                'tahun_ajaran_id' => $validated['tahun_ajaran_id'],
                'status_aktif' => $validated['status_aktif'],
            ]);
        });

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memperbarui data: '.$e->getMessage());
        }
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

    public function promosiKelas(Request $request)
    {
        DB::transaction(function () {
            // Ambil tahun ajaran aktif
            $tahunSekarang = TahunAjaran::where('status', 'aktif')->first();
            if (!$tahunSekarang) {
                throw new \Exception("Tahun ajaran aktif belum diatur.");
            }

            // Ambil semua siswa aktif
            $siswas = Siswa::where('status_aktif', 'aktif')->get();

            foreach ($siswas as $siswa) {
                // Tentukan kelas baru
                $kelasBaru = match ($siswa->kelas) {
                    'x' => 'xi',
                    'xi' => 'xii',
                    'xii' => 'lulus', // lulus
                    default => null,
                };

                if ($kelasBaru === null) {
                    // Siswa lulus → nonaktifkan
                    $siswa->update([
                        'status_aktif' => 'non-aktif',
                    ]);
                } else {
                    // Naik kelas + ganti tahun ajaran
                    $siswa->update([
                        'kelas' => $kelasBaru,
                        'tahun_ajaran_id' => $tahunSekarang->id_tahun_ajaran,
                    ]);
                }
            }
        });

        return back()->with('success', 'Kelas siswa berhasil diperbarui.');
    }

}
