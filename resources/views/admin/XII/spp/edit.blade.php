
<form action="{{ route('sppxii.update', $sppxii->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="bulan_XII">Bulan:</label>
            <input type="text" name="bulan_XII" id="bulan_XII" value="{{ $sppxii->bulan_XII }}" required>
        </div>

        <div>
            <label for="harga_XII">harga:</label>
            <input type="number" name="harga_XII" id="harga_XII" value="{{ $sppxii->harga_XII }}" required>
        </div>

        <button type="submit">Submit</button>
    </form>
