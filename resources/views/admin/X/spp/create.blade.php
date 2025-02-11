<h1>Buat Tagihan Baru</h1>

    <form action="{{ route('sppx.store') }}" method="POST">
        @csrf
        <div>
            <label for="bulan">Bulan:</label>
            <input type="text" name="bulan" id="bulan" required>
        </div>

        <div>
            <label for="harga">Harga:</label>
            <input type="number" name="harga" id="harga" required>
        </div>


        <button type="submit">Submit</button>
</form>
    
