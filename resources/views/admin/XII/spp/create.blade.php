<h1>Buat Tagihan Baru</h1>

    <form action="{{ route('sppxii.store') }}" method="POST">
        @csrf
        <div>
            <label for="bulan_XII">Bulan:</label>
            <input type="text" name="bulan_XII" id="bulan_XII" required>
        </div>

        <div>
            <label for="harga">Harga:</label>
            <input type="number" name="harga_XII" id="harga_XII" required>
        </div>


        <button type="submit">Submit</button>
</form>
    
