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
<x-navbar-d-spp></x-navbar-d-spp>

<div class="max-w-screen-2xl mx-auto my-44 p-5">
  <div class="mt-8 mx-auto">
    <h1 class="text-3xl font-bold">Selamat Datang {{ Auth::user()->name }}</h1>
    <p class="text-gray-600 mt-1">{{ Auth::user()->nisn }}</p>
  </div>
  <br><br>
  
  <div x-data="{open: false}" class="bg-green-700 rounded-md p-4 m-auto overflow-hidden">
    <!-- Category Header -->
     <div  x-ref="categori" class=" flex duration-200 min-[425px]:translate-x-[0] w-[350px] p-3 relative items-center justify-between  mb-4 border bg-white/25 border-white rounded-full">
         <div @click="$refs.scrollBar.scrollLeft = 0 "  class="z-[1] px-4 text-sm  cursor-pointer min-[425px]:block hidden ">Categori 1</div>
         <div @click="$refs.scrollBar.scrollLeft = 295" class="z-[1] px-4 text-sm cursor-pointer min-[425px]:block hidden">Categori 2</div>
         <div @click="$refs.scrollBar.scrollLeft = 905" class="z-[1] px-4 text-sm cursor-pointer min-[425px]:block hidden ">Categori 3</div>
         <div @click="$refs.scrollBar.scrollLeft = 0 , $refs.categori.classList.add('translate-x-[0]'),$refs.categori.classList.remove('translate-x-[-50px]'),$refs.categori.classList.remove('translate-x-[-100px]')"  class="z-[1] min-[425px]:hidden px-4 text-sm  cursor-pointer  ">Categori 1</div>
         <div @click="$refs.scrollBar.scrollLeft = 295, $refs.categori.classList.add('translate-x-[-50px]'),$refs.categori.classList.remove('translate-x-[0]'),$refs.categori.classList.remove('translate-x-[-100px]')" class="z-[1] min-[425px]:hidden px-4 text-sm cursor-pointer">Categori 2</div>
         <div @click="$refs.scrollBar.scrollLeft = 905, $refs.categori.classList.add('translate-x-[-100px]'),$refs.categori.classList.remove('translate-x-[0]'),$refs.categori.classList.remove('translate-x-[-50px]')" class="z-[1] min-[425px]:hidden px-4 text-sm cursor-pointer">Categori 3</div>
  
         <div  id="tarikBg" class=" w-[100px] h-[35px] bg-white absolute rounded-full duration-75"></div>
     </div>
  
  
  
  
    <!-- Horizontal Scrollable Container -->
    <div x-ref="scrollBar" class="overflow-x-auto scrollbar-hide scroll-smooth scrollBar">
      <div id="gob" class="flex space-x-4 pb-4" style="width: max-content">
        <!-- Card 1 -->
        <div class="bg-white rounded-xl p-4 w-72 flex-shrink-0">
          <div class="flex justify-between items-start mb-10">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <button class="bg-gray-100 px-3 py-1 rounded-lg text-sm"><i class="bi bi-bookmark mr-2 opacity-40 hover:opacity-100"></i>Ingatkan</button>
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
  
        <!-- Card 2 -->
        <div class="bg-white rounded-xl p-4 w-72 flex-shrink-0">
          <div class="flex justify-between items-start mb-10">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <button class="bg-gray-100 px-3 py-1 rounded-lg text-sm"><i class="bi bi-bookmark mr-2 opacity-40 hover:opacity-100"></i>Ingatkan</button>
          </div>
          <div class="mb-2">
            <div class="text-gray-600 text-sm">Semester</div>
            <div class="text-xl font-semibold">Sumatif Tengah Semester</div>
          </div>
          <div class=" justify-between items-center">
            <button class="bg-gray-100 px-4 py-1 rounded-lg text-sm" onclick="showDetail()">Detail →</button><br>
            <hr class="mt-20">
            <a class="text-lg font-medium hover:text-primary hover:opacity-50">Bayar Sekarang →</a>
          </div>
        </div>
  
        <!-- Card 3 -->
        <div class="bg-white rounded-xl p-4 w-72 flex-shrink-0">
          <div class="flex justify-between items-start mb-10">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <button class="bg-gray-100 px-3 py-1 rounded-lg text-sm"><i class="bi bi-bookmark mr-2 opacity-40 hover:opacity-100"></i>Ingatkan</button>
          </div>
          <div class="mb-2">
            <div class="text-gray-600 text-sm">Semester</div>
            <div class="text-xl font-semibold">Buku Paket</div>
          </div>
          <div class=" justify-between items-center">
            <button class="bg-gray-100 px-4 py-1 rounded-lg text-sm" onclick="showDetail()">Detail →</button><br>
            <hr class="mt-20">
            <button class="text-lg font-medium hover:text-primary hover:opacity-50">Bayar Sekarang →</button>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="bg-white rounded-xl p-4 w-72 flex-shrink-0">
          <div class="flex justify-between items-start mb-10">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <button class="bg-gray-100 px-3 py-1 rounded-lg text-sm"><i class="bi bi-bookmark mr-2 opacity-40 hover:opacity-100"></i>Ingatkan</button>
          </div>
          <div class="mb-2">
            <div class="text-gray-600 text-sm">Tahunan</div>
            <div class="text-xl font-semibold">Seragam</div>
          </div>
          <div class=" justify-between items-center">
            <button class="bg-gray-100 px-4 py-1 rounded-lg text-sm" onclick="showDetail()">Detail →</button><br>
            <hr class="mt-20">
            <button class="text-lg font-medium hover:text-primary hover:opacity-50">Bayar Sekarang →</button>
          </div>
        </div>
        <div class="bg-white rounded-xl p-4 w-72 flex-shrink-0">
            <div class="flex justify-between items-start mb-10">
              <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <button class="bg-gray-100 px-3 py-1 rounded-lg text-sm"><i class="bi bi-bookmark mr-2 opacity-40 hover:opacity-100"></i>Ingatkan</button>
            </div>
            <div class="mb-2">
              <div class="text-gray-600 text-sm">Tahunan</div>
              <div class="text-xl font-semibold">DSP</div>
            </div>
            <div class=" justify-between items-center">
              <button class="bg-gray-100 px-4 py-1 rounded-lg text-sm" onclick="showDetail()">Detail →</button><br>
              <hr class="mt-20">
              <button class="text-lg font-medium hover:text-primary hover:opacity-50">Bayar Sekarang →</button>
            </div>
          </div>
          <div class="bg-white rounded-xl p-4 w-72 flex-shrink-0">
            <div class="flex justify-between items-start mb-10">
              <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <button class="bg-gray-100 px-3 py-1 rounded-lg text-sm"><i class="bi bi-bookmark mr-2 opacity-40 hover:opacity-100"></i>Ingatkan</button>
            </div>
            <div class="mb-2">
              <div class="text-gray-600 text-sm">Tahunan</div>
              <div class="text-xl font-semibold">PKL</div>
            </div>
            <div class=" justify-between items-center">
              <button class="bg-gray-100 px-4 py-1 rounded-lg text-sm" onclick="showDetail()">Detail →</button><br>
             <hr class="mt-20">
             <button class="text-lg font-medium hover:text-primary hover:opacity-50">Bayar Sekarang →</button>
            </div>
          </div>
          <div class="bg-white rounded-xl p-4 w-72 flex-shrink-0">
            <div class="flex justify-between items-start mb-10">
              <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <button class="bg-gray-100 px-3 py-1 rounded-lg text-sm"><i class="bi bi-bookmark mr-2 opacity-40 hover:opacity-100"></i>Ingatkan</button>
            </div>
            <div class="mb-2">
              <div class="text-gray-600 text-sm">Tahunan</div>
              <div class="text-xl font-semibold">Kegiatan</div>
            </div>
            <div class=" justify-between items-center">
              <button class="bg-gray-100 px-4 py-1 rounded-lg text-sm" onclick="showDetail()">Detail →</button><br>
              <hr class="mt-20"><button class="text-lg font-medium hover:text-primary hover:opacity-50">Bayar Sekarang →</button>
            </div>
          </div>
          <div class=" rounded-xl p-4 w-72 flex-shrink-0">
  
          </div>
          <div class=" rounded-xl p-4 w-72 flex-shrink-0">
  
          </div>
      </div>
    </div>
  </div>
</div>
