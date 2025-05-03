@extends('layouts.app')

@section('title', 'Tambah Jenis Tagihan')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Jenis Tagihan</h1>

    <form action="{{ route('admin.jenis-tagihan.update', $jenis_tagihans->id_jenis_tagihan) }}" method="POST">
        @csrf @method('PUT')
        <label class="block">Jenis Tagihan:</label>
        <input type="text" name="jenis_tagihan" class="border p-2 w-full" value="{{ $jenis_tagihans->jenis_tagihan }}" required>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('admin.jenis-tagihan.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
@endsection
