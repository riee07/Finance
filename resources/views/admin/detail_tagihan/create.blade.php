@extends('components.sidebar-admin')

@section('title', 'Tambah Detail Tagihan')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Detail Tagihan</h1>

    <form action="{{ route('admin.detail-tagihan.store') }}" method="POST">
        @csrf

        <label class="block mt-2">Tagihan ID:</label>
        <select name="tagihan_id" class="border p-2 w-full rounded-md" required>
            <option value="">-- PILIH --</option>
            @foreach($tagihans as $tagih)
            <option value="{{ $tagih->id_tagihan }}">{{ $tagih->id_tagihan }}</option>
            @endforeach
        </select>

        <label class="block mt-2">Tarif Tagihan ID:</label>
        <select name="tarif_tagihan_id" class="border p-2 w-full rounded-md" required>
            <option value="">-- PILIH --</option>
            @foreach($tarif_tagihans as $tarif)
            <option value="{{ $tarif->id_tarif_tagihan }}">{{ $tarif->id_tarif_tagihan }}</option>
            @endforeach
        </select>

        <label class="block">Jumlah Tagihan:</label>
        <input type="number" name="jumlah_tagihan" class="border p-2 w-full rounded-md" required>

        <div class="float-right">
            <button type="submit" class="mt-4 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('admin.detail-tagihan.index') }}" class="ml-2 text-gray-600">Batal</a>
        </div>
    </form>
@endsection
