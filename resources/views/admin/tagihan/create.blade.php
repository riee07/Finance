@extends('layouts.app')

@section('title', 'Tambah Tagihan')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Tagihan</h1>

    <form action="{{ route('admin.tagihan.store') }}" method="POST">
        @csrf

        <label class="block mt-2">Siswa:</label>
        <select name="siswa_id" class="border p-2 w-full" required>
            <option value="">-- PILIH --</option>
            @foreach($siswas as $siswa)
            <option value="{{ $siswa->id_siswa }}">{{ $siswa->nama }}</option>
            @endforeach
        </select>

        <label class="block mt-2">Tahun Ajaran:</label>
        <select name="tahun_ajaran_id" class="border p-2 w-full" required>
            <option value="">-- PILIH --</option>
            @foreach($tahun_ajarans as $tahun)
            <option value="{{ $tahun->id_tahun_ajaran }}">{{ $tahun->tahun_ajaran }}</option>
            @endforeach
        </select>

        <label class="block">Total Tagihan:</label>
        <input type="number" name="total_tagihan" class="border p-2 w-full" required>

        <label class="block">Status Pembayaran:</label>
        <select name="status_pembayaran" class="border p-2 w-full">
            <option value="">-- PILIH --</option>
            <option value="belum_lunas">Belum Lunas</option>
            <option value="lunas"> Lunas</option>
        </select>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('admin.tagihan.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
@endsection
