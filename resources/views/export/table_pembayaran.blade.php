<table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID Pembayaran</th>
                <th class="border px-4 py-2">Tagihan ID</th>
                <th class="border px-4 py-2">Tanggal Pembayaran</th>
                <th class="border px-4 py-2">Jumlah Pembayaran</th>
                <th class="border px-4 py-2">Metode Pembayaran</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembayarans as $pembayar)
            <tr>
                <td class="border px-4 py-2">{{ $pembayar->id_pembayaran }}</td>
                <td class="border px-4 py-2">{{ $pembayar->tagihan_id }}</td>
                <td class="border px-4 py-2">{{ $pembayar->tanggal_pembayaran }}</td>
                <td class="border px-4 py-2">{{ $pembayar->jumlah_pembayaran }}</td>
                <td class="border px-4 py-2">{{ $pembayar->metode_pembayaran }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('pembayaran.edit', $pembayar->id_pembayaran) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('pembayaran.destroy', $pembayar->id_pembayaran) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>