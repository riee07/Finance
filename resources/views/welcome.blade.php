<x-layout>
<nav class=" px-4 py-3 fixed top-0 left-0 right-0 z-50 duration-300 bg-transparent shadow">
    <div class="max-w-7xl mx-auto flex justify-between items-center text-text">
        <!-- Logo + Title -->
        <div class="flex items-center space-x-2">
        <img src="assets/images/lps.png" alt="Logo" class="h-[50px]" />
        <span class="text-lg font-medium">Smk Amaliah </span>
        </div>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex space-x-6 text-sm font-medium">
        <li><a href="#" class=" border-b-2 border-green-500">home</a></li>
        <li><a href="#" class=" hover:text-green-500">about</a></li>
        <li><a href="#" class=" hover:text-green-500">kontak</a></li>
        <li><a href="#" class=" hover:text-green-500">bantuan</a></li>
        </ul>

        <!-- Login Button -->
        <div class="hidden md:block">
        <a href="#" class=" border-2 hover:bg-[#29d847]  px-4 py-1 rounded-full text-sm">
            login
        </a>
        </div>

        <!-- Hamburger Button -->
        <div class="md:hidden">
        <button id="toggleSidebar" class=" focus:outline-none">
            <i class="bi bi-list text-3xl"></i>
        </button>
        </div>
    </div>
</nav> 

<!-- Mobile Sidebar -->
<div id="mobileSidebarWrapper" class="fixed inset-0 z-50 hidden md:hidden text-text">
<!-- Klik area (sisa celah) -->
    <div id="sidebarGap"
        class="absolute top-0 left-0 h-full w-full bg-black bg-opacity-20">
    </div>

    <!-- Sidebar box -->
    <div id="mobileSidebar"
        class="absolute top-0 right-0 h-full w-[300px] bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out">
        <div class="p-4 flex flex-col space-y-10 pt-5">
            <i class="bi bi-x-circle text-right text-2xl"></i>

            <div class="space-y-3 flex flex-col">
                <a href="#" class="bg-green-500 py-2 px-3 rounded-md">home</a>
                <a href="#" class="hover:bg-green-500 py-2 px-3 rounded-md ">about</a>
                <a href="#" class="hover:bg-green-500 py-2 px-3 rounded-md ">kontak</a>
                <a href="#" class="hover:bg-green-500 py-2 px-3 rounded-md ">bantuan</a>
            </div>
            <div class="w-full text-center">
                <i class="bi bi-info-circle text-4xl"></i>
                <p class="text-sm">mohon login terlebih dahulu untuk bisa membayar</p>
            </div>
            <a href="#" class="bg-green-500 text-white px-4 py-2 rounded-full text-center">login</a>
        </div>
    </div>
</div>
<section class="flex items-center justify-center px-2 min-h-screen bg-white">
  <div class="absolute top-0 left-0 w-full h-screen grid grid-rows-12 justify-center justify-items-center grid-cols-8 lg:grid-cols-11">
    <img src="assets/images/ak.png" alt="" class="h-[40px] lg:h-[60px] animate-pulse col-start-3 col-end-4 row-start-3 lg:col-start-6  lg:col-end-7 lg:row-start-2">
    <img src="assets/images/an.png" alt="" class="h-[40px] lg:h-[60px] animate-pulse  col-start-6 col-end-7 row-start-3 lg:col-start-2  lg:col-end-3 lg:row-start-3">
    <img src="assets/images/dpb.png" alt="" class="h-[40px] lg:h-[60px] animate-pulse col-start-2 col-end-3 row-start-4 lg:col-start-10  lg:col-end-11 lg:row-start-3">
    <img src="assets/images/lps.png" alt="" class="h-[40px] lg:h-[60px] animate-pulse col-start-7 col-end-8 row-start-4 lg:col-start-3  lg:col-end-4 lg:row-start-7">
    <img src="assets/images/mp.png" alt="" class="h-[40px] lg:h-[60px] animate-pulse col-start-2 col-end-3 row-start-9 lg:col-start-9  lg:col-end-10 lg:row-start-7">
    <img src="assets/images/pplg.png" alt="" class="h-[40px] lg:h-[60px] animate-pulse col-start-7 col-end-8 row-start-9 lg:col-start-2  lg:col-end-3 lg:row-start-9">
    <img src="assets/images/tkj.png" alt="" class="h-[40px] lg:h-[60px] animate-pulse col-start-3 col-end-4 row-start-10 lg:col-start-10  lg:col-end-11 lg:row-start-9">
    <img src="assets/images/br.png" alt="" class="h-[40px] lg:h-[60px] animate-pulse col-start-6 col-end-7 row-start-10 lg:col-start-6  lg:col-end-7 lg:row-start-10">
  </div>
