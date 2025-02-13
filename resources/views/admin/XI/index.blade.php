<table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Kelas XI</th>
                <th><a href="{{ route('xi.create') }}" class="bg-gray-500 hover:bg-gray-600 ml-5 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300">Add New Harga</a></th>
            </tr>
            <tr>
                <th>Judul</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($XI as $xi)
                <tr>
                <td>{{ $xi->judul_XI }}</td>
                <td>{{ $xi->harga_XI }}</td>
                <td>
                    <a href="{{ route('xi.edit', $xi->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                    <br><form action="{{ route('xi.destroy', $xi->id) }}" method="POST">
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
                <th>SPP XI</th>
                <th><a href="{{ route('sppxi.create') }}" class="bg-gray-500 hover:bg-gray-600 ml-5 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300">Add New Harga</a></th>
            </tr>
            <tr>
                <th>Judul</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($SPPXI as $sppxi)
                <tr>
                <td>{{ $sppxi->bulan_XI }}</td>
                <td>{{ $sppxi->harga_XI }}</td>
                <td>
                    <a href="{{ route('sppxi.edit', $sppxi->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                    <br><form action="{{ route('sppxi.destroy', $sppxi->id) }}" method="POST">
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