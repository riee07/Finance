<x-allLinks></x-allLinks>
<div class="max-w-7xl mx-auto px-4 py-6">
    {{-- Header dan Selamat Datang --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold">Selamat datang, {{ Auth::user()->siswa->name }}!</h1>
        <p class="text-gray-600 mt-1">{{ Auth::user()->siswa->nisn }}</p>
    </div>

    {{-- Tabel Tagihan --}}
    <div class="bg-white rounded shadow p-4 mb-6">
        <h2 class="text-lg font-semibold mb-4">Rincian Tagihan</h2>
        
        @if($detail_tagihans->count())
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-3 py-2">Jenis Tagihan</th>
                        <th class="border px-3 py-2">Tahun Ajaran</th>
                        <th class="border px-3 py-2 text-right">Jumlah</th>
                        <th class="border px-3 py-2 text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_tagihans as $detail)
                    <tr>
                        <td class="border px-3 py-2">{{ $detail->tarifTagihan->jenisTagihan->jenis_tagihan ?? '-' }}</td>
                        <td class="border px-3 py-2">{{ $detail->tarifTagihan->tahunAjaran->tahun_ajaran ?? '-' }}</td>
                        <td class="border px-3 py-2 text-right">Rp{{ number_format($detail->jumlah_tagihan, 0, ',', '.') }}</td>
                        <td class="border px-3 py-2 text-center">
                            <span class="{{ $detail->tagihan->status_pembayaran == 'lunas' ? 'text-green-600' : 'text-red-600' }}">
                                {{ ucfirst($detail->tagihan->status_pembayaran ?? 'belum_lunas') }}
                            </span>
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
    
    {{-- Kartu Tagihan --}}
    <div class="mb-6">
        <div class="bg-green-500 text-white p-6 rounded-xl shadow-md max-w-md">
            <h2 class="text-lg font-bold mb-2">Tagihan</h2>
            <p class="text-sm text-green-100 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing</p>
            <a href="{{ route('siswa.pembayaran.index') }}" class="inline-flex items-center bg-white text-green-700 px-4 py-2 rounded-full shadow hover:bg-gray-100 transition">
                Bayar Sekarang
                <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M12.293 3.293a1 1 0 011.414 0L19 8.586a2 2 0 010 2.828l-5.293 5.293a1 1 0 01-1.414-1.414L15.586 11H4a1 1 0 010-2h11.586l-3.293-3.293a1 1 0 010-1.414z" />
                </svg>
            </a>
        </div>
    </div>
    
    {{-- Logout --}}
    <form method="POST" action="{{ route('logout') }}" class="mb-6">
        @csrf
        <button class="w-full text-left py-2 px-4 rounded hover:bg-gray-200 text-red-600">Logout</button>
    </form>
</div>