<div class="text-center flex flex-col items-center justify-center px-5 z-10">
    <h1 class="text-2xl sm:text-3xl md:text-4xl font-semibold max-w-screen-md mb-5">
    Permudah pembayaran Amalaiah Dengan <span class="text-secondary font-medium">Amaliah Finance</span>
    </h1>
    <p class="text-[10px] md:text-sm text-paragraph mb-6 max-w-screen-sm ">
    amaliah finance adalah sebuah platform digital untuk mempermudah
    pengelolaan dan pembayaran yang ada di smk amaliah
    </p>
    <a href="#"
    class="flex items-center gap-x-2 justify-center w-fit  text-sm px-5 py-1 rounded-full shadow bg-primary hover:bg-green-500">
    <p>Bayar Sekarang</p>
    <i class="bi bi-arrow-right-circle-fill text-xl "></i>
    </a>
</div>
</section>


<section class="px-6 py-12 md:px-10 md:py-16 bg-white max-w-screen-xl mx-auto">
    
  <!-- Judul -->
  <h2 class="text-2xl md:text-3xl font-bold mb-5  decoration-blue-5000">
    Tentang Amaliah Finance
  </h2>

  <!-- Gambar -->
  <div class="flex  gap-4 mb-10">
    <div class="bg-gray-300 rounded-lg h-40 md:h-64 w-[50%] lg:w-[30%]"></div>
    <div class="bg-gray-300 rounded-lg h-40 md:h-64 w-[50%] lg:w-[70%]"></div>
  </div>

  <!-- Konten teks -->
  <div class="grid grid-cols-1 md:grid-cols-3 mt-32 gap-6">
    <div>
      <h3 class="text-xl font-semibold mb-4">Apa itu amaliah finance?</h3>
    </div>
    <div class="md:col-span-2 text-gray-600 text-xs md:text-sm leading-relaxed space-y-3">
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem obcaecati corporis esse doloribus architecto, quibusdam quia voluptatibus illo ducimus iure facilis temporibus sit laboriosam, eius odio voluptates libero vero impedit?
      </p>
      <br>
            <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem obcaecati corporis esse doloribus architecto, quibusdam quia voluptatibus illo ducimus iure facilis temporibus sit laboriosam, eius odio voluptates libero vero impedit?
      </p>
    </div>
  </div>
</section>



<section class="px-6 py-12 md:px-10 md:py-16 bg-white max-w-screen-xl mt-[100px] mx-auto">
  <div class="grid md:grid-cols-3 gap-8 items-start">
    <!-- Kiri: Judul dan deskripsi -->
    <div>
      <h2 class="text-xl font-semibold mb-4">
        kenapa amaliah<br />finance?
      </h2>
      <p class="text-gray-600 text-xs md:text-sm leading-relaxed">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem obcaecati corporis esse doloribus architecto.
      </p>
    </div>

    <!-- Kanan: 4 fitur -->
    <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
      <!-- Item 1 -->
      <div>
        <div class="bg-gray-300 rounded-md h-[300px] mb-4"></div>
        <h3 class="text-sm font-semibold mb-1">memudahkan pembayaran</h3>
        <p class="text-gray-600 text-xs md:text-sm">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem obcaecati corporis esse doloribus architecto.
        </p>
      </div>
      <!-- Item 2 -->
      <div>
        <div class="bg-gray-300 rounded-md h-[300px] mb-4"></div>
        <h3 class="text-sm font-semibold mb-1">memudahkan pembayaran</h3>
        <p class="text-gray-600 text-xs md:text-sm">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem obcaecati corporis esse doloribus architecto.
        </p>
      </div>
      <!-- Item 3 -->
      <div>
        <div class="bg-gray-300 rounded-md h-[300px] mb-4"></div>
        <h3 class="text-sm font-semibold mb-1">memudahkan pembayaran</h3>
        <p class="text-gray-600 text-xs md:text-sm">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem obcaecati corporis esse doloribus architecto.
        </p>
      </div>
      <!-- Item 4 -->
      <div>
        <div class="bg-gray-300 rounded-md h-[300px] mb-4"></div>
        <h3 class="text-sm font-semibold mb-1">memudahkan pembayaran</h3>
        <p class="text-gray-600 text-xs md:text-sm">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem obcaecati corporis esse doloribus architecto.
        </p>
      </div>
    </div>
  </div>
</section>





<section class="px-6 py-12 md:px-10 md:py-16 bg-white max-w-screen-xl mt-[100px] mx-auto">

  <h2 class="text-2xl md:text-3xl font-semibold mb-8">Jenis pembayaran</h2>
 
  <!-- Wrapper scroll horizontal -->
<div class="overflow-x-scroll scrollbar-hide xl:overflow-x-visible " >
  <!-- Kontainer isi item -->
  <div class="grid grid-cols-4 gap-5 w-[1200px] ">
    <!-- Card -->
    <div class="rounded-xl px-6 py-3 shadow-md bg-primary text-black relative grid grid-cols-2 h-[160px] ">
      <div class="flex flex-col space-y-3 z-10">
        <h2 class="text-2xl mt-3">spp</h2>
        <p class="text-[.5rem]">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
      </div>
      <div class="flex flex-col justify-end items-center relative">
        <i class="bi bi-cash-coin text-[110px] text-[#7BED8A] shadow- absolute -translate-x-5 translate-y-7" style="text-shadow: 0px 5px 2px #00000010;"></i>
        <div class="flex items-center justify-center space-x-3 rounded-full bg-white px-3 z-10">
          <p class="text-[.4rem]">bayar Sekarang</p>
          <i class="bi bi-arrow-right-circle-fill text-xl"></i>
        </div>
      </div>
    </div>
    <div class="rounded-xl px-6 py-3 shadow-md bg-primary text-black relative grid grid-cols-2 h-[160px] ">
      <div class="flex flex-col space-y-3 z-10">
        <h2 class="text-2xl mt-3">spp</h2>
        <p class="text-[.5rem]">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
      </div>
      <div class="flex flex-col justify-end items-center relative">
        <i class="bi bi-cash-coin text-[110px] text-[#7BED8A] shadow- absolute -translate-x-5 translate-y-7" style="text-shadow: 0px 5px 2px #00000010;"></i>
        <div class="flex items-center justify-center space-x-3 rounded-full bg-white px-3 z-10">
          <p class="text-[.4rem]">bayar Sekarang</p>
          <i class="bi bi-arrow-right-circle-fill text-xl"></i>
        </div>
      </div>
    </div>
    <div class="rounded-xl px-6 py-3 shadow-md bg-primary text-black relative grid grid-cols-2 h-[160px] ">
      <div class="flex flex-col space-y-3 z-10">
        <h2 class="text-2xl mt-3">spp</h2>
        <p class="text-[.5rem]">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
      </div>
      <div class="flex flex-col justify-end items-center relative">
        <i class="bi bi-cash-coin text-[110px] text-[#7BED8A] shadow- absolute -translate-x-5 translate-y-7" style="text-shadow: 0px 5px 2px #00000010;"></i>
        <div class="flex items-center justify-center space-x-3 rounded-full bg-white px-3 z-10">
          <p class="text-[.4rem]">bayar Sekarang</p>
          <i class="bi bi-arrow-right-circle-fill text-xl"></i>
        </div>
      </div>
    </div>
  </div>
</div>

</section>




<section class="px-6 py-12 md:px-10 md:py-16 bg-white  max-w-screen-xl mt-[100px] mx-auto ">
  <h2 class="text-2xl md:text-3xl font-semibold mb-8">bantuan</h2>

  <div class="grid md:grid-cols-2 gap-8">
    <!-- Video Placeholder -->
    <div class="bg-gray-300 rounded-lg h-[300px] flex items-center justify-center relative">
      <div class=" text-center py-2 px-3 bg-black text-white rounded-full flex items-center justify-center">
        <i class="bi bi-play-fill"></i>
      </div>
    </div>

    <!-- Accordion FAQ -->
    <div class="space-y-2">
      <!-- Accordion Item -->
      <details class="border-b pb-2 cursor-pointer group">
        <summary class="flex justify-between items-center font-medium text-gray-800">
          tidak tahu cara login ?
          <span class="transition-transform group-open:rotate-180">⌄</span>
        </summary>
        <p class="mt-2 text-sm text-gray-600">
          Silakan klik tombol login di kanan atas, masukkan NISN dan password Anda. Jika lupa, hubungi admin.
        </p>
      </details>

      <!-- Duplikat item sesuai kebutuhan -->
      <details class="border-b pb-2 cursor-pointer group">
        <summary class="flex justify-between items-center font-medium text-gray-800">
          tidak tahu cara login ?
          <span class="transition-transform group-open:rotate-180">⌄</span>
        </summary>
        <p class="mt-2 text-sm text-gray-600">
          Penjelasan login kedua.
        </p>
      </details>

      <!-- Tambah lebih banyak FAQ jika perlu -->
    </div>
  </div>
</section>



</x-layout>