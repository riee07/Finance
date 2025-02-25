@extends('layouts.app')

@section('title', 'Data Jenis Tagihan')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Data Jenis Tagihan</h1>

    <a href="{{ route('jenis-tagihan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Jenis Tagihan</a>

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Nama Tagihan</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jenis_tagihans as $jenis)
            <tr>
                <td class="border px-4 py-2">{{ $jenis->jenis_tagihan }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('jenis-tagihan.edit', $jenis->id_jenis_tagihan) }}" class="text-blue-500">Edit</a> |
                    <form action="{{ route('jenis-tagihan.destroy', $jenis->id_jenis_tagihan) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
