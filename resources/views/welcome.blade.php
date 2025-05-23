<x-allLinks></x-allLinks>


<style>
            .card:nth-child(odd) {
                background-color: #29d847;
            }

            .card:nth-child(even) {
                background: #82f095;
            }
        </style>

<nav class="bg-white px-4 py-3 fixed top-0 left-0 right-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <!-- Logo + Title -->
        <div class="flex items-center space-x-2">
        <img src="/logo.png" alt="Logo" class="w-8 h-8" />
        <span class="text-sm font-medium">smk amaliah</span>
        </div>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex space-x-6 text-sm font-medium">
        <li><a href="#" class="text-black border-b-2 border-green-500">home</a></li>
        <li><a href="#" class="text-black hover:text-green-500">about</a></li>
        <li><a href="#" class="text-black hover:text-green-500">kontak</a></li>
        <li><a href="#" class="text-black hover:text-green-500">bantuan</a></li>
        </ul>

        <!-- Login Button -->
        <div class="hidden md:block">
        <a href="/login" class="bg-green-500 hover:bg-green-600 text-white px-4 py-1 rounded-full text-sm">
            login
        </a>
        </div>

        <!-- Hamburger Button -->
        <div class="md:hidden">
        <button id="toggleSidebar" class="text-gray-700 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
        </div>
    </div>
</nav>

<!-- Mobile Sidebar -->
<div id="mobileSidebarWrapper" class="fixed inset-0 z-50 hidden md:hidden">
<!-- Klik area (sisa celah) -->
    <div id="sidebarGap"
        class="absolute top-0 left-0 h-full w-full bg-black bg-opacity-20">
    </div>

    <!-- Sidebar box -->
    <div id="mobileSidebar"
        class="absolute top-0 right-0 h-full w-[300px] bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out">
        <div class="p-4 flex flex-col space-y-4 pt-20">
        <a href="#" class="text-black hover:text-green-500">home</a>
        <a href="#" class="text-black hover:text-green-500">about</a>
        <a href="#" class="text-black hover:text-green-500">kontak</a>
        <a href="#" class="text-black hover:text-green-500">bantuan</a>
        <a href="#" class="mt-4 bg-green-500 text-white px-4 py-2 rounded-full text-center">login</a>
        </div>
    </div>
</div>


<section class="flex items-center justify-center min-h-screen bg-white">
  <div class="text-center">
    <h1 class="text-2xl sm:text-3xl md:text-4xl font-semibold text-black mb-2">
      Permudah pembayaran Amaliah
    </h1>
    <h2 class="text-xl sm:text-2xl md:text-3xl text-black mb-4">
      Dengan <span class="text-green-400 font-medium">Amaliah Finance</span>
    </h2>
    <p class="text-sm sm:text-base text-gray-600 mb-6">
      amaliah finance adalah sebuah platform digital untuk mempermudah<br />
      pengelolaan dan pembayaran yang ada di smk amaliah
    </p>
    <a href="#"
       class="inline-block bg-green-500 hover:bg-green-600 text-white text-sm px-5 py-2 rounded shadow">
      bayar sekarang &gt;
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
    <div class="bg-gray-300 rounded-lg h-40 md:h-64 w-[30%]"></div>
    <div class="bg-gray-300 rounded-lg h-40 md:h-64 w-[70%]"></div>
  </div>

  <!-- Konten teks -->
  <div class="grid grid-cols-1 md:grid-cols-3 mt-32 gap-6">
    <div>
      <h3 class="text-xl font-semibold mb-4">Apa itu amaliah finance?</h3>
    </div>
    <div class="md:col-span-2 text-gray-600 text-sm leading-relaxed space-y-3">
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
      <h2 class="text-2xl md:text-3xl font-semibold mb-4">
        kenapa amaliah<br />finance?
      </h2>
      <p class="text-gray-600 text-sm leading-relaxed">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem obcaecati corporis esse doloribus architecto.
      </p>
    </div>

    <!-- Kanan: 4 fitur -->
    <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
      <!-- Item 1 -->
      <div>
        <div class="bg-gray-300 rounded-md h-[300px] mb-4"></div>
        <h3 class="text-sm font-semibold mb-1">memudahkan pembayaran</h3>
        <p class="text-gray-600 text-xs">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem obcaecati corporis esse doloribus architecto.
        </p>
      </div>
      <!-- Item 2 -->
      <div>
        <div class="bg-gray-300 rounded-md h-[300px] mb-4"></div>
        <h3 class="text-sm font-semibold mb-1">memudahkan pembayaran</h3>
        <p class="text-gray-600 text-xs">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem obcaecati corporis esse doloribus architecto.
        </p>
      </div>
      <!-- Item 3 -->
      <div>
        <div class="bg-gray-300 rounded-md h-[300px] mb-4"></div>
        <h3 class="text-sm font-semibold mb-1">memudahkan pembayaran</h3>
        <p class="text-gray-600 text-xs">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem obcaecati corporis esse doloribus architecto.
        </p>
      </div>
      <!-- Item 4 -->
      <div>
        <div class="bg-gray-300 rounded-md h-[300px] mb-4"></div>
        <h3 class="text-sm font-semibold mb-1">memudahkan pembayaran</h3>
        <p class="text-gray-600 text-xs">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem obcaecati corporis esse doloribus architecto.
        </p>
      </div>
    </div>
  </div>
