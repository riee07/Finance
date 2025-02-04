
<form action="{{ route('xi.update', $xi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="judul">judul:</label>
            <input type="text" name="judul" id="judul_XI" value="{{ $xi->judul_XI }}" required>
        </div>

        <div>
            <label for="harga">harga:</label>
            <input type="number" name="harga" id="harga_XI" value="{{ $xi->harga_XI }}" required>
        </div>

        <div>
            <label for="kelas">kelas:</label>
            <input type="text" name="kelas" id="kelas_XI" value="{{ $xi->kelas_XI }}" required>
        </div>

        <button type="submit">Submit</button>
    </form>
