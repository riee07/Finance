@extends('components.sidebar-admin')

@section('admin-sidebar')
    <h1 class="text-2xl font-bold mb-4">Data Tagihan</h1>
<div class="max-w-7xl mx-auto px-6 py-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Data Siswa</h1>
            <div class="flex items-center space-x-3">
                <!-- Action Buttons -->
                <div class="flex items-center space-x-2">
                    <!-- Tambah Data -->
                    <a href="{{ route('admin.tagihan.create') }}"    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium btn-hover flex items-center">
                        Tambah Data                            <i class="fas fa-plus ml-2 text-xs"></i>
                    </a>
            </div>
        </div>
     </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Tagihan</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Siswa</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun Ajaran</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Tagihan</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Pembayaran</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tagihans as $tagih)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tagih->id_tagihan }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tagih->siswa->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tagih->tahunAjaran->tahun_ajaran }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ formatRupiah($tagih->total_tagihan) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tagih->status_pembayaran }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                    <a href="{{ route('admin.tagihan.edit', $tagih->id_tagihan) }}" class="text-blue-500"><i class="fas fa-edit"></i></a> |
                    <form action="{{ route('admin.tagihan.destroy', $tagih->id_tagihan) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
