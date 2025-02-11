
<form action="{{ route('x.update', $x->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="judul">judul:</label>
            <input type="text" name="judul" id="judul" value="{{ $x->judul }}" required>
        </div>

        <div>
            <label for="harga">harga:</label>
            <input type="number" name="harga" id="harga" value="{{ $x->harga }}" required>
        </div>

        <button type="submit">Submit</button>
    </form>
