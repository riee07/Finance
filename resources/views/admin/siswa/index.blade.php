@extends('components.sidebar-admin')

@section('admin-sidebar')
    <h1 class="text-2xl font-bold mb-4">Data Siswa</h1>

    <a href="{{ route('admin.siswa.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Siswa</a>

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Kelas</th>
                <th class="border px-4 py-2">Tahun Ajaran</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswas as $data)
            <tr>
                <td class="border px-4 py-2">{{ $data->nama }}</td>
                <td class="border px-4 py-2">{{ $data->kelas }}</td>
                <td class="border px-4 py-2">{{ $data->tahunAjaran->tahun_ajaran ?? 'Tidak Ada' }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('admin.siswa.edit', $data->id_siswa) }}" class="text-blue-500">Edit</a> |
                    <form action="{{ route('admin.siswa.destroy', $data->id_siswa) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
