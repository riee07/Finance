@extends('layouts.app')

@section('title', 'Data Tagihan')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Data Tagihan</h1>

    <a href="{{ route('tagihan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Tagihan</a>

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID Tagihan</th>
                <th class="border px-4 py-2">Siswa</th>
                <th class="border px-4 py-2">Tahun Ajaran</th>
                <th class="border px-4 py-2">Total Tagihan</th>
                <th class="border px-4 py-2">Status Pembayaran</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tagihans as $tagih)
            <tr>
                <td class="border px-4 py-2">{{ $tagih->id_tagihan }}</td>
                <td class="border px-4 py-2">{{ $tagih->siswa->nama }}</td>
                <td class="border px-4 py-2">{{ $tagih->tahunAjaran->tahun_ajaran }}</td>
                <td class="border px-4 py-2">{{ $tagih->total_tagihan }}</td>
                <td class="border px-4 py-2">{{ $tagih->status_pembayaran }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('tagihan.edit', $tagih->id_tagihan) }}" class="text-blue-500">Edit</a> |
                    <form action="{{ route('tagihan.destroy', $tagih->id_tagihan) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
