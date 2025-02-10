<table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Kelas X</th>
                <th><a href="{{ route('x.create') }}" class="bg-gray-500 hover:bg-gray-600 ml-5 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300">Add New Harga</a></th>
            </tr>
            <tr>
                <th>Judul</th>
                <th>Harga</th>
                <th>Kelas</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($X as $x)
                <tr>
                <td>{{ $x->judul }}</td>
                <td>{{ $x->harga }}</td>
                <td>{{ $x->kelas }}</td>
                <td>
                    <a href="{{ route('x.edit', $x->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                    <br><form action="{{ route('x.destroy', $x->id) }}" method="POST">
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