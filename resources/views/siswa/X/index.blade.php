    <!-- Welcome Text -->
 <div class="mt-8 mx-auto">
  <h1 class="text-3xl font-bold">Selamat Datang, $siswa</h1>
  <p class="text-gray-600 mt-1">4829173650</p>
</div>
<br><br>

<div x-data="{open: false}" class="bg-green-700 rounded-xl p-4 m-auto overflow-hidden">
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
          <a href="/spp" class="text-lg font-medium hover:text-primary hover:opacity-50">Bayar Sekarang →</a>
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
    </div>
  </div>
</div>


<!-- Detail Pembayaran -->
<div id="paymentModal" class="fixed hidden inset-0 bg-black bg-opacity-50 flex items-center justify-center">
       <div class="bg-white rounded-lg shadow-lg max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
           <div class="p-6">
               <!-- Header -->
               <div class="flex justify-between items-center mb-6">
                   <div class="flex items-center gap-2">
                       <button onclick="closeModal()" class="flex items-center gap-1">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                               <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                           </svg>
                           <span>Detail $tagihan</span>
                       </button>
                   </div>
               </div>

               <!-- Payment Status -->
               <div class="mb-6">
                   <span class="bg-emerald-500 text-white text-sm px-3 py-1 rounded-full">$status_pembayaran</span>
                   <h2 class="mt-2" id="paymentTitle">Pembayaran $tagihan</h2>
                   <p class="text-2xl font-semibold mt-1">$harga</p>
                   <p class="text-gray-600 text-sm mt-2" id="paymentDate">$date</p>
               </div>

               <!-- Payment Details -->
               <div class="mb-6">
                   <h3 class="font-medium mb-4">Rincian Pembayaran</h3>
                   <div class="space-y-3">
                       <div class="flex">
                           <span class="text-gray-600 w-40">Nama Siswa</span>
                           <span>$nama</span>
                       </div>
                       <div class="flex">
                           <span class="text-gray-600 w-40">NIS</span>
                           <span id="studentId">$nis</span>
                       </div>
                       <div class="flex">
                           <span class="text-gray-600 w-40">Kelas</span>
                           <span></span>
                       </div>
                       <div class="flex">
                           <span class="text-gray-600 w-40">Metode Pembayaran</span>
                           <span>$metode_pembayaran</span>
                       </div>
                   </div>
               </div>

               <!-- Payment History -->
               <div>
                   <h3 class="font-medium mb-4">Riwayat Pembayaran</h3>
                   <div class="space-y-3">
                       <div class="flex justify-between items-center">
                           <span>$date</span>
                           <span class="flex items-center gap-4">
                               <span>$harga</span>
                               <span class="bg-emerald-500 text-white text-sm px-3 py-1 rounded-full">$status_pembayaran</span>
                           </span>
                       </div>
                       <div class="flex justify-between items-center">
                           <span>$date</span>
                           <span class="flex items-center gap-4">
                               <span>$harga</span>
                               <span class="bg-emerald-500 text-white text-sm px-3 py-1 rounded-full">$status_pembayaran</span>
                           </span>
                       </div>
                       <div class="flex justify-between items-center">
                           <span>$date</span>
                           <span class="flex items-center gap-4">
                               <span>$harga</span>
                               <span class="bg-emerald-500 text-white text-sm px-3 py-1 rounded-full">$status_pembayaran</span>
                           </span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
<script src="/js/utama.js"></script>
<script src="/js/detail.js"></script>



