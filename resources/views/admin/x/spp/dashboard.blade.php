<table border="1" cellspacing="0" cellpadding="10">
    <tr>
        <th>Bulan</th>
        <th>Harga</th>
        <th>Aku nak sikit aksi</th>
    </tr>
    @foreach ($sppes as $spp) 
        <tr>
            <td>{{ $spp->bulan }}</td>
            <td>{{ $spp->harga }}</td>
            <td>
                <a href="{{ route('admin.x.spp.edit', $spp->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                    <br>
                <form action="{{ route('admin.x.spp.destroy', $spp->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<button><a href="{{ route('admin.x.spp.create') }}">Tambah Bulan</a></button>

<script>