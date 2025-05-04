@extends('layouts.navigation')

@section('title', 'Tambah Siswa')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Siswa</h1>

    <form action="{{ route('admin.siswa.store') }}" method="POST">
        @csrf
        <label class="block">Nama:</label>
        <input type="text" name="nama" class="border p-2 w-full" required>

        <label class="block mt-2">NIS:</label>
        <input type="text" name="nis" class="border p-2 w-full" required>

        <label class="block mt-2">Kelas:</label>
        <input type="text" name="kelas" class="border p-2 w-full" required>

        <label class="block mt-2">Tahun Ajaran:</label>
        <select name="tahun_ajaran_id" class="border p-2 w-full" required>
            <option value="">-- PILIH --</option>
            @foreach($tahun_ajarans as $tahun)
            <option value="{{ $tahun->id_tahun_ajaran }}">{{ $tahun->tahun_ajaran }}</option>
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
