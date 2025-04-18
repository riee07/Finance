
<form action="{{ route('sppx.update', $sppx->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="bulan">judul:</label>
            <input type="text" name="bulan" id="bulan" value="{{ $sppx->bulan }}" required>
        </div>

        <div>
            <label for="harga">harga:</label>
            <input type="number" name="harga" id="harga" value="{{ $sppx->harga }}" required>
        </div>

        <button type="submit">Submit</button>
    </form>
