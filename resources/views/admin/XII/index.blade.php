<table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Kelas XII</th>
                <th><a href="{{ route('xii.create') }}" class="bg-gray-500 hover:bg-gray-600 ml-5 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300">Add New Harga</a></th>
            </tr>
            <tr>
                <th>Judul</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($XII as $xii)
                <tr>
                <td>{{ $xii->judul_XII }}</td>
                <td>{{ $xii->harga_XII }}</td>
                <td>
                    <a href="{{ route('xii.edit', $xii->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                    <br>
                    <form action="{{ route('xii.destroy', $xii->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </form>
            </tr>
        @endforeach 
    </tbody>
</table>

<br><br>

<table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>SPP XII</th>
                <th><a href="{{ route('sppxii.create') }}" class="bg-gray-500 hover:bg-gray-600 ml-5 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300">Add New Harga</a></th>
            </tr>
            <tr>
                <th>Judul</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($SPPXII as $sppxii)
                <tr>
                <td>{{ $sppxii->bulan_XII }}</td>
                <td>{{ $sppxii->harga_XII }}</td>
                <td>
                    <a href="{{ route('sppxii.edit', $sppxii->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                    <br><form action="{{ route('sppxii.destroy', $sppxii->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </form>
            </tr>
        @endforeach 
    </tbody>
</table>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<button><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></button>