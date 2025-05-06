Halo Siswa!
Langsung saja yak. Ini dia list bayaran kamu😊

<br>
@foreach ($detail_tagihans as $item)
  <div class="bg-white shadow-md p-4 rounded-xl">
    <h3 class="text-lg font-semibold">{{ $item->tarifTagihan->jenisTagihan->jenis_tagihan }}</h3>
    <p class="text-gray-500">{{ $item->tarifTagihan->tahunAjaran->tahun_ajaran }}</p>
    <p class="text-gray-700">Rp{{ number_format($item->jumlah_tagihan, 0, ',', '.') }}</p>
    <p class="text-sm {{ $item->tagihan->status_pembayaran == 'lunas' ? 'text-green-600' : 'text-red-600' }}">
        Status: {{ ucfirst($item->tagihan->status_pembayaran) }}
    </p>
    <a href="#" class="mt-2 inline-block bg-blue-600 text-white px-4 py-2 rounded">Bayar Sekarang</a>
  </div>
@endforeach


<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="w-full text-left py-2 px-4 rounded hover:bg-gray-700">Logout</button>
</form>