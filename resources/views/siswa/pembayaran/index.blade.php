<x-allLinks></x-allLinks>

<div class="max-w-5xl mx-auto px-4 py-6">
    {{-- Total Tagihan --}}
    <div class="flex items-center justify-between bg-white shadow rounded-lg p-6 mb-6">
        <div>
            <h2 class="text-gray-500 font-semibold text-lg">Total tagihan</h2>
            <p class="text-3xl font-bold text-gray-800 mt-1">Rp 200,000</p>
        </div>
        <div class="text-center">
            <div class="relative w-16 h-16">
                <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 36 36">
                    <path class="text-gray-300" fill="none" stroke-width="3.8"
                          d="M18 2.0845 a 15.9155 15.9155 0 1 1 0 31.831 a 15.9155 15.9155 0 1 1 0 -31.831"/>
                    <path class="text-yellow-500" fill="none" stroke-width="3.8"
                          stroke-dasharray="50, 100"
                          d="M18 2.0845 a 15.9155 15.9155 0 1 1 0 31.831 a 15.9155 15.9155 0 1 1 0 -31.831"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- Daftar Tagihan --}}
    <h2 class="text-xl font-bold text-gray-800 mb-4">Daftar tagihan</h2>

    @foreach ($detail_tagihans as $detail)
        <div class="flex justify-between items-center bg-white shadow-sm border rounded-xl px-5 py-4 mb-4">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/money-icon.png') }}" class="w-14 h-14" alt="icon">
                <div>
                    <div class="text-gray-800 font-medium text-sm">
                        {{ $detail->tarifTagihan->jenisTagihan->jenis_tagihan }}
                    </div>
                    <div class="text-gray-800 font-bold text-base">
                        Rp{{ number_format($detail->jumlah_tagihan, 0, ',', '.') }}
                    </div>
                    <div class="text-sm mt-1 font-semibold 
                        {{ $detail->tagihan->status_pembayaran === 'lunas' ? 'text-green-600' : 'text-red-600' }}">
                        {{ $detail->tagihan->status_pembayaran === 'lunas' ? 'Lunas' : 'Belum Dibayar' }}
                    </div>
                </div>
            </div>

            <div>
                @if ($detail->tagihan->status_pembayaran !== 'lunas')
                    <form method="POST" action="{{ route('siswa.pembayaran.bayar') }}">
                        @csrf
                        <input type="hidden" name="detail_tagihan_id" value="{{ $detail->id_detail_tagihan }}">
                        <button type="submit"
                                class="text-sm bg-green-100 text-green-800 px-4 py-1.5 rounded-full font-semibold hover:bg-green-200 transition">
                            • bayar sekarang
                        </button>
                    </form>
                @else
                    <span class="text-gray-400 text-sm">-</span>
                @endif
            </div>
        </div>
    @endforeach
</div>
