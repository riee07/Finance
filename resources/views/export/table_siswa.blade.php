<table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">NISN</th>
                <th class="border px-4 py-2">Kelas</th>
                <th class="border px-4 py-2">Jurusan</th>
                <th class="border px-4 py-2">No HP
                <th class="border px-4 py-2">Tahun Ajaran</th>
                <th class="border px-4 py-2">Status Aktif</th>
                @if (!isset($isExport))
                <th class="border px-4 py-2">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($siswas as $data)
            <tr>
                <td class="border px-4 py-2">{{ $data->name }}</td>
                <td class="border px-4 py-2">{{ $data->user->email }}</td>
                <td class="border px-4 py-2">{{ $data->nisn }}</td>
                <td class="border px-4 py-2">{{ $data->kelas }}</td>
                <td class="border px-4 py-2">{{ $data->jurusan }}</td>
                <td class="border px-4 py-2">{{ $data->no_hp }}</td>
                <td class="border px-4 py-2">{{ $data->tahunAjaran->tahun_ajaran ?? 'Tidak Ada' }}</td>
                <td class="border px-4 py-2">{{ $data->status_aktif }}</td>
                @if (!isset($isExport))
                <td class="border px-4 py-2">
                    <a href="{{ route('admin.siswa.edit', $data->id_siswa) }}" class="text-blue-500">Edit</a> |
                    <form action="{{ route('admin.siswa.destroy', $data->id_siswa) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>