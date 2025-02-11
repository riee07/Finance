<h1>Buat Tagihan Baru</h1>

    <form action="{{ route('xii.store') }}" method="POST">
        @csrf
        <div>
            <label for="judul_XII">Judul:</label>
            <input type="text" name="judul_XII" id="judul_XII" required>
        </div>

        <div>
            <label for="harga_XII">Harga:</label>
            <input type="number" name="harga_XII" id="harga_XII" required>
        </div>

        <button type="submit">Submit</button>
</form>
    
