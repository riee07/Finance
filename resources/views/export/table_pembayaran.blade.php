<table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Pembayaran</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tagihan ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pembayaran</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Pembayaran</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Metode Pembayaran</th>
                @if (!isset($isExport))
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($pembayarans as $pembayar)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $pembayar->id_pembayaran }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $pembayar->tagihan_id }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $pembayar->tanggal_pembayaran }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $pembayar->jumlah_pembayaran }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $pembayar->metode_pembayaran }}</td>
                @if (!isset($isExport))
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                    <a href="{{ route('admin.pembayaran.edit', $pembayar->id_pembayaran) }}" class="text-blue-500"><i class="fas fa-edit"></i><</a>
                    <form action="{{ route('admin.pembayaran.destroy', $pembayar->id_pembayaran) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>