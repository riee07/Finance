@extends('layouts.navigation')

@section('title', 'Data Detail Tagihan')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Data Detail Tagihan</h1>

    <a href="{{ route('admin.detail-tagihan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Detail Tagihan</a>

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID Detail Tagihan</th>
                <th class="border px-4 py-2">Tagihan ID</th>
                <th class="border px-4 py-2">Tarif Tagihan ID</th>
                <th class="border px-4 py-2">Jumlah Tagihan</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detail_tagihans as $detail)
            <tr>
                <td class="border px-4 py-2">{{ $detail->id_detail_tagihan }}</td>
                <td class="border px-4 py-2">{{ $detail->tagihan_id }}</td>
                <td class="border px-4 py-2">{{ $detail->tarif_tagihan_id }}</td>
                <td class="border px-4 py-2">{{ $detail->jumlah_tagihan }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('admin.detail-tagihan.edit', $detail->id_detail_tagihan) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('admin.detail-tagihan.destroy', $detail->id_detail_tagihan) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