</section>





<section class="px-6 py-12 md:px-10 md:py-16 bg-white max-w-screen-xl mt-[100px] mx-auto">
  <h2 class="text-2xl md:text-3xl font-semibold mb-8">Jenis pembayaran</h2>

  <div class="grid grid-cols-1 md:grid-cols-4 gap-6 kontol">
    <!-- Card 1 -->
    <div class=" card rounded-xl px-6 pt-6 pb-3 shadow-md flex flex-col justify-between text-black relative">
      <div class="flex items-center gap-4">
        <i class="bi bi-cash-stack text-[rgba(255,255,255,0.20)] text-[100px] translate-x-[100px] translate-y-[20px] rounded-md absolute"></i>
        <div>
          <h3 class="text-2xl font-bold lowercase mb-2 z-10">spp</h3>
          <p class="text-[8px] w-[100px] z-10">Lorem ipsum dolor sit amet consectetur adipisicing</p>
        </div>
      </div>
      <div class="mt-4 flex justify-end z-10">
        <button class="bg-[#F3F3F3] text-black gap-x-3 py-1 px-2 flex items-center justify-center text-center rounded-full hover:bg-green-100 transition">
            <p class="text-[7px]">Bayar Sekarang</p>
            <div class="flex items-center justify-center bg-white h-[10px] w-[10px] rounded-full text-center">
                <i class="bi bi-arrow-right-short text-[.5rem] "></i>
            </div>
        </button>
      </div>
    </div>
        <div class=" card rounded-xl px-6 pt-6 pb-3 shadow-md flex flex-col justify-between text-black relative">
      <div class="flex items-center gap-4">
        <i class="bi bi-cash-stack text-[rgba(255,255,255,0.20)] text-[100px] translate-x-[100px] translate-y-[20px] rounded-md absolute"></i>
        <div>
          <h3 class="text-2xl font-bold lowercase mb-2 z-10">spp</h3>
          <p class="text-[8px] w-[100px] z-10">Lorem ipsum dolor sit amet consectetur adipisicing</p>
        </div>
      </div>
      <div class="mt-4 flex justify-end z-10">
        <button class="bg-[#F3F3F3] text-black gap-x-3 py-1 px-2 flex items-center justify-center text-center rounded-full hover:bg-green-100 transition">
            <p class="text-[7px]">Bayar Sekarang</p>
            <div class="flex items-center justify-center bg-white h-[10px] w-[10px] rounded-full text-center">
                <i class="bi bi-arrow-right-short text-[.5rem] "></i>
            </div>
        </button>
      </div>
    </div>
        <div class=" card rounded-xl px-6 pt-6 pb-3 shadow-md flex flex-col justify-between text-black relative">
      <div class="flex items-center gap-4">
        <i class="bi bi-cash-stack text-[rgba(255,255,255,0.20)] text-[100px] translate-x-[100px] translate-y-[20px] rounded-md absolute"></i>
        <div>
          <h3 class="text-2xl font-bold lowercase mb-2 z-10">spp</h3>
          <p class="text-[8px] w-[100px] z-10">Lorem ipsum dolor sit amet consectetur adipisicing</p>
        </div>
      </div>
      <div class="mt-4 flex justify-end z-10">
        <button class="bg-[#F3F3F3] text-black gap-x-3 py-1 px-2 flex items-center justify-center text-center rounded-full hover:bg-green-100 transition">
            <p class="text-[7px]">Bayar Sekarang</p>
            <div class="flex items-center justify-center bg-white h-[10px] w-[10px] rounded-full text-center">
                <i class="bi bi-arrow-right-short text-[.5rem] "></i>
            </div>
        </button>
      </div>
    </div>
        <div class=" card rounded-xl px-6 pt-6 pb-3 shadow-md flex flex-col justify-between text-black relative">
      <div class="flex items-center gap-4">
        <i class="bi bi-cash-stack text-[rgba(255,255,255,0.20)] text-[100px] translate-x-[100px] translate-y-[20px] rounded-md absolute"></i>
        <div>
          <h3 class="text-2xl font-bold lowercase mb-2 z-10">spp</h3>
          <p class="text-[8px] w-[100px] z-10">Lorem ipsum dolor sit amet consectetur adipisicing</p>
        </div>
      </div>
      <div class="mt-4 flex justify-end z-10">
        <button class="bg-[#F3F3F3] text-black gap-x-3 py-1 px-2 flex items-center justify-center text-center rounded-full hover:bg-green-100 transition">
            <p class="text-[7px]">Bayar Sekarang</p>
            <div class="flex items-center justify-center bg-white h-[10px] w-[10px] rounded-full text-center">
                <i class="bi bi-arrow-right-short text-[.5rem] "></i>
            </div>
        </button>
      </div>
    </div>

     <div class=" card rounded-xl px-6 pt-6 pb-3 shadow-md flex flex-col justify-between text-black relative">
      <div class="flex items-center gap-4">
        <i class="bi bi-cash-stack text-[rgba(255,255,255,0.20)] text-[100px] translate-x-[100px] translate-y-[20px] rounded-md absolute"></i>
        <div>
          <h3 class="text-2xl font-bold lowercase mb-2 z-10">spp</h3>
          <p class="text-[8px] w-[100px] z-10">Lorem ipsum dolor sit amet consectetur adipisicing</p>
        </div>
      </div>
      <div class="mt-4 flex justify-end z-10">
        <button class="bg-[#F3F3F3] text-black gap-x-3 py-1 px-2 flex items-center justify-center text-center rounded-full hover:bg-green-100 transition">
            <p class="text-[7px]">Bayar Sekarang</p>
            <div class="flex items-center justify-center bg-white h-[10px] w-[10px] rounded-full text-center">
                <i class="bi bi-arrow-right-short text-[.5rem] "></i>
            </div>
        </button>
      </div>
    </div>
     <div class=" card rounded-xl px-6 pt-6 pb-3 shadow-md flex flex-col justify-between text-black relative">
      <div class="flex items-center gap-4">
        <i class="bi bi-cash-stack text-[rgba(255,255,255,0.20)] text-[100px] translate-x-[100px] translate-y-[20px] rounded-md absolute"></i>
        <div>
          <h3 class="text-2xl font-bold lowercase mb-2 z-10">spp</h3>
          <p class="text-[8px] w-[100px] z-10">Lorem ipsum dolor sit amet consectetur adipisicing</p>
        </div>
      </div>
      <div class="mt-4 flex justify-end z-10">
        <button class="bg-[#F3F3F3] text-black gap-x-3 py-1 px-2 flex items-center justify-center text-center rounded-full hover:bg-green-100 transition">
            <p class="text-[7px]">Bayar Sekarang</p>
            <div class="flex items-center justify-center bg-white h-[10px] w-[10px] rounded-full text-center">
                <i class="bi bi-arrow-right-short text-[.5rem] "></i>
            </div>
        </button>
      </div>
    </div>
     <div class=" card rounded-xl px-6 pt-6 pb-3 shadow-md flex flex-col justify-between text-black relative">
      <div class="flex items-center gap-4">
        <i class="bi bi-cash-stack text-[rgba(255,255,255,0.20)] text-[100px] translate-x-[100px] translate-y-[20px] rounded-md absolute"></i>
        <div>
          <h3 class="text-2xl font-bold lowercase mb-2 z-10">spp</h3>
          <p class="text-[8px] w-[100px] z-10">Lorem ipsum dolor sit amet consectetur adipisicing</p>
        </div>
      </div>
      <div class="mt-4 flex justify-end z-10">
        <button class="bg-[#F3F3F3] text-black gap-x-3 py-1 px-2 flex items-center justify-center text-center rounded-full hover:bg-green-100 transition">
            <p class="text-[7px]">Bayar Sekarang</p>
            <div class="flex items-center justify-center bg-white h-[10px] w-[10px] rounded-full text-center">
                <i class="bi bi-arrow-right-short text-[.5rem] "></i>
            </div>
        </button>
      </div>
    </div>
     <div class=" card rounded-xl px-6 pt-6 pb-3 shadow-md flex flex-col justify-between text-black relative">
      <div class="flex items-center gap-4">
        <i class="bi bi-cash-stack text-[rgba(255,255,255,0.20)] text-[100px] translate-x-[100px] translate-y-[20px] rounded-md absolute"></i>
        <div>
          <h3 class="text-2xl font-bold lowercase mb-2 z-10">spp</h3>
          <p class="text-[8px] w-[100px] z-10">Lorem ipsum dolor sit amet consectetur adipisicing</p>
        </div>
      </div>
      <div class="mt-4 flex justify-end z-10">
        <button class="bg-[#F3F3F3] text-black gap-x-3 py-1 px-2 flex items-center justify-center text-center rounded-full hover:bg-green-100 transition">
            <p class="text-[7px]">Bayar Sekarang</p>
            <div class="flex items-center justify-center bg-white h-[10px] w-[10px] rounded-full text-center">
                <i class="bi bi-arrow-right-short text-[.5rem] "></i>
            </div>
        </button>
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




