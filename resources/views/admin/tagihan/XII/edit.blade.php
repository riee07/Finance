
<form action="{{ route('xii.update', $xii->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="judul_xii">judul:</label>
            <input type="text" name="judul_xii" id="judul_XII" value="{{ $xii->judul_XII }}" required>
        </div>

        <div>
            <label for="harga_xii">harga:</label>
            <input type="number" name="harga_xii" id="harga_XII" value="{{ $xii->harga_XII }}" required>
        </div>

        <div>
            <label for="kelas_xii">kelas:</label>
            <input type="text" name="kelas_xii" id="kelas_XII" value="{{ $xii->kelas_XII }}" required>
        </div>

        <button type="submit">Submit</button>
    </form>
