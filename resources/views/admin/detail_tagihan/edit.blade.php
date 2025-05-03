@extends('layouts.app')

@section('title', 'Edit Detail Tagihan')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Detail Tagihan</h1>

    <form action="{{ route('admin.detail-tagihan.update', $detail_tagihans->id_detail_tagihan) }}" method="POST">
        @csrf @method('PUT')

        <label class="block mt-2">Tagihan ID:</label>
        <select name="tagihan_id" class="border p-2 w-full" required>
            <option value="">-- PILIH --</option>
            @foreach($tagihans as $tagih)
            <option value="{{ $tagih->id_tagihan }}" {{ $detail_tagihans->tagihan_id == $tagih->id_tagihan ? 'selected' : '' }}>{{ $tagih->id_tagihan }}</option>
            @endforeach
        </select>

        <label class="block mt-2">Tarif Tagihan ID:</label>
        <select name="tarif_tagihan_id" class="border p-2 w-full" required>
            <option value="">-- PILIH --</option>
            @foreach($tarif_tagihans as $tarif)
            <option value="{{ $tarif->id_tarif_tagihan }}" {{ $detail_tagihans->tarif_tagihan_id == $tarif->id_tarif_tagihan ? 'selected' : '' }}>{{ $tarif->id_tarif_tagihan }}</option>
            @endforeach
        </select>

        <label class="block">Jumlah Tagihan:</label>
        <input type="number" name="jumlah_tagihan" class="border p-2 w-full" value="{{ $detail_tagihans->jumlah_tagihan }}" required>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('admin.detail-tagihan.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
@endsection
