@extends('layouts.navigation')

@section('title', 'Edit Pembayaran')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Pembayaran</h1>

    <form action="{{ route('admin.pembayaran.update', $pembayarans->id_pembayaran) }}" method="POST">
        @csrf @method('PUT')

        <label class="block mt-2">Tagihan ID:</label>
        <select name="tagihan_id" class="border p-2 w-full rounded-md" required>
            <option value="">-- PILIH --</option>
            @foreach($tagihans as $tagih)
            <option value="{{ $tagih->id_tagihan }}" {{ $pembayarans->tagihan_id == $tagih->id_tagihan ? 'selected' : '' }}>{{ $tagih->id_tagihan }}</option>
            @endforeach
        </select>

        <label class="block mt-2">Tanggal Pembayaran:</label>
        <input type="date" name="tanggal_pembayaran" class="border p-2 w-full rounded-md" value="{{ $pembayarans->tanggal_pembayaran }}" required>

        <label class="block">Jumlah Pembayaran:</label>
        <input type="number" name="jumlah_pembayaran" class="border p-2 w-full rounded-md" value="{{ $pembayarans->jumlah_pembayaran }}" required>

        <label class="block">Metode Pembayaran:</label>
        <select name="metode_pembayaran" class="border p-2 w-full rounded-md" required>
            <option value="">-- PILIH --</option>
            <option value="Transfer" {{ $pembayarans->metode_pembayaran == 'Transfer' ? 'selected' : '' }}>Transfer</option>
            <option value="Tunai" {{ $pembayarans->metode_pembayaran == 'Tunai' ? 'selected' : '' }} >Tunai</option>
        </select>

        <div class="float-right">
            <button type="submit" class="mt-4 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('admin.pembayaran.index') }}" class="ml-2 text-gray-600">Batal</a>
        </div>
    </form>
@endsection
