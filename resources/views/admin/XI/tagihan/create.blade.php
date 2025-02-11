<h1>Buat Tagihan Baru</h1>

    <form action="{{ route('xi.store') }}" method="POST">
        @csrf
        <div>
            <label for="judul_XI">Judul:</label>
            <input type="text" name="judul_XI" id="judul_XI" required>
        </div>

        <div>
            <label for="harga">Harga:</label>
            <input type="number" name="harga_XI" id="harga_XI" required>
        </div>


        <button type="submit">Submit</button>
</form>
    