<!-- ====== Footer Section Start -->
  <footer class="relative z-10 bg-green-600 pb-10 pt-20 lg:pb-20 lg:pt-[120px] mt-[200px] dark:bg-dark">
    <div class="container mx-auto">
      <div class="-mx-4 flex flex-wrap">
        <div class="w-full px-4 sm:w-2/3 lg:w-3/12">
          <div class="mb-10 w-full">
            <a href="javascript:void(0)" class="mb-6 inline-block max-w-[160px]">
              <img src="https://cdn.tailgrids.com/assets/images/logo/logo.svg" alt="logo" class="max-w-full dark:hidden" />
              <img src="https://cdn.tailgrids.com/assets/images/logo/logo-white.svg" alt="logo" class="hidden max-w-full dark:block" />
            </a>
            <p class="mb-7 text-base text-body-color dark:text-dark-6">
              Sed ut perspiciatis undmnis is iste natus error sit amet
              voluptatem totam rem aperiam.
            </p>
            <p class="flex items-center text-sm font-medium text-dark dark:text-white">
              <span class="mr-3 text-primary">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_941_15626)">
                    <path
                      d="M15.1875 19.4688C14.3438 19.4688 13.375 19.25 12.3125 18.8438C10.1875 18 7.84377 16.375 5.75002 14.2813C3.65627 12.1875 2.03127 9.84377 1.18752 7.68752C0.250019 5.37502 0.343769 3.46877 1.43752 2.40627C1.46877 2.37502 1.53127 2.34377 1.56252 2.31252L4.18752 0.750025C4.84377 0.375025 5.68752 0.562525 6.12502 1.18752L7.96877 3.93753C8.40627 4.59378 8.21877 5.46877 7.59377 5.90627L6.46877 6.68752C7.28127 8.00002 9.59377 11.2188 13.2813 13.5313L13.9688 12.5313C14.5 11.7813 15.3438 11.5625 16.0313 12.0313L18.7813 13.875C19.4063 14.3125 19.5938 15.1563 19.2188 15.8125L17.6563 18.4375C17.625 18.5 17.5938 18.5313 17.5625 18.5625C17 19.1563 16.1875 19.4688 15.1875 19.4688ZM2.37502 3.46878C1.78127 4.12503 1.81252 5.46877 2.50002 7.18752C3.28127 9.15627 4.78127 11.3125 6.75002 13.2813C8.68752 15.2188 10.875 16.7188 12.8125 17.5C14.5 18.1875 15.8438 18.2188 16.5313 17.625L18.0313 15.0625C18.0313 15.0313 18.0313 15.0313 18.0313 15L15.2813 13.1563C15.2813 13.1563 15.2188 13.1875 15.1563 13.2813L14.4688 14.2813C14.0313 14.9063 13.1875 15.0938 12.5625 14.6875C8.62502 12.25 6.18752 8.84377 5.31252 7.46877C4.90627 6.81252 5.06252 5.96878 5.68752 5.53128L6.81252 4.75002V4.71878L4.96877 1.96877C4.96877 1.93752 4.93752 1.93752 4.90627 1.96877L2.37502 3.46878Z"
                      fill="currentColor" />
                    <path
                      d="M18.3125 8.90633C17.9375 8.90633 17.6563 8.62508 17.625 8.25008C17.375 5.09383 14.7813 2.56258 11.5938 2.34383C11.2188 2.31258 10.9063 2.00008 10.9375 1.59383C10.9688 1.21883 11.2813 0.906333 11.6875 0.937583C15.5625 1.18758 18.7188 4.25008 19.0313 8.12508C19.0625 8.50008 18.7813 8.84383 18.375 8.87508C18.375 8.90633 18.3438 8.90633 18.3125 8.90633Z"
                      fill="currentColor" />
                    <path
                      d="M15.2187 9.18755C14.875 9.18755 14.5625 8.93755 14.5312 8.56255C14.3437 6.87505 13.0312 5.56255 11.3437 5.3438C10.9687 5.31255 10.6875 4.93755 10.7187 4.56255C10.75 4.18755 11.125 3.9063 11.5 3.93755C13.8437 4.2188 15.6562 6.0313 15.9375 8.37505C15.9687 8.75005 15.7187 9.0938 15.3125 9.1563C15.25 9.18755 15.2187 9.18755 15.2187 9.18755Z"
                      fill="currentColor" />
                  </g>
                  <defs>
                    <clipPath id="clip0_941_15626">
                      <rect width="20" height="20" fill="white" />
                    </clipPath>
                  </defs>
                </svg>
              </span>
              <span>+012 (345) 678 99</span>
            </p>
          </div>
        </div>
        <div class="w-full px-4 sm:w-1/2 lg:w-2/12">
          <div class="mb-10 w-full">
            <h4 class="mb-9 text-lg font-semibold text-dark dark:text-white">
              Resources
            </h4>
