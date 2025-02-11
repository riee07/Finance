<h1>Buat Tagihan Baru</h1>

    <form action="{{ route('sppxi.store') }}" method="POST">
        @csrf
        <div>
            <label for="bulan_XI">Bulan:</label>
            <input type="text" name="bulan_XI" id="bulan_XI" required>
        </div>

        <div>
            <label for="harga_XI">Harga:</label>
            <input type="number" name="harga_XI" id="harga_XI" required>
        </div>


        <button type="submit">Submit</button>
</form>
    
