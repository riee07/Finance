<style>
  .scrollBar-hide::-webkit-scrollbar {
    display: none;
  }
  .scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>

<x-allLinks></x-allLinks>

<!-- Container utama dengan state openCart -->
<div x-data="{ openCart: false }">
  <!-- Container komponen keranjang: HANYA SATU instance -->
  <div x-data="tagihanItem()">
    <x-navbar-d-spp></x-navbar-d-spp>
    <div class="max-w-screen-2xl mx-auto my-44 p-5">
      <div class="mt-8 mx-auto">
        <h1 class="text-3xl font-bold">Selamat Datang, {{ Auth::user()->name }}</h1>
        <p class="text-gray-600 mt-1">{{ Auth::user()->nisn }}</p>
      </div>
      <br><br>
      
      <!-- Container kategori (tetap menggunakan x-data lokal jika diperlukan) -->
      <div x-data="{ open: false }" class="bg-green-700 rounded-md p-4 m-auto overflow-hidden">
        <!-- Category Header -->
        <div x-ref="categori" class="flex duration-200 min-[425px]:translate-x-[0] w-[350px] p-3 relative items-center justify-between mb-4 border bg-white/25 border-white rounded-full">
          <div @click="$refs.scrollBar.scrollLeft = 0" class="z-[1] px-4 text-sm cursor-pointer min-[425px]:block hidden">Categori 1</div>
          <div @click="$refs.scrollBar.scrollLeft = 295" class="z-[1] px-4 text-sm cursor-pointer min-[425px]:block hidden">Categori 2</div>
          <div @click="$refs.scrollBar.scrollLeft = 905" class="z-[1] px-4 text-sm cursor-pointer min-[425px]:block hidden">Categori 3</div>
          <div @click="$refs.scrollBar.scrollLeft = 0; $refs.categori.classList.add('translate-x-[0]'); $refs.categori.classList.remove('translate-x-[-50px]','translate-x-[-100px]')" class="z-[1] min-[425px]:hidden px-4 text-sm cursor-pointer">Categori 1</div>
          <div @click="$refs.scrollBar.scrollLeft = 295; $refs.categori.classList.add('translate-x-[-50px]'); $refs.categori.classList.remove('translate-x-[0]','translate-x-[-100px]')" class="z-[1] min-[425px]:hidden px-4 text-sm cursor-pointer">Categori 2</div>
          <div @click="$refs.scrollBar.scrollLeft = 905; $refs.categori.classList.add('translate-x-[-100px]'); $refs.categori.classList.remove('translate-x-[0]','translate-x-[-50px]')" class="z-[1] min-[425px]:hidden px-4 text-sm cursor-pointer">Categori 3</div>
    
          <div id="tarikBg" class="w-[100px] h-[35px] bg-white absolute rounded-full duration-75"></div>
        </div>
    
        <!-- Horizontal Scrollable Container -->
        <div x-ref="scrollBar" class="overflow-x-auto scrollbar-hide scroll-smooth scrollBar">
          <div id="gob" class="flex space-x-4 pb-4" style="width: max-content">
            <!-- Card 1 (Statis) -->
            <div class="bg-white rounded-xl p-4 w-72 flex-shrink-0">
              <div class="flex justify-between items-start mb-10">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <i class="bx bx-cart text-[2rem]"></i>
              </div>
              <div class="mb-2">
                <div class="text-gray-600 text-sm">Bulanan</div>
                <div class="text-xl font-semibold">SPP</div>
              </div>
              <div class="justify-between items-center">
                <button class="bg-gray-100 py-1 px-3 rounded-sm text-sm" onclick="showDetail()">Detail →</button><br>
                <hr class="mt-20">
                <a href="/siswa" class="text-lg font-medium hover:text-primary hover:opacity-50">Bayar Sekarang →</a>
              </div>
            </div>
    
            <!-- Card 2: Looping Data dari items -->
            <template x-for="(item, index) in items" :key="index">
              <div class="bg-white rounded-xl p-4 w-72 flex-shrink-0">
                <div class="flex justify-between items-start mb-10">
                  <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  <button>
                    <i class="bx bx-cart text-[2rem]"></i>
                  </button>
                </div>
                <div class="mb-2">
                  <div class="text-gray-600 text-sm">
                    <span x-text="item.judul"></span>
                  </div>
                  <div class="text-xl font-semibold">
                    <span x-text="formatRupiah(item.harga)"></span>
                  </div>
                </div>
                <div class="justify-between items-center">
                  <button class="bg-gray-100 px-4 py-1 rounded-lg text-sm" @click="showDetail(item)">Detail →</button><br>
                  <hr class="mt-20">
                  <a class="text-lg font-medium hover:text-primary hover:opacity-50">Bayar Sekarang →</a>
                </div>
              </div>
            </template>
          </div>
          <div class="rounded-xl p-4 w-72 flex-shrink-0">
            <!-- Konten lain (jika ada) -->
          </div>
        </div>
      </div>
    
      <!-- Bagian Cart (Popup) -->
      <div x-show="openCart" class="fixed w-full h-screen top-0 left-0 bg-secondary z-10">
        <p @click="openCart = !openCart" class="absolute right-0 top-0 cursor-pointer text-[2rem]">
          <i class="bx bx-x"></i>
        </p>
        <section class="md:py-16">
          <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
              <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                <div class="space-y-6">
                  <div class="rounded-lg border bg-primary text-secondary md:p-6">
                    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                      <a href="#" class="shrink-0 md:order-1">
                        <img class="h-20 w-20 dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg" alt="imac image" />
                        <img class="hidden h-20 w-20 dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg" alt="imac image" />
                      </a>
                      <div class="flex items-center justify-between md:order-3 md:justify-end">
                        <div class="flex items-center">
                          <p>200</p>
                        </div>
                        <div class="text-end md:order-4 md:w-32 cursor-pointer">
                          <button>
                            <i class="bx bx-x text-[2rem]"></i>
                          </button>
                        </div>
                      </div>
                      <div class="w-full min-w-0 flex-1 md:order-2 md:max-w-md">
                        <p>november</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    
              <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                <div class="space-y-4 rounded-lg border bg-primary text-secondary sm:p-6">
                  <p class="text-xl font-semibold">Order summary</p>
                  <div class="space-y-4">
                    <div class="space-y-2">
                      <dl class="flex items-center justify-between gap-4">
                        <dt class="text-base font-normal">Original price</dt>
                        <dd class="text-base font-medium">$7,592.00</dd>
                      </dl>
                    </div>
                    <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                      <dt class="text-base font-bold">Total</dt>
                      <dd class="text-base font-bold">$8,191.00</dd>
                    </dl>
                  </div>
                  <a href="#" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    Proceed to Checkout
                  </a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>

<!-- Sertakan AlpineJS dan Flowbite (pastikan hanya sekali) -->
<script src="https://unpkg.com/alpinejs@3.12.0/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js" defer></script>

<!-- Definisikan data global dari Controller -->
<script>
  window.tagihanItem = @json($tagihanX);
  console.log(window.tagihanItem);
</script>

<!-- File index_X.js: pastikan hanya dimuat sekali -->
<script src="{{ asset('assets/js/index_X.js') }}"></script>
