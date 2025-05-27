@extends('components.sidebar-admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Data Tarif Tagihan</h1>
    <div class="max-w-7xl mx-auto px-6 py-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Data Tarif Tagihan</h1>
            <div class="flex items-center space-x-3">
                <!-- Action Buttons -->
                <div class="flex items-center space-x-2">
                    <!-- Tambah Data -->
                    <a href="{{ route('admin.tarif-tagihan.create') }}"    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium btn-hover flex items-center">
                        Tambah Data                            <i class="fas fa-plus ml-2 text-xs"></i>
                    </a>
            </div>
        </div>
     </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Tagihan</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun Ajaran</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Tarif</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($tarif_tagihans as $tarif)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tarif->jenisTagihan->jenis_tagihan }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tarif->tahunAjaran->tahun_ajaran }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ formatRupiah($tarif->jumlah_tarif) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                    <a href="{{ route('admin.tarif-tagihan.edit', $tarif->id_tarif_tagihan) }}" class="text-blue-500"><i class="fas fa-edit"></i></a> |
                    <form action="{{ route('admin.tarif-tagihan.destroy', $tarif->id_tarif_tagihan) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
