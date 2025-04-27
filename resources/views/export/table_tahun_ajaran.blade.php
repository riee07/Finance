<table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Tahun Ajaran</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tahun_ajarans as $tahun)
            <tr>
                <td class="border px-4 py-2">{{ $tahun->tahun_ajaran }}</td>
                <td class="border px-4 py-2">{{ $tahun->status }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('tahun-ajaran.edit', $tahun->id_tahun_ajaran) }}" class="text-blue-500">Edit</a> |
                    <form action="{{ route('tahun-ajaran.destroy', $tahun->id_tahun_ajaran) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>