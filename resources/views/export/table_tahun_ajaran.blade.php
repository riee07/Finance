<table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun Ajaran</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                @if (!isset($isExport))
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($tahun_ajarans as $tahun)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tahun->tahun_ajaran }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tahun->status }}</td>
                @if (!isset($isExport))
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                    <a href="{{ route('admin.tahun-ajaran.edit', $tahun->id_tahun_ajaran) }}" class="text-blue-500"><i class="fas fa-edit"></i></a> |
                    <form action="{{ route('admin.tahun-ajaran.destroy', $tahun->id_tahun_ajaran) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>