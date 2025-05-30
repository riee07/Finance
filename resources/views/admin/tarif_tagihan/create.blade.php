@extends('components.sidebar-admin')

@section('title', 'Tambah Tarif Tagihan')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Tarif Tagihan</h1>

    <form action="{{ route('admin.tarif-tagihan.store') }}" method="POST">
        @csrf

        <label class="block mt-2">Jenis Tagihan:</label>
        <select name="jenis_tagihan_id" class="border p-2 w-full rounded-md" required>
            <option value="">-- PILIH --</option>
            @foreach($jenis_tagihans as $jenis)
            <option value="{{ $jenis->id_jenis_tagihan }}">{{ $jenis->jenis_tagihan }}</option>
            @endforeach
        </select>

        <div class="flex items-center gap-2 mt-2">
            <button type="button" onclick="document.getElementById('modalJenis').classList.remove('hidden')" class="text-blue-600 hover:underline">
                + Tambah Jenis Tagihan
            </button>
        </div>

        <label class="block mt-2">Tahun Ajaran:</label>
        <select name="tahun_ajaran_id" class="border p-2 w-full rounded-md" required>
            <option value="">-- PILIH --</option>
            @foreach($tahun_ajarans as $tahun)
            <option value="{{ $tahun->id_tahun_ajaran }}">{{ $tahun->tahun_ajaran }}</option>
            @endforeach
        </select>

        <label class="block">Jumlah Tarif:</label>
        <!-- Input tampilan user -->
        <input type="text" id="jumlah_tarif_display" class="border p-2 w-full rounded-md" required>

        <!-- Hidden input untuk dikirim ke server -->
        <input type="hidden" name="jumlah_tarif" id="jumlah_tarif">

        <div class="float-right">
            <button type="submit" class="mt-4 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('admin.tarif-tagihan.index') }}" class="ml-2 text-gray-600">Batal</a>
        </div>
    </form>
    
    <!-- Modal Jenis Tagihan -->
    <div id="modalJenis" class="fixed inset-0 bg-gray-800 bg-opacity-50 z-50 items-center justify-center hidden">
        <div class="bg-white p-6 rounded shadow w-full max-w-md relative">
            <button onclick="document.getElementById('modalJenis').classList.add('hidden')" class="absolute top-2 right-3 text-gray-500 text-xl">&times;</button>
            <h2 class="text-lg font-bold mb-4">Tambah Jenis Tagihan</h2>

            <form id="formJenisTagihan">
                @csrf
                <label class="block mb-2">Jenis Tagihan:</label>
                <input type="text" name="jenis_tagihan" class="border p-2 w-full mb-4 rounded-md" required>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </form>
        </div>
    </div>
    
    <script>
        document.getElementById('formJenisTagihan').addEventListener('submit', async function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            const response = await fetch("{{ route('admin.jenis-tagihan.ajax-store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            });

            const result = await response.json();

            if (result.status === 'success') {
                // Tambahkan ke select
                const option = document.createElement("option");
                option.value = result.data.id_jenis_tagihan;
                option.text = result.data.jenis_tagihan;
                option.selected = true;

                document.querySelector('select[name="jenis_tagihan_id"]').appendChild(option);

                // Tutup modal
                document.getElementById('modalJenis').classList.add('hidden');
            }
        });

        // script format duit
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
