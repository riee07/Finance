
{{-- CSS --}}
<style>
    #payButton.disabled {
        background-color: #cccccc; /* Warna abu-abu untuk tampilan disabled */
        cursor: not-allowed; /* Mengubah kursor jadi tanda dilarang */
    }

</style>

@vite('resources/css/app.css')

{{-- Alpine js --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x" defer></script>

{{-- midtrans --}}
<script type="text/javascript"
		src="https://app.stg.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-a4KHawnvhdZdC1_B"></script>

<div x-data="sppData()" id="spp" class="w-full justify-center items-center flex flex-col relative">
    <a href="/" class="my-10 text-2xl"><i class="bi bi-arrow-left mr-3 text-xl" ></i>spp bulanan</a>
    <div class="grid gap-x-5 gap-y-10 capitalize grid-cols-1m md:grid-cols-3m xl:grid-cols-4m grid-rows-3">
        {{-- <template x-for="item in items" :key="item.id"> --}}
            <div class="bg-white h-[320px] rounded-xl p-5">
                <div class="flex justify-between text-2xl mt-5">
                    <p class="font-semibold">SPP Bulan <br> <span x-text="item.bulan"></span></p>
                    <div class="flex justify-center items-center h-10 p-2 border-2 border-black rounded-md">
                        <i class="bi bi-check text-green-600"></i>
                    </div>
                </div>
                <div class="mt-24 flex justify-between">
                    <p>Total Biaya</p>
                    <p x-text="formatRupiah(item.harga)"></p>
                </div>
                <hr class="my-5">
                <div @click="$store.cart.add(item); open = true" class="cursor-pointer px-5 py-2 text-white rounded-lg float-right w-[150px] bg-green-600 hover:bg-green-600 hover:opacity-80">
                    <p>Bayar Sekarang</p>
                </div>
            </div>
        </template>
    </div>

    <!-- Modal -->
    <div @click="open = false" x-show="open"  x-transition.opacity class="fixed top-0 left-0 w-full h-screen flex items-center justify-center bg-black bg-opacity-50">
        <form action="" id="payForm">
        <div @click.stop class="bg-white p-5 rounded-xl flex flex-col items-center">
            <p class="font-semibold">Input Data Diri</p>
            <input type="hidden" name="items" x-model="JSON.stringify($store.cart.items)">
            <input type="hidden" name="total" x-model="($store.cart.total)">

            <input type="text" placeholder="nama" id="nama" name="nama" class="capitalize p-2 w-[300px] h-[45px] border-2 border-gray-400 rounded-lg mt-2" required>
            <input type="text" placeholder="kelas" id="kelas" name="kelas" class="capitalize p-2 w-[300px] h-[45px] border-2 border-gray-400 rounded-lg mt-2" required>
            <input type="text" placeholder="jurusan" id="jurusan" name="jurusan" class="capitalize p-2 w-[300px] h-[45px] border-2 border-gray-400 rounded-lg mt-2" required>
            <input type="number" placeholder="phone" id="phone" name="phone" class="capitalize p-2 w-[300px] h-[45px] border-2 border-gray-400 rounded-lg mt-2" required autocomplete="off">
            <hr>
            <!-- Menampilkan total dari Alpine store -->
            <p class="text-left">Bulan: <span x-text="$store.cart.bulan"></span></p>
            <p class="text-left">Total: <span x-text="formatRupiah($store.cart.total)"></span></p>
            <button id="payButton" class="mt-4 cursor-pointer px-5 py-2 text-white rounded-lg float-right w-[150px] bg-green-600 hover:bg-green-600 hover:opacity-80 disabled">
                Lanjut
            </button>                     
        </div>
    </form>
    </div>
</div>

<script src="/js/spp.js"></script>

