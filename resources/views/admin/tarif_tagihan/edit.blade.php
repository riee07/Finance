@extends('components.sidebar-admin')

@section('title', 'Tambah Tarif Tagihan')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Tarif Tagihan</h1>

    <form action="{{ route('admin.tarif-tagihan.update', $tarif_tagihans->id_tarif_tagihan) }}" method="POST">
        @csrf @method('PUT')

        <label class="block mt-2">Jenis Tagihan:</label>
        <select name="jenis_tagihan_id" class="border p-2 w-full rounded-md" required>
            <option value="">-- PILIH --</option>
            @foreach($jenis_tagihans as $jenis)
            <option value="{{ $jenis->id_jenis_tagihan }}" {{ $tarif_tagihans->jenis_tagihan_id == $jenis->id_jenis_tagihan ? 'selected' : '' }}>{{ $jenis->jenis_tagihan }}</option>
            @endforeach
        </select>

        <label class="block mt-2">Tahun Ajaran:</label>
        <select name="tahun_ajaran_id" class="border p-2 w-full rounded-md" required>
            <option value="">-- PILIH --</option>
            @foreach($tahun_ajarans as $tahun)
            <option value="{{ $tahun->id_tahun_ajaran }}" {{ $tarif_tagihans->tahun_ajaran_id == $tahun->id_tahun_ajaran ? 'selected' : '' }}>{{ $tahun->tahun_ajaran }}</option>
            @endforeach
        </select>

        <label class="block">Jumlah Tarif:</label>
        <!-- Input tampilan user -->
        <input type="text" id="jumlah_tarif_display" value="{{ formatRupiah($tarif_tagihans->jumlah_tarif) }}" class="border p-2 w-full rounded-md" required>

        <!-- Hidden input untuk dikirim ke server -->
        <input type="hidden" name="jumlah_tarif" id="jumlah_tarif">

        <div class="float-right">
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('admin.tarif-tagihan.index') }}" class="ml-2 text-gray-600">Batal</a>
        </div>
    </form>

    <script>
        document.getElementById('jumlah_tarif_display').addEventListener('input', function (e) {
            let value = e.target.value.replace(/[^,\d]/g, '');
            if (!value) {
                e.target.value = '';
                document.getElementById('jumlah_tarif').value = '';
                return;
            }

            const numberString = value.toString();
            const split = numberString.split(',');
            let sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            const ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                const separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            const formatted = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            e.target.value = 'Rp. ' + formatted;

            // Kirim nilai bersih ke hidden input
            const angkaBersih = value.replace(/\./g, '');
            document.getElementById('jumlah_tarif').value = angkaBersih;
        });
    </script>

@endsection
