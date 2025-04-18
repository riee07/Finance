Buat SPP baru untuk kelas 10

<form method="POST" action="{{ route('admin.x.spp.store') }}">
    @csrf
    <div>
        <label for="bulan">Bulan:</label>
        <select name="bulan" id="bulan" required>
            <option value="Januari">Januari</option>
            <option value="Februari">Februari</option>
            <option value="Maret">Maret</option>
            <option value="April">April</option>
            <option value="Mei">Mei</option>
            <option value="Juni">Juni</option>
            <option value="Juli">Juli</option>
            <option value="Agustus">Agustus</option>
            <option value="September">September</option>
            <option value="Oktober">Oktober</option>
            <option value="November">November</option>
            <option value="Desember">Desember</option>
        </select>
    </div>
    <div>
        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga" required>
    </div>
    <div>
        <button type="submit">submit</button>
    </div>
</form>