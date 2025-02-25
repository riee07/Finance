@extends('layouts.app')

@section('title', 'Edit Tahun Ajaran')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Tahun Ajaran</h1>

    <form action="{{ route('tahun-ajaran.update', $tahun_ajarans->id_tahun_ajaran) }}" method="POST">
        @csrf @method('PUT')

        <label class="block">Tahun Ajaran:</label>
        <input type="text" name="tahun_ajaran" class="border p-2 w-full" value="{{ $tahun_ajarans->tahun_ajaran }}" required>

        <label class="block mt-2">Status:</label>
        <select name="status" class="border p-2 w-full" required>
            <option value="aktif" {{ $tahun_ajarans->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="non-aktif" {{ $tahun_ajarans->status == 'non-aktif' ? 'selected' : '' }}>Nonaktif</option>
        </select>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('tahun-ajaran.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
@endsection