<!-- Form Kirim Pesan -->
<form class="max-w-lg mx-auto space-y-2">
  <!-- Nama -->
  <div>
    <label for="name" class="block text-sm font-medium text-gray-700">
      Nama
    </label>
    <input
      id="name"
      name="name"
      type="text"
      placeholder="Masukkan nama"
      class="w-full border border-gray-300 rounded-md px-5 bg-transparent text-black  py-1
             focus:outline-none focus:border-blue-500" />
  </div>

  <!-- Email -->
  <div>
    <label for="email" class="block text-sm font-medium text-gray-700">
      Email
    </label>
    <input
      id="email"
      name="email"
      type="email"
      placeholder="Masukkan email"
      class="w-full border border-gray-300 rounded-md px-5 bg-transparent text-black  py-1
             focus:outline-none focus:border-blue-500" />
  </div>

  <!-- Pesan -->
  <div>
    <label for="message" class="block text-sm font-medium text-gray-700">
      Pesan
    </label>
    <textarea
      id="message"
      name="message"
      rows="5"
      placeholder="Tulis pesan..."
      class="w-full border border-gray-300 rounded-md px-5 bg-transparent text-black  py-1
             focus:outline-none focus:border-blue-500 resize-none"></textarea>
  </div>

  <!-- Tombol Kirim -->
  <div class="text-right">
    <button
      type="submit"
      class="inline-block border border-blue-500 text-blue-500
             px-6 py-2 rounded-md hover:bg-blue-50 transition">
      Kirim
    </button>
  </div>
