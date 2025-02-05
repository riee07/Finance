
<form action="{{ route('xi.update', $xi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="judul_XI">judul:</label>
            <input type="text" name="judul_XI" id="judul_XI" value="{{ $xi->judul_XI }}" required>
        </div>

        <div>
            <label for="harga_XI">harga:</label>
            <input type="number" name="harga_XI" id="harga_XI" value="{{ $xi->harga_XI }}" required>
        </div>

        <div>
            <label for="kelas_XI">kelas:</label>
            <input type="text" name="kelas_XI" id="kelas_XI" value="{{ $xi->kelas_XI }}" required>
        </div>

        <button type="submit">Submit</button>
    </form>
