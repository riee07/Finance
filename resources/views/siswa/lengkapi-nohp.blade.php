<div class="max-w-md mx-auto mt-10">
    <h2 class="text-xl font-bold mb-4">Lengkapi Nomor HP</h2>

    <form method="POST" action="{{ route('siswa.lengkapi.nohp.submit') }}">
        @csrf

        <div class="mb-4">
            <label for="no_hp" class="block text-sm font-medium text-gray-700">Nomor HP</label>
            <input type="text" name="no_hp" id="no_hp" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @error('no_hp')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Simpan</button>
    </form>
</div>