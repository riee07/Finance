
<form action="{{ route('tagihan.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $admin->nama }}" required>
        </div>

        <div>
            <label for="harga">harga:</label>
            <input type="number" name="harga" id="harga" value="{{ $admin->harga }}" required>
        </div>

        <div>
            <label for="kelas">kelas:</label>
            <input type="text" name="kelas" id="kelas" value="{{ $admin->kelas }}" required>
        </div>

        <button type="submit">Submit</button>
    </form>
