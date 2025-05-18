Halo {{ Auth::user()->siswa->name }}!
Langsung saja yak. Ini dia list bayaran kamu😊

<br>
{{-- @foreach ($detail_tagihans as $item)
  <div class="bg-white shadow-md p-4 rounded-xl">
    <h3 class="text-lg font-semibold">{{ $item->tarifTagihan->jenisTagihan->jenis_tagihan }}</h3>
    <p class="text-gray-500">{{ $item->tarifTagihan->tahunAjaran->tahun_ajaran }}</p>
    <p class="text-gray-700">Rp{{ number_format($item->jumlah_tagihan, 0, ',', '.') }}</p>
    <p class="text-sm {{ $item->tagihan->status_pembayaran == 'lunas' ? 'text-green-600' : 'text-red-600' }}">
        Status: {{ ucfirst($item->tagihan->status_pembayaran) }}
    </p>
    <a href="#" class="mt-2 inline-block bg-blue-600 text-white px-4 py-2 rounded">Bayar Sekarang</a>
  </div>
@endforeach --}}

<div class="max-w-7xl mx-auto py-8">

    {{-- Informasi Siswa --}}
    <div class="bg-white rounded shadow p-4 mb-6">
        <h2 class="text-lg font-semibold mb-2">Informasi Siswa</h2>
        <ul class="space-y-1">
            <li><strong>Nama:</strong> {{ $siswa->name }}</li>
            <li><strong>Kelas:</strong> {{ $siswa->kelas }}</li>
            <li><strong>Jurusan:</strong> {{ $siswa->jurusan }}</li>
            <li><strong>Tahun Ajaran:</strong> {{ $siswa->tahunAjaran->tahun_ajaran ?? '-' }}</li>
            <li><strong>Status:</strong> {{ ucfirst($siswa->status_aktif) }}</li>
        </ul>
    </div>

    {{-- Tabel Tagihan --}}
    <div class="bg-white rounded shadow p-4">
        <h2 class="text-lg font-semibold mb-4">Rincian Tagihan</h2>

        @if($detail_tagihans->count())
        <div class="overflow-x-auto">
            <table class="w-full border text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-3 py-2 text-left">Jenis Tagihan</th>
                        <th class="border px-3 py-2 text-left">Tahun Ajaran</th>
                        <th class="border px-3 py-2 text-right">Jumlah Tagihan</th>
                        <th class="border px-3 py-2 text-center">Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_tagihans as $detail)
                        <tr>
                            <td class="border px-3 py-2">
                                {{ $detail->tarifTagihan->jenisTagihan->jenis_tagihan ?? '-' }}
                            </td>
                            <td class="border px-3 py-2">
                                {{ $detail->tarifTagihan->tahunAjaran->tahun_ajaran ?? '-' }}
                            </td>
                            <td class="border px-3 py-2 text-right">
                                Rp{{ number_format($detail->jumlah_tagihan, 0, ',', '.') }}
                            </td>
                            <td class="border px-3 py-2 text-center">
                                {{ ucfirst($detail->tagihan->status_pembayaran ?? 'belum_lunas') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <p class="text-gray-500">Belum ada data tagihan yang tersedia.</p>
        @endif
    </div>
</div>



<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="w-full text-left py-2 px-4 rounded hover:bg-gray-700">Logout</button>
</form>