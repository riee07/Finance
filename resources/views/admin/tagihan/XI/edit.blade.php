
<form action="{{ route('admin.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="judul">judul:</label>
            <input type="text" name="judul" id="judul_XI" value="{{ $admin->judul_XI }}" required>
        </div>

        <div>
            <label for="harga">harga:</label>
            <input type="number" name="harga" id="harga_XI" value="{{ $admin->harga_XI }}" required>
        </div>

        <div>
            <label for="kelas">kelas:</label>
            <input type="text" name="kelas" id="kelas_XI" value="{{ $admin->kelas_XI }}" required>
        </div>

        <button type="submit">Submit</button>
    </form>
