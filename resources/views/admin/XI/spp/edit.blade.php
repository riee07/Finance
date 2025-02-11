
<form action="{{ route('sppxi.update', $sppxi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="bulan_XI">Bulan:</label>
            <input type="text" name="bulan_XI" id="bulan_XI" value="{{ $sppxi->bulan_XI }}" required>
        </div>

        <div>
            <label for="harga_XI">harga:</label>
            <input type="number" name="harga_XI" id="harga_XI" value="{{ $sppxi->harga_XI }}" required>
        </div>

        <button type="submit">Submit</button>
    </form>