</form>


          </div>
        </div>
        <div class="w-full px-4 sm:w-1/2 lg:w-2/12">
          <div class="mb-10 w-full">
            <h4 class="mb-9 text-lg font-semibold text-dark dark:text-white">
              Company
            </h4>
            <ul class="space-y-3">
              <li>
                <a href="javascript:void(0)"
                  class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                  About TailGrids
                </a>
              </li>
              <li>
                <a href="javascript:void(0)"
                  class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                  Contact & Support
                </a>
              </li>
              <li>
                <a href="javascript:void(0)"
                  class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                  Success History
                </a>
              </li>
              <li>
                <a href="javascript:void(0)"
                  class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                  Setting & Privacy
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="w-full px-4 sm:w-1/2 lg:w-2/12">
          <div class="mb-10 w-full">
            <h4 class="mb-9 text-lg font-semibold text-dark dark:text-white">
              Quick Links
            </h4>
            <ul class="space-y-3">
              <li>
                <a href="javascript:void(0)"
                  class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                  Premium Support
                </a>
              </li>
              <li>
                <a href="javascript:void(0)"
                  class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                  Our Services
                </a>
              </li>
              <li>
                <a href="javascript:void(0)"
                  class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                  Know Our Team
                </a>
              </li>
              <li>
                <a href="javascript:void(0)"
                  class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                  Download App
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="w-full px-4 sm:w-1/2 lg:w-3/12">
          <div class="mb-10 w-full">
            <h4 class="mb-9 text-lg font-semibold text-dark dark:text-white">
              Follow Us On
            </h4>
            <div class="mb-6 flex items-center">
              <a href="javascript:void(0)"
                class="mr-3 flex h-8 w-8 items-center justify-center rounded-full border border-stroke text-dark hover:border-primary hover:bg-primary hover:text-white sm:mr-4 lg:mr-3 xl:mr-4 dark:border-dark-3 dark:text-white dark:hover:border-primary">
                <svg width="8" height="16" viewBox="0 0 8 16" class="fill-current">
                  <path
                    d="M7.43902 6.4H6.19918H5.75639V5.88387V4.28387V3.76774H6.19918H7.12906C7.3726 3.76774 7.57186 3.56129 7.57186 3.25161V0.516129C7.57186 0.232258 7.39474 0 7.12906 0H5.51285C3.76379 0 2.54609 1.44516 2.54609 3.5871V5.83226V6.34839H2.10329H0.597778C0.287819 6.34839 0 6.63226 0 7.04516V8.90323C0 9.26452 0.243539 9.6 0.597778 9.6H2.05902H2.50181V10.1161V15.3032C2.50181 15.6645 2.74535 16 3.09959 16H5.18075C5.31359 16 5.42429 15.9226 5.51285 15.8194C5.60141 15.7161 5.66783 15.5355 5.66783 15.3806V10.1419V9.62581H6.13276H7.12906C7.41688 9.62581 7.63828 9.41935 7.68256 9.10968V9.08387V9.05806L7.99252 7.27742C8.01466 7.09677 7.99252 6.89032 7.85968 6.68387C7.8154 6.55484 7.61614 6.42581 7.43902 6.4Z" />
                </svg>
              </a>
              <a href="javascript:void(0)"
                class="mr-3 flex h-8 w-8 items-center justify-center rounded-full border border-stroke text-dark hover:border-primary hover:bg-primary hover:text-white sm:mr-4 lg:mr-3 xl:mr-4 dark:border-dark-3 dark:text-white dark:hover:border-primary">
                <svg width="16" height="12" viewBox="0 0 16 12" class="fill-current">
                  <path
                    d="M14.2194 2.06654L15.2 0.939335C15.4839 0.634051 15.5613 0.399217 15.5871 0.2818C14.8129 0.704501 14.0903 0.845401 13.6258 0.845401H13.4452L13.3419 0.751468C12.7226 0.258317 11.9484 0 11.1226 0C9.31613 0 7.89677 1.36204 7.89677 2.93542C7.89677 3.02935 7.89677 3.17025 7.92258 3.26419L8 3.73386L7.45806 3.71037C4.15484 3.61644 1.44516 1.03327 1.00645 0.587084C0.283871 1.76125 0.696774 2.88845 1.13548 3.59296L2.0129 4.90802L0.619355 4.20352C0.645161 5.18982 1.05806 5.96477 1.85806 6.52838L2.55484 6.99804L1.85806 7.25636C2.29677 8.45401 3.27742 8.94716 4 9.13503L4.95484 9.36986L4.05161 9.93346C2.60645 10.8728 0.8 10.8024 0 10.7319C1.62581 11.7652 3.56129 12 4.90323 12C5.90968 12 6.65806 11.9061 6.83871 11.8356C14.0645 10.2857 14.4 4.41487 14.4 3.2407V3.07632L14.5548 2.98239C15.4323 2.23092 15.7935 1.8317 16 1.59687C15.9226 1.62035 15.8194 1.66732 15.7161 1.6908L14.2194 2.06654Z" />
                </svg>
              </a>
              <a href="javascript:void(0)"
                class="mr-3 flex h-8 w-8 items-center justify-center rounded-full border border-stroke text-dark hover:border-primary hover:bg-primary hover:text-white sm:mr-4 lg:mr-3 xl:mr-4 dark:border-dark-3 dark:text-white dark:hover:border-primary">
                <svg width="16" height="12" viewBox="0 0 16 12" class="fill-current">
                  <path
                    d="M15.6645 1.88018C15.4839 1.13364 14.9419 0.552995 14.2452 0.359447C13.0065 6.59222e-08 8 0 8 0C8 0 2.99355 6.59222e-08 1.75484 0.359447C1.05806 0.552995 0.516129 1.13364 0.335484 1.88018C0 3.23502 0 6 0 6C0 6 0 8.79263 0.335484 10.1198C0.516129 10.8664 1.05806 11.447 1.75484 11.6406C2.99355 12 8 12 8 12C8 12 13.0065 12 14.2452 11.6406C14.9419 11.447 15.4839 10.8664 15.6645 10.1198C16 8.79263 16 6 16 6C16 6 16 3.23502 15.6645 1.88018ZM6.4 8.57143V3.42857L10.5548 6L6.4 8.57143Z" />
                </svg>
              </a>
              <a href="javascript:void(0)"
                class="mr-3 flex h-8 w-8 items-center justify-center rounded-full border border-stroke text-dark hover:border-primary hover:bg-primary hover:text-white sm:mr-4 lg:mr-3 xl:mr-4 dark:border-dark-3 dark:text-white dark:hover:border-primary">
                <svg width="14" height="14" viewBox="0 0 14 14" class="fill-current">
                  <path
                    d="M13.0214 0H1.02084C0.453707 0 0 0.451613 0 1.01613V12.9839C0 13.5258 0.453707 14 1.02084 14H12.976C13.5432 14 13.9969 13.5484 13.9969 12.9839V0.993548C14.0422 0.451613 13.5885 0 13.0214 0ZM4.15142 11.9H2.08705V5.23871H4.15142V11.9ZM3.10789 4.3129C2.42733 4.3129 1.90557 3.77097 1.90557 3.11613C1.90557 2.46129 2.45002 1.91935 3.10789 1.91935C3.76577 1.91935 4.31022 2.46129 4.31022 3.11613C4.31022 3.77097 3.81114 4.3129 3.10789 4.3129ZM11.9779 11.9H9.9135V8.67097C9.9135 7.90323 9.89082 6.8871 8.82461 6.8871C7.73571 6.8871 7.57691 7.74516 7.57691 8.60323V11.9H5.51254V5.23871H7.53154V6.16452H7.55423C7.84914 5.62258 8.50701 5.08065 9.52785 5.08065C11.6376 5.08065 12.0232 6.43548 12.0232 8.2871V11.9H11.9779Z" />
                </svg>
              </a>
            </div>
            <p class="text-base text-body-color dark:text-dark-6">
              &copy; 2025 TailGrids
            </p>
          </div>
        </div>
      </div>
    </div>

    <div>
      <span class="absolute bottom-0 left-0 z-[-1]">
        <svg width="217" height="229" viewBox="0 0 217 229" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M-64 140.5C-64 62.904 -1.096 1.90666e-05 76.5 1.22829e-05C154.096 5.49924e-06 217 62.904 217 140.5C217 218.096 154.096 281 76.5 281C-1.09598 281 -64 218.096 -64 140.5Z"
            fill="url(#paint0_linear_1179_5)" />
          <defs>
            <linearGradient id="paint0_linear_1179_5" x1="76.5" y1="281" x2="76.5" y2="1.22829e-05"
              gradientUnits="userSpaceOnUse">
              <stop stop-color="#3056D3" stop-opacity="0.08" />
              <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
            </linearGradient>
          </defs>
        </svg>
      </span>
      <span class="absolute right-10 top-10 z-[-1]">
        <svg width="75" height="75" viewBox="0 0 75 75" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M37.5 -1.63918e-06C58.2107 -2.54447e-06 75 16.7893 75 37.5C75 58.2107 58.2107 75 37.5 75C16.7893 75 -7.33885e-07 58.2107 -1.63918e-06 37.5C-2.54447e-06 16.7893 16.7893 -7.33885e-07 37.5 -1.63918e-06Z"
            fill="url(#paint0_linear_1179_4)" />
          <defs>
            <linearGradient id="paint0_linear_1179_4" x1="-1.63917e-06" y1="37.5" x2="75" y2="37.5"
              gradientUnits="userSpaceOnUse">
              <stop stop-color="#13C296" stop-opacity="0.31" />
              <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
            </linearGradient>
          </defs>
        </svg>
      </span>
    </div>
  </footer>
  <!-- ====== Footer Section End -->