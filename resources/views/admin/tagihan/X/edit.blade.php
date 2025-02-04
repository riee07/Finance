
<form action="{{ route('admin.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="judul">judul:</label>
            <input type="text" name="judul" id="judul" value="{{ $admin->judul }}" required>
        </div>

        <div>
            <label for="harga">harga:</label>
            <input type="number" name="harga" id="harga" value="{{ $admin->harga }}" required>
        </div>

        <div>
            <label for="kelas">kelas:</label>
            <input type="text" name="kelas" id="kelas" value="{{ $admin->kelas }}" required>
        </div>

        <button type="submit">Submit</button>
    </form>
