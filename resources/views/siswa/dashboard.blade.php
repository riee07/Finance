<x-layout-dashboard-siswa>

  {{-- <div class="max-w-7xl mx-auto px-4 py-6">
      Header dan Selamat Datang
      <div class="mb-6">
          <h1 class="text-2xl font-bold">Selamat datang, {{ Auth::user()->siswa->name }}!</h1>
          <p class="text-gray-600 mt-1">{{ Auth::user()->siswa->nisn }}</p>
      </div>
  
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
      
      <form method="POST" action="{{ route('logout') }}" class="mb-6">
          @csrf
          <button class="w-full text-left py-2 px-4 rounded hover:bg-gray-200 text-red-600">Logout</button>
      </form>
  </div> --}}
   <header class="p-4 flex justify-between max-w-5xl w-full mx-auto mt-10 text-text ">
      <div >
        <h1 class="text-xl  ">Selamat datang</h1>
        <p class="text-green-600 text-xl -mt-1">{{ $siswa->name }}</p>
      </div>
      <div class="text-right space-y-2">
        <p class="text-xs text-gray-500">Tagihan yang dimiliki</p>
        <p class="font-semibold">{{ formatRupiah($tagihans->total_tagihan)}}</p>
        <div class="flex shadow items-center justify-center space-x-3 rounded-full bg-primary px-3 z-10">
          <p class="text-[.5rem]">Cek Sekarang</p>
          <i class="bi bi-arrow-right-circle-fill text-xl"></i>
        </div>
    </header>
  
    <!-- Tagihan Slider -->
    <section class="px-4 max-w-5xl mx-auto w-full mt-20">
        <div class="flex justify-between items-center mb-10">
            <h2 class="text-gray-500 font-semibold mb-2">Tagihan</h2>
            <a href="{{ route('siswa.pembayaran.index') }}" class="font-semibold mb-2 underline text-primary text-xs">show all</a>
        </div>
<div data-hs-carousel='{
  "loadingClasses": "opacity-0",
  "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500",
  "slidesQty": {
    "xs": 1,
    "lg": 3
    }
    }' class="relative">
    <div class="hs-carousel w-full overflow-hidden">
        <div class="relative mx-1">
        <!-- transition-transform duration-700 -->
        <div class="hs-carousel-body flex flex-nowrap opacity-0 transition-transform duration-700">
            @foreach ($detail_tagihans as $detail)
            <div class="hs-carousel-slide px-1">
                <div class="gap-y-20 bg-gradient-to-br w-full from-primary to-secondary rounded-xl p-6 flex justify-between shadow-lg text-black font-sans">
                    <div class="flex flex-col space-y-20 justify-between">
                        <h2 class="text-2xl font-semibold">{{ $detail->tarifTagihan->jenisTagihan->jenis_tagihan }}</h2>
                        <div class="">
                            <p class="text-gray-600 font-semibold">harga</p>
                            <p class="text-xl font-bold text-black">Rp{{ number_format($detail->jumlah_tagihan) }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-20 justify-between">
                        <div class=" bg-green-200 text-black text-sm px-4 py-1 rounded-full shadow-md">
                            rabu, 2 jan, 2025
                        </div>
                        <form method="POST" action="{{ route('siswa.pembayaran.bayar') }}">
                            @csrf
                                <input type="hidden" name="detail_tagihan_id" value="{{ $detail->id_detail_tagihan }}">
                                <button type="submit" class=" bg-white text-black text-sm px-5 py-2 rounded-full shadow-md hover:bg-gray-100 transition">
                                    bayar sekarang
                                </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="hs-carousel-slide px-1 flex items-center justify-center ">
                <div class="gap-y-20 bg-gradient-to-br w-full bg-[#00ff2220] rounded-xl h-full p-6 flex justify-center items-center shadow-lg text-black font-sans">
                    <a href="{{ route('siswa.pembayaran.index') }}" class="font-semibold mb-2 underline text-primary text-xs">show all</a>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="w-full flex items-center justify-center gap-x-20 mt-5">
        <button type="button" class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none">
            <i class="bi bi-arrow-left-circle-fill text-2xl"></i>
        </button>
        <button type="button" class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none">
            <i class="bi bi-arrow-right-circle-fill text-2xl"></i>
        </button>
    </div>

</div>
<!-- End Slider -->
    </section>
  
    <!-- Semua Produk -->
    <section class="px-4 mt-6 max-w-5xl mx-auto w-full flex-1">
      <h2 class="text-gray-700 font-semibold mb-3">semuanya</h2>
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <!-- Item -->
        @foreach ($detail_tagihans as $detail)
            
        <div class="bg-white py-5 px-3 rounded-xl border border-[#e2e2e2]">
          <div class="w-full text-center rounded-md p-5 bg-primary">
            <i class="bi bi-cash-coin text-[#7BED8A] text-[4rem]" style="text-shadow: 0px 5px 2px #00000010;"></i>
  
          </div>
          <h3 class="mt-10 font-medium text-sm">{{ $detail->tarifTagihan->jenisTagihan->jenis_tagihan }}</h3>
          <p class="text-xs text-gray-500">Bayar Semua seragam senin - jumat</p>
          <div class="flex items-center justify-between mt-2">
            <span class="font-semibold text-sm">{{ formatRupiah($detail->tarifTagihan->jumlah_tarif) }}</span>
            <span class=" bg-green-500 rounded-full py-[1px] px-[5px]">
                <i class="bi bi-arrow-right-short text-[15px] "></i>
            </span>
          </div>
        </div>
        @endforeach

      </div>
    </section>

<x-footer></x-footer>
</x-layout-dashboard-siswa>