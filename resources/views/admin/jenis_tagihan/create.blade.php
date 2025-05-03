@extends('layouts.app')

@section('title', 'Tambah Jenis Tagihan')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Jenis Tagihan</h1>

    <form action="{{ route('admin.jenis-tagihan.store') }}" method="POST">
        @csrf
        <label class="block">Jenis Tagihan:</label>
        <input type="text" name="jenis_tagihan" class="border p-2 w-full" required>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('admin.jenis-tagihan.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
@endsection
