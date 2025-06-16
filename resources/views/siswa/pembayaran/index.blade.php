<x-layout-dashboard-siswa>

    {{-- 
    
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
    </form> --}}
    
    {{-- <table>
        <thead>
            <tr>
                <th>ID Tagihan</th>
                <th>Jenis Tagihan</th>
                <th>Total Tagihan</th>
                <th>Status Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detail_tagihans as $detail)
                <tr>
                    <td>{{ $detail->tagihan->id_tagihan }}</td>
                    <td>{{ $detail->tarifTagihan->jenisTagihan->jenis_tagihan }}</td>
                    <td>Rp{{ number_format($detail->jumlah_tagihan, 0, ',', '.') }}</td>
                    <td>
                        @if ($detail->tagihan->status_pembayaran === 'lunas')
                            <span style="color: green;">Lunas</span>
                        @else
                            <span style="color: red;">Belum Dibayar</span>
                        @endif
                    </td>
                    <td>
                        @if ($detail->tagihan->status_pembayaran !== 'lunas')
                            <form method="POST" action="{{ route('siswa.pembayaran.bayar') }}">
                                @csrf
                                <input type="hidden" name="detail_tagihan_id" value="{{ $detail->id_detail_tagihan }}">
                                <button type="submit">Bayar</button>
                            </form>
                        @else
                            <span>-</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
    
            <div class="max-w-4xl xl:max-w-5xl mx-auto t">
                <div class="grid md:grid-cols-2 gap-6 items-center  p-4 py-10">
                <div>
                    <p class="text-xs font-semibold text-gray-600">Total tagihan</p>
                    @foreach ($detail_tagihans as $detail)
                        <h1 class="text-xl font-bold">{{ formatRupiah($detail->tagihan->total_tagihan) }}</h1>
                    @endforeach
                </div>
            </div>
            <div class="p-4 bg-white shadow-black/100 shadowss ">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
                    @foreach ($detail_tagihans as $detail)
                        <div class="flex justify-between items-center lg:pr-20 py-3 border-b">
                            <div class="flex items-center gap-4">
                            <i class="bi bi-cash-stack text-[2rem] text-green-600"></i>
                            <div>
                                <p class="font-medium text-sm text-gray-600">{{ $detail->tarifTagihan->jenisTagihan->jenis_tagihan }}</p>
                                <p class="font-bold ">{{ formatRupiah($detail->tarifTagihan->jumlah_tarif) }}</p>
                            </div>
                            </div>
                            <form method="POST" action="{{ route('siswa.pembayaran.bayar') }}" >
                                @csrf
                                <input type="hidden" name="detail_tagihan_id" value="{{ $detail->id_detail_tagihan }}">
                                <button type="submit" class="flex text-xs shadow items-center justify-center rounded-full bg-primary py-1 gap-x-2 px-3 z-10">Bayar Sekarang 
                                        <i class="bi bi-arrow-right-circle-fill text-xl"></i>
                                </button>
                            </form>
                        </div>
                        
                    @endforeach

                </div>
            </div>
        </div>  
</x-layout-dashboard-siswa>

