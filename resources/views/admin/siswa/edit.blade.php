@extends('layouts.navigation')

@section('title', 'Tambah Siswa')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Siswa</h1>

    <form action="{{ route('admin.siswa.update', $siswa->id_siswa) }}" method="POST">
        @csrf
        @method('PUT')
        <label class="block">Nama:</label>
        <input type="text" name="nama" class="border p-2 w-full" value="{{ $siswa->name }}" required>

        <label class="block mt-2">NIS:</label>
        <input type="text" name="nis" class="border p-2 w-full" value="{{ $siswa->nis }}" required>

        <label class="block mt-2">Kelas:</label>
        <input type="text" name="kelas" class="border p-2 w-full" value="{{ $siswa->kelas }}" required>

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