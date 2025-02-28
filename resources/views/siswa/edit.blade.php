@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Siswa</h1>

    <form action="{{ route('siswa.update', $siswa->id_siswa) }}" method="POST">
        @csrf @method('PUT')
        
        <label class="block">Nama:</label>
        <input type="text" name="nama" class="border p-2 w-full" value="{{ $siswa->nama }}" required>

        <label class="block mt-2">Kelas:</label>
        <input type="text" name="kelas" class="border p-2 w-full" value="{{ $siswa->kelas }}" required>

        <label class="block mt-2">Tahun Ajaran:</label>
        <select name="tahun_ajaran_id" class="border p-2 w-full" required>
            @foreach($tahun_ajarans as $tahun)
                <option value="{{ $tahun->id_tahun_ajaran }}" {{ $siswa->tahun_ajaran_id == $tahun->id_tahun_ajaran ? 'selected' : '' }}>{{ $tahun->tahun_ajaran }}</option>
            @endforeach
        </select>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('siswa.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
@endsection
