@extends('layouts.app')

@section('title', 'Tambah Tarif Tagihan')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Tarif Tagihan</h1>

    <form action="{{ route('admin.tarif-tagihan.store') }}" method="POST">
        @csrf

        <label class="block mt-2">Jenis Tagihan:</label>
        <select name="jenis_tagihan_id" class="border p-2 w-full" required>
            <option value="">-- PILIH --</option>
            @foreach($jenis_tagihans as $jenis)
            <option value="{{ $jenis->id_jenis_tagihan }}">{{ $jenis->jenis_tagihan }}</option>
            @endforeach
        </select>

        <label class="block mt-2">Tahun Ajaran:</label>
        <select name="tahun_ajaran_id" class="border p-2 w-full" required>
            <option value="">-- PILIH --</option>
            @foreach($tahun_ajarans as $tahun)
            <option value="{{ $tahun->id_tahun_ajaran }}">{{ $tahun->tahun_ajaran }}</option>
            @endforeach
        </select>

        <label class="block">Jumlah Tarif:</label>
        <input type="text" name="jumlah_tarif" class="border p-2 w-full" required>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('admin.tarif-tagihan.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
@endsection
