@extends('layouts.navigation')

@section('title', 'Edit Tagihan')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Tagihan</h1>

    <form action="{{ route('admin.tagihan.update', $tagihans->id_tagihan) }}" method="POST">
        @csrf @method('PUT')

        <label class="block mt-2">Siswa ID:</label>
        <select name="siswa_id" class="border p-2 w-full" required>
            <option value="">-- PILIH --</option>
            @foreach($siswas as $siswa)
            <option value="{{ $siswa->id_siswa }}" {{ $tagihans->siswa_id == $siswa->id_siswa ? 'selected' : '' }}>{{ $siswa->name }}</option>
            @endforeach
        </select>

        <label class="block mt-2">Tahun Ajaran ID:</label>
        <select name="tahun_ajaran_id" class="border p-2 w-full" required>
            <option value="">-- PILIH --</option>
            @foreach($tahun_ajarans as $tahun)
            <option value="{{ $tahun->id_tahun_ajaran }}" {{ $tagihans->tahun_ajaran_id == $tahun->id_tahun_ajaran ? 'selected' : '' }}>{{ $tahun->tahun_ajaran }}</option>
            @endforeach
        </select>

        <label class="block">Total Tagihan:</label>
        <input type="number" name="total_tagihan" class="border p-2 w-full" value="{{$tagihans->total_tagihan}}" required>

        <label class="block">Status Pembayaran:</label>
        <select name="status_pembayaran" class="border p-2 w-full">
            <option value="">-- PILIH --</option>
            <option value="belum_lunas" {{ $tagihans->status_pembayaran == 'belum_lunas' ? 'selected' : '' }}>Belum Lunas</option>
            <option value="lunas" {{ $tagihans->status_pembayaran == 'lunas' ? 'selected' : '' }}>Lunas</option>
        </select>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('admin.tagihan.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
@endsection
