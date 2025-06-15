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
    public function index(Request $request)
    {
        $siswas = Siswa::with('tahunAjaran', 'user')->get();
        $tahun_ajarans = TahunAjaran::all();
        $siswas = Siswa::query()
        ->with('tahunAjaran', 'user')
        ->when($request->search, function($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('nisn', 'like', "%{$search}%")
                ->orWhere('kelas', 'like', "%{$search}%")
                ->orWhere('jurusan', 'like', "%{$search}%")
                ->orWhere('no_hp', 'like', "%{$search}%")
                ->orWhereHas('tahunAjaran', function($q) use ($search) {
                        $q->where('tahun_ajaran', 'like', "%{$search}%");
                    })
                ->orWhereHas('user', function($q) use ($search) {
                    $q->where('email', 'like', "%{$search}%");
                });
        })
        ->when($request->jurusan, function($query, $jurusan) {
            return $query->where('jurusan', $jurusan);
        })
        ->when($request->kelas, function($query, $kelas) {
            return $query->where('kelas', 'like', "{$kelas}%");
        })
        ->when($request->status_aktif, function($query, $status) {
            return $query->where('status_aktif', $status);
        })
        ->when($request->tahun_ajaran, function($query, $tahunId) {
            return $query->where('id_tahun_ajaran', $tahunId);
        })
        ->when($request->sort, function($query, $sort) {
            switch($sort) {
                case 'name_asc':
                    return $query->orderBy('name', 'asc');
                case 'name_desc':
                    return $query->orderBy('name', 'desc');
                case 'kelas_asc':
                    return $query->orderBy('kelas', 'asc');
                case 'kelas_desc':
                    return $query->orderBy('kelas', 'desc');
                case 'tahun_ajaran_desc':
                    return $query->orderBy('id_tahun_ajaran', 'desc');
                case 'tahun_ajaran_asc':
                    return $query->orderBy('id_tahun_ajaran', 'asc');
                default:
                    return $query->latest();
            }
        }, function($query) {
            return $query->latest();
        })
        ->paginate(10);

        $tahunAjarans = TahunAjaran::orderBy('tahun_ajaran', 'desc')->get();
        return view('admin.siswa.index', compact('siswas', 'tahun_ajarans'));
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
            // Generate email
            $nisnDigits = str_split($validated['nisn']);
            shuffle($nisnDigits);
            $emailCode = implode('', array_slice($nisnDigits, 0, 4));
            $email = 'AF' . $emailCode . '@gmail.com';

            // 1. Buat dulu data siswa tanpa user_id
            $siswa = Siswa::create([
                'name' => $validated['name'],
                'nisn' => $validated['nisn'],
                'kelas' => $validated['kelas'],
                'jurusan' => $validated['jurusan'],
                'no_hp' => $validated['no_hp'] ?? null,
                'tahun_ajaran_id' => $validated['tahun_ajaran_id'],
                'status_aktif' => $validated['status_aktif'],
            ]);

            // 2. Buat user dan isi siswa_id
            $user = User::create([
                'name' => $validated['name'],
                'email' => $email,
                'password' => Hash::make($validated['nisn']),
                'role' => 'siswa',
                'siswa_id' => $siswa->id_siswa,
            ]);

            // 3. Update user_id di data siswa
            $siswa->update([
                'user_id' => $user->id,
            ]);

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
