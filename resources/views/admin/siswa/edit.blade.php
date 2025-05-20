@extends('layouts.navigation')

@section('title', 'Tambah Siswa')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Siswa</h1>

    <form action="{{ route('admin.siswa.update', $siswa->id_siswa) }}" method="POST">
        @csrf
        @method('PUT')
        <label class="block">Nama:</label>
        <input type="text" name="name" class="border p-2 w-full" value="{{ $siswa->name }}" required>

        <label class="block mt-2">NIS:</label>
        <input type="text" name="nisn" class="border p-2 w-full" value="{{ $siswa->nisn }}" required>

        <label class="block text-gray-700 mb-2">Kelas</label>
        <select name="kelas" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="x" {{ old('kelas', $siswa->kelas) == 'x' ? 'selected' : '' }}>Kelas X</option>
            <option value="xi" {{ old('kelas', $siswa->kelas) == 'xi' ? 'selected' : '' }}>Kelas XI</option>
            <option value="xii" {{ old('kelas', $siswa->kelas) == 'xii' ? 'selected' : '' }}>Kelas XII</option>
        </select>

        <label class="block mt-2">Jurusan:</label>
        <select name="jurusan" class="border p-2 w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="">Pilih Jurusan</option>
            <option value="pplg" {{ old('jurusan', $siswa->jurusan) == 'pplg' ? 'selected' : '' }}>PPLG</option>
            <option value="tkj" {{ old('jurusan', $siswa->jurusan) == 'tkj' ? 'selected' : '' }}>TKJ</option>
            <option value="an" {{ old('jurusan', $siswa->jurusan) == 'an' ? 'selected' : '' }}>AN</option>
            <option value="dpb" {{ old('jurusan', $siswa->jurusan) == 'dpb' ? 'selected' : '' }}>DPB</option>
            <option value="mp" {{ old('jurusan', $siswa->jurusan) == 'mp' ? 'selected' : '' }}>MP</option>
            <option value="br" {{ old('jurusan', $siswa->jurusan) == 'br' ? 'selected' : '' }}>BR</option>
            <option value="ak" {{ old('jurusan', $siswa->jurusan) == 'ak' ? 'selected' : '' }}>AK</option>
            <option value="lps" {{ old('jurusan', $siswa->jurusan) == 'lps' ? 'selected' : '' }}>LPS</option>
            <option value="dkv" {{ old('jurusan', $siswa->jurusan) == 'dkv' ? 'selected' : '' }}>DKV</option>
        </select>        

        <label class="block mt-2">Tahun Ajaran:</label>
        <select name="tahun_ajaran_id" class="border p-2 w-full" value="{{ $siswa->tahun_ajaran }}" required>
            @foreach($tahun_ajarans as $tahun)
            <option value="{{ $tahun->id_tahun_ajaran }}">{{ $tahun->tahun_ajaran }}</option>
            @endforeach
        </select>
        
        <label class="block mt-2">Status Siswa:</label>
        <select name="status_aktif" class="border p-2 w-full" required>
            <option value="aktif" {{ $siswa->status_aktif == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="non-aktif" {{ $siswa->status_aktif == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
        </select>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('admin.siswa.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
@endsection