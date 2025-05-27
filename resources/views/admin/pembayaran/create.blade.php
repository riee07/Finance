@extends('components.sidebar-admin')

@section('title', 'Tambah Pembayaran')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Pembayaran</h1>

    <form action="{{ route('admin.pembayaran.store') }}" method="POST">
        @csrf

        <label class="block mt-2">Tagihan ID:</label>
        <select name="tagihan_id" class="border p-2 w-full rounded-md" required>
            <option value="">-- PILIH --</option>
            @foreach($tagihans as $tagih)
            <option value="{{ $tagih->id_tagihan }}">{{ $tagih->id_tagihan }}</option>
            @endforeach
        </select>

        <label class="block mt-2">Tanggal Pembayaran:</label>
        <input type="date" name="tanggal_pembayaran" class="border p-2 w-full rounded-md" required>

        <label class="block">Jumlah Pembayaran:</label>
        <input type="number" name="jumlah_pembayaran" class="border p-2 w-full rounded-md" required>

        <label class="block">Metode Pembayaran:</label>
        <select name="metode_pembayaran" class="border p-2 w-full rounded-md" required>
            <option value="">-- PILIH --</option>
            <option value="Transfer">Transfer</option>
            <option value="Tunai">Tunai</option>
        </select>

        <div class="float-right">
            <button type="submit" class="mt-4 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('admin.pembayaran.index') }}" class="ml-2 text-gray-600">Batal</a>
        </div>
    </form>
@endsection
