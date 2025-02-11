<h1>Buat Tagihan Baru</h1>

    <form action="{{ route('x.store') }}" method="POST">
        @csrf
        <div>
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" required>
        </div>

        <div>
            <label for="harga">Harga:</label>
            <input type="number" name="harga" id="harga" required>
        </div>


        <button type="submit">Submit</button>
</form>
    
