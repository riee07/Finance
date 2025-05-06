@extends('components.sidebar-admin')

@section('admin-sidebar')
    <h1 class="text-2xl font-bold mb-4">Data Tarif Tagihan</h1>

    <a href="{{ route('admin.tarif-tagihan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Tarif Tagihan</a>

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Jenis Tagihan</th>
                <th class="border px-4 py-2">Tahun Ajaran</th>
                <th class="border px-4 py-2">Jumlah Tarif</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tarif_tagihans as $tarif)
            <tr>
                <td class="border px-4 py-2">{{ $tarif->jenisTagihan->jenis_tagihan }}</td>
                <td class="border px-4 py-2">{{ $tarif->tahunAjaran->tahun_ajaran }}</td>
                <td class="border px-4 py-2">{{ formatRupiah($tarif->jumlah_tarif) }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('admin.tarif-tagihan.edit', $tarif->id_tarif_tagihan) }}" class="text-blue-500">Edit</a> |
                    <form action="{{ route('admin.tarif-tagihan.destroy', $tarif->id_tarif_tagihan) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
