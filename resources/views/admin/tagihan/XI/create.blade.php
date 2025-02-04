<h1>Buat Tagihan Baru</h1>

    <form action="{{ route('xi.store') }}" method="POST">
        @csrf
        <div>
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul_XI" required>
        </div>

        <div>
            <label for="harga">Harga:</label>
            <input type="number" name="harga" id="harga_XI" required>
        </div>

        <div>
            <label for="kelas">Kelas:</label>
            <input type="number" name="kelas" id="kelas_XI" required>
        </div>

        <button type="submit">Submit</button>
</form>
    
