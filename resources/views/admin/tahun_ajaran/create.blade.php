@extends('components.sidebar-admin')

@section('title', 'Tambah Tahun Ajaran')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Tahun Ajaran</h1>

    <form action="{{ route('admin.tahun-ajaran.store') }}" method="POST">
        @csrf
        <label class="block">Tahun Ajaran:</label>
        <input type="text" name="tahun_ajaran" class="border p-2 w-full rounded-md" required>

        <label class="block mt-2">Status:</label>
        <select name="status" class="border p-2 w-full rounded-md" required>
            <option value="aktif">Aktif</option>
            <option value="non-aktif">Non-aktif</option>
        </select>

        <div class="float-right">
            <button type="submit" class="mt-4 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('admin.tahun-ajaran.index') }}" class="ml-2 text-gray-600">Batal</a>
        </div>
    </form>
@endsection
