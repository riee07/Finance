<h1>Welcome, Admin</h1>

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <x-responsive-nav-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-responsive-nav-link>
</form>


<a href="{{ route('admin.create') }}" class="bg-gray-500 hover:bg-gray-600 ml-5 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300">Add New Harga</a>

@if ($message = Session::get('success'))
    <div>{{ $message }}</div>
@endif
<br><br>
<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admins as $admin)
            <tr>
                <td>{{ $admin->nama }}</td>
                <td>{{ $admin->harga }}</td>
                <td>
                <a href="{{ route('admin.index', ['id' => $admin->id]) }}">View</a>
                    <a href="{{ route('admin.admins.edit', ['id' => $admin->id]) }}">Edit</a>
                    <form action="{{ route('admin.admins.destroy', ['id' => $admin->id]) }}" method="POST" style="display:inline;">                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
