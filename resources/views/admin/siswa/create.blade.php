@extends('layouts.navigation')

@section('title', 'Tambah Siswa')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Siswa</h1>

    <form action="{{ route('admin.siswa.store') }}" method="POST">
        @csrf
        <label class="block">Name:</label>
        <input type="text" name="name" class="border p-2 w-full" required>

        <label class="block">Email:</label>
        <input type="email" name="email" value="{{ old('email', $email ?? '') }}" readonly>
        <small class="text-gray-500">*Email ini otomatis ter-generate</small>

        <label class="block">Password:</label>
        <input type="text" name="password" value="{{ old('password', $password ?? '') }}" readonly>
        <small class="text-gray-500">*Password ini otomatis ter-generate</small>

        <label class="block mt-2">NISN:</label>
        <input type="text" name="nisn" class="border p-2 w-full" required>

        <label class="block mt-2">Kelas:</label>
        <select name="kelas" class="border p-2 w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
            <option value="x" {{ old('kelas') == 'x' ? 'selected' : '' }}>Kelas X</option>
        <option value="xi" {{ old('kelas') == 'xi' ? 'selected' : '' }}>Kelas XI</option>
        <option value="xii" {{ old('kelas') == 'xii' ? 'selected' : '' }}>Kelas XII</option>
        </select>

        <label class="block mt-2">Jurusan:</label>
        <select name="jurusan" class="border p-2 w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="">Pilih Jurusan</option>
            <option value="pplg" {{ old('jurusan') == 'pplg' ? 'selected' : '' }}>PPLG</option>
            <option value="tkj" {{ old('jurusan') == 'tkj' ? 'selected' : '' }}>TKJ</option>
            <option value="an" {{ old('jurusan') == 'an' ? 'selected' : '' }}>AN</option>
            <option value="dpb" {{ old('jurusan') == 'dpb' ? 'selected' : '' }}>DPB</option>
            <option value="mp" {{ old('jurusan') == 'mp' ? 'selected' : '' }}>MP</option>
            <option value="br" {{ old('jurusan') == 'br' ? 'selected' : '' }}>BR</option>
            <option value="ak" {{ old('jurusan') == 'ak' ? 'selected' : '' }}>AK</option>
            <option value="lps" {{ old('jurusan') == 'lps' ? 'selected' : '' }}>LPS</option>
            <option value="dkv" {{ old('jurusan') == 'dkv' ? 'selected' : '' }}>DKV</option>
        </select>

        <label class="block mt-2">No HP:</label>
        <input type="text" name="no_hp" class="border p-2 w-full" required>

        <label class="block mt-2">Tahun Ajaran ID:</label>
        <select name="tahun_ajaran_id" class="border p-2 w-full" required>
            <option value="">-- PILIH --</option>
            @foreach($siswas as $siswa)
            <option value="{{ $siswa->tahunAjaran->tahun_ajaran }}">{{ $siswa->tahunAjaran->tahun_ajaran }}</option>
            @endforeach
        </select>
        
        <label class="block mt-2">Status Siswa:</label>
        <select name="status_aktif" class="border p-2 w-full" required>
                <option value="">-- PILIH --</option>
                <option value="aktif">Aktif</option>
                <option value="non-aktif">Nonaktif</option>
        </select>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('admin.siswa.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
@endsection

{{-- 

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Siswa</h2>
    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama" class="form-control" required>

        <label>NIS:</label>
        <input type="text" name="nis" class="form-control" required>

        <label>Kelas:</label>
        <input type="text" name="kelas" class="form-control" required>

        <label>Tahun Ajaran:</label>
        <select name="tahun_ajaran_id" class="form-control">
            @foreach($tahun_ajarans as $tahun)
                <option value="{{ $tahun->id_tahun_ajaran }}">{{ $tahun->tahun_ajaran }}</option>
            @endforeach
        </select>

        <label>Status:</label>
        <select name="status_aktif" class="form-control">
            <option value="aktif">Aktif</option>
            <option value="non-aktif">Non-Aktif</option>
        </select>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
</div>
@endsection


--}}
