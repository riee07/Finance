

<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Daftar Tagihan</h2>

    @foreach($detail_tagihans as $detail)
        <div class="bg-white p-4 rounded shadow mb-4">
            <p><strong>Jenis Tagihan:</strong> {{ $detail->tarifTagihan->jenisTagihan->jenis_tagihan }}</p>
            <p><strong>Jumlah:</strong> Rp{{ number_format($detail->jumlah_tagihan) }}</p>
            <p><strong>Status:</strong> 
                @if($detail->tagihan->status_pembayaran === 'lunas')
                    <span class="text-green-600 font-semibold">Lunas</span>
                @else
                    <span class="text-red-600 font-semibold">Belum Lunas</span>
                @endif
            </p>
            @if($detail->status !== 'Lunas')
                <form action="{{ route('siswa.pembayaran.bayar') }}" method="POST" class="mt-2">
                    @csrf
                    <input type="hidden" name="detail_tagihan_id" value="{{ $detail->id_detail_tagihan }}">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Bayar Sekarang
                    </button>
                </form>
            @endif
        </div>
    @endforeach
</div>


<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="w-full text-left py-2 px-4 rounded hover:bg-gray-700">Logout</button>
</form>