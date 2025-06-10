<table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NISN</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jurusan</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No HP
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun Ajaran</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Aktif</th>
                @if (!isset($isExport))
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($siswas as $data)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $data->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $data->user->email }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $data->nisn }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $data->kelas }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $data->jurusan }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $data->no_hp }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $data->tahunAjaran->tahun_ajaran ?? 'Tidak Ada' }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $data->status_aktif }}</td>
                @if (!isset($isExport))
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                    <a href="{{ route('admin.siswa.edit', $data->id_siswa) }}" class="text-blue-500"><i class="fas fa-edit"></i></a> |
                    <form action="{{ route('admin.siswa.destroy', $data->id_siswa) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>