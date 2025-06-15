<x-layout>
<nav x-data="{open: false}" class=" px-4 py-3 fixed top-0 left-0 right-0 z-40 duration-300 bg-transparent shadow-none mb-20">
    <div class="max-w-7xl mx-auto flex justify-between items-center text-text">
        <div class="flex items-center space-x-2">
        <img src="assets/images/lps.png" alt="Logo" class="h-[50px]" />
        <span class="text-lg font-medium">Smk Amaliah </span>
        </div>
        <ul class="hidden md:flex space-x-6 text-sm font-medium">
        <li><a id="navbar" href="#home" class=" border-b-2 border-green-500 hover:border-b-2">home</a></li>
        <li><a id="navbar" href="#about" class=" border-b-0 border-green-500 hover:border-b-2">about</a></li>
        <li><a id="navbar" href="#produk" class=" border-b-0 border-green-500 hover:border-b-2">bayar</a></li>
        <li><a id="navbar" href="#help" class=" border-b-0 border-green-500 hover:border-b-2">bantuan</a></li>
        </ul>
        <div class="hidden md:block">
        <a href="/login" class=" border-2 hover:bg-[#29d847]  px-4 py-1 rounded-full text-sm">
            login <i class="bi bi-box-arrow-in-right"></i>
        </a>
        </div>
        <div class="md:hidden">
        <button @click="open = !open" class=" focus:outline-none">
            <i class="bi bi-list text-3xl"></i>
        </button>
        </div>
    </div>
    <div x-show="open" class="fixed inset-0 z-50 text-text">
        <div @click="open = !open" 
            class="absolute top-0 left-0 h-full w-full bg-black bg-opacity-20 ">
        </div>
        <div x-show="open"
        x-transition:enter=" translate-x-full"
        x-transition:leave=" translate-x-full" class="absolute top-0 right-0 h-full w-[300px] bg-white shadow-lg  duration-300 ">
            <div class="p-4 flex flex-col space-y-10 pt-5">
                <i @click="open = !open"  class="bi bi-x-circle text-right text-2xl cursor-pointer"></i>
                <div class="space-y-3 flex flex-col">
                    <a @click="open = !open" id="sidebar" href="#home" class="py-2 px-3 rounded-md bg-primary">home</a>
                    <a @click="open = !open" id="sidebar" href="#about" class="py-2 px-3 rounded-md bg-none ">about</a>
                    <a @click="open = !open" id="sidebar" href="#produk" class="py-2 px-3 rounded-md bg-none ">bayar</a>
                    <a @click="open = !open" id="sidebar" href="#help" class="py-2 px-3 rounded-md bg-none ">bantuan</a>
                </div>
                <div class="w-full text-center">
                    <i class="bi bi-info-circle text-4xl"></i>
                    <p class="text-sm">mohon login terlebih dahulu untuk bisa membayar</p>
                </div>
                <a href="/login" class="bg-green-500 text-white px-4 py-2 rounded-full text-center">login</a>
            </div>
        </div>
    </div>
</nav> 
<section id="home" class="page flex items-center justify-center px-2 pt-20 min-h-screen bg-white">
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
      <a href="/login"
      class="flex items-center gap-x-2 justify-center w-fit  text-sm px-5 py-1 rounded-full shadow bg-primary hover:bg-green-500">
      <p>Bayar Sekarang</p>
      <i class="bi bi-arrow-right-circle-fill text-xl "></i>
      </a>
  </div>
</section>
<section id="about" class="page px-6 py-12 md:px-10 md:py-16 bg-white max-w-screen-xl pt-20 mx-auto">
  <h2 class="text-2xl md:text-3xl font-bold mb-5  decoration-blue-5000 mt-10">
    Tentang Amaliah Finance
  </h2>
  <div class="flex flex-col lg:flex-row  gap-4 mb-10">
    <img src="https://smkamaliah.sch.id/wp-content/uploads/slider/cache/4f3bc4a463046d9696d5ad4d19410ef6/Picture12.png" class="rounded-lg h-40 md:h-64 w-[50%] lg:w-[30%]"></img>
    <img src="assets/images/gerbang.png" class="rounded-lg h-40 md:h-64 lg:w-[70%]"></img>
  </div>
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
    <div>
      <h2 class="text-xl font-semibold mb-4">
        kenapa amaliah<br />finance?
      </h2>
      <p class="text-gray-600 text-xs md:text-sm leading-relaxed">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem obcaecati corporis esse doloribus architecto.
      </p>
    </div>
    <div class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
      <div>
        <div class="bg-gray-300 rounded-md h-[300px] mb-4" style="background: url('https://smkamaliah.sch.id/wp-content/uploads/2023/03/Picture11-1170x658.png'); background-position: center; background-size: cover"></div>
        <h3 class="text-sm font-semibold mb-1">memudahkan pembayaran</h3>
        <p class="text-gray-600 text-xs md:text-sm">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem obcaecati corporis esse doloribus architecto.
        </p>
      </div>
      <div>
        <div class="bg-gray-300 rounded-md h-[300px] mb-4" style="background: url('https://i.pinimg.com/736x/b6/f1/91/b6f1919194d0e28760adb97b1f3ee068.jpg'); background-position: center; background-size: cover"></div>
        <h3 class="text-sm font-semibold mb-1">memudahkan pembayaran</h3>
        <p class="text-gray-600 text-xs md:text-sm">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem obcaecati corporis esse doloribus architecto.
        </p>
      </div>
      <div>
        <div class="bg-gray-300 rounded-md h-[300px] mb-4" style="background: url('https://i.pinimg.com/736x/95/5d/45/955d4559685f05eaf11a401fe92145ed.jpg'); background-position: center; background-size: cover"></div>
        <h3 class="text-sm font-semibold mb-1">memudahkan pembayaran</h3>
        <p class="text-gray-600 text-xs md:text-sm">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem obcaecati corporis esse doloribus architecto.
        </p>
      </div>
      <div>
        <div class="bg-gray-300 rounded-md h-[300px] mb-4" style="background: url('https://i.pinimg.com/736x/1d/15/d0/1d15d006862c8ca7eae68c8fcf57359f.jpg'); background-position: center; background-size: cover"></div>
        <h3 class="text-sm font-semibold mb-1">memudahkan pembayaran</h3>
        <p class="text-gray-600 text-xs md:text-sm">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem obcaecati corporis esse doloribus architecto.
        </p>
      </div>
    </div>
  </div>
</section>
<section id="produk" class="page px-6 py-12 md:px-10 md:py-16 bg-white max-w-screen-xl mt-[100px] mx-auto">
  <h2 class="text-2xl md:text-3xl font-semibold mb-8 mt-10">Jenis pembayaran</h2>
  <div class="overflow-x-scroll scrollbar-hide xl:overflow-x-visible " >
    <div class="grid grid-cols-4 gap-5 w-[1200px] ">
      <div class="rounded-xl px-6 py-3 shadow-md odd:bg-primary even:bg-secondary text-black relative grid grid-cols-2 h-[160px] ">
        <div class="flex flex-col space-y-3 z-10">
          <h2 class="text-2xl mt-3 capitalize font-semibold text-text">spp</h2>
          <p class="text-[.5rem]">bayar spp bulanan dari januari hingga desember</p>
        </div>
        <div class="flex flex-col justify-end items-center relative">
          <i class="bi bi-cash-coin text-[110px] text-[#ffffff33] absolute -translate-x-5 translate-y-7" style="text-shadow: 0px 5px 2px #00000010;"></i>
          <a href="/login" class="z-10">
            <div class="flex items-center justify-center space-x-3 rounded-full bg-white px-3 z-10">
              <p class="text-[.4rem]">bayar Sekarang</p>
              <i class="bi bi-arrow-right-circle-fill text-xl"></i>
            </div>
          
          </a>
        </div>
      </div>
      <div class="rounded-xl px-6 py-3 shadow-md odd:bg-primary even:bg-secondary text-black relative grid grid-cols-2 h-[160px] ">
        <div class="flex flex-col space-y-3 z-10">
          <h2 class="text-2xl mt-3 capitalize font-semibold text-text">Dsp</h2>
          <p class="text-[.5rem]">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="flex flex-col justify-end items-center relative">
          <i class="bi bi-coin text-[110px] text-[#ffffff33]  absolute -translate-x-5 translate-y-7" style="text-shadow: 0px 5px 2px #00000010;"></i>
          <a href="/login" class="z-10">
            <div class="flex items-center justify-center space-x-3 rounded-full bg-white px-3 z-10">
              <p class="text-[.4rem]">bayar Sekarang</p>
              <i class="bi bi-arrow-right-circle-fill text-xl"></i>
            </div>
          
          </a>
        </div>
      </div>
      <div class="rounded-xl px-6 py-3 shadow-md odd:bg-primary even:bg-secondary text-black relative grid grid-cols-2 h-[160px] ">
        <div class="flex flex-col space-y-3 z-10">
          <h2 class="text-2xl mt-3 capitalize font-semibold text-text">pkl</h2>
          <p class="text-[.5rem]">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="flex flex-col justify-end items-center relative">
          <i class="bi bi-briefcase-fill text-[110px] text-[#ffffff33]  absolute -translate-x-5 translate-y-7" style="text-shadow: 0px 5px 2px #00000010;"></i>
          <a href="/login" class="z-10">
            <div class="flex items-center justify-center space-x-3 rounded-full bg-white px-3 z-10">
              <p class="text-[.4rem]">bayar Sekarang</p>
              <i class="bi bi-arrow-right-circle-fill text-xl"></i>
            </div>
          
          </a>
        </div>
      </div>
      <div class="rounded-xl px-6 py-3 shadow-md odd:bg-primary even:bg-secondary text-black relative grid grid-cols-2 h-[160px] ">
        <div class="flex flex-col space-y-3 z-10">
          <h2 class="text-2xl mt-3 capitalize font-semibold text-text">ulangan</h2>
          <p class="text-[.5rem]">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="flex flex-col justify-end items-center relative">
          <i class="bi bi-clipboard2-minus-fill text-[110px] text-[#ffffff33]  absolute -translate-x-5 translate-y-7" style="text-shadow: 0px 5px 2px #00000010;"></i>
          <a href="/login" class="z-10">
            <div class="flex items-center justify-center space-x-3 rounded-full bg-white px-3 z-10">
              <p class="text-[.4rem]">bayar Sekarang</p>
              <i class="bi bi-arrow-right-circle-fill text-xl"></i>
            </div>
          </a>
        </div>
      </div>
      <div class="rounded-xl px-6 py-3 shadow-md odd:bg-primary even:bg-secondary text-black relative grid grid-cols-2 h-[160px] ">
        <div class="flex flex-col space-y-3 z-10">
          <h2 class="text-2xl mt-3 capitalize font-semibold text-text">ulangan</h2>
          <p class="text-[.5rem]">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="flex flex-col justify-end items-center relative">
          <i class="bi bi-mortarboard-fill text-[110px] text-[#ffffff33]  absolute -translate-x-5 translate-y-7" style="text-shadow: 0px 5px 2px #00000010;"></i>
          <a href="/login" class="z-10">
            <div class="flex items-center justify-center space-x-3 rounded-full bg-white px-3 z-10">
              <p class="text-[.4rem]">bayar Sekarang</p>
              <i class="bi bi-arrow-right-circle-fill text-xl"></i>
            </div>
          </a>
        </div>
      </div>
      <div class="rounded-xl px-6 py-3 shadow-md odd:bg-primary even:bg-secondary text-black relative grid grid-cols-2 h-[160px] ">
        <div class="flex flex-col space-y-3 z-10">
          <h2 class="text-2xl mt-3 capitalize font-semibold text-text">buku paket</h2>
          <p class="text-[.5rem]">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="flex flex-col justify-end items-center relative">
          <i class="bi bi-book-fill text-[110px] text-[#ffffff33]  absolute -translate-x-5 translate-y-7" style="text-shadow: 0px 5px 2px #00000010;"></i>
          <a href="/login" class="z-10">
            <div class="flex items-center justify-center space-x-3 rounded-full bg-white px-3 z-10">
              <p class="text-[.4rem]">bayar Sekarang</p>
              <i class="bi bi-arrow-right-circle-fill text-xl"></i>
            </div>
          </a>
        </div>
      </div>
      <div class="rounded-xl px-6 py-3 shadow-md odd:bg-primary even:bg-secondary text-black relative grid grid-cols-2 h-[160px] ">
        <div class="flex flex-col space-y-3 z-10">
          <h2 class="text-2xl mt-3 capitalize font-semibold text-text">kegiatan</h2>
          <p class="text-[.5rem]">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="flex flex-col justify-end items-center relative">
          <i class="bi bi-calendar-event-fill text-[110px] text-[#ffffff33]  absolute -translate-x-5 translate-y-7" style="text-shadow: 0px 5px 2px #00000010;"></i>
          <a href="/login" class="z-10">
            <div class="flex items-center justify-center space-x-3 rounded-full bg-white px-3 z-10">
              <p class="text-[.4rem]">bayar Sekarang</p>
              <i class="bi bi-arrow-right-circle-fill text-xl"></i>
            </div>
          </a>
        </div>
      </div>
      <div class="rounded-xl px-6 py-3 shadow-md odd:bg-primary even:bg-secondary text-black relative grid grid-cols-2 h-[160px] ">
        <div class="flex flex-col space-y-3 z-10">
          <h2 class="text-2xl mt-3 capitalize font-semibold text-text">sts</h2>
          <p class="text-[.5rem]">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="flex flex-col justify-end items-center relative">
          <i class="bi bi-file-check-fill text-[110px] text-[#ffffff33]  absolute -translate-x-5 translate-y-7" style="text-shadow: 0px 5px 2px #00000010;"></i>
          <a href="/login" class="z-10">
            <div class="flex items-center justify-center space-x-3 rounded-full bg-white px-3 z-10">
              <p class="text-[.4rem]">bayar Sekarang</p>
              <i class="bi bi-arrow-right-circle-fill text-xl"></i>
            </div>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>
<section id="help" class="page px-6 py-12 md:px-10 md:py-16 bg-white  max-w-screen-xl mt-[100px] mx-auto ">
  <h2 class="text-2xl md:text-3xl font-semibold mb-8 mt-10">bantuan</h2>
  <div class="grid md:grid-cols-2 gap-8">
    <video height="300" controls class="rounded-lg video flex items-center justify-center">
      <source src="" type="video/mp4" />
      Your browser does not support the video tag.
    </video>
    <div class="space-y-2">
      <details class="border-b pb-2 cursor-pointer group">
        <summary class="flex justify-between items-center font-medium text-gray-800 btn-video">
          tidak tahu cara login ?
          <span class="transition-transform group-open:rotate-180"><i class="bi bi-chevron-down"></i></span>
        </summary>
        <p class="mt-2 text-sm text-gray-600">
          Silakan klik tombol login di kanan atas, masukkan NISN dan password Anda. Jika lupa, hubungi admin.
        </p>
      </details>

      <details class="border-b pb-2 cursor-pointer group">
        <summary class="flex justify-between items-center font-medium text-gray-800">
          tidak tahu cara login ?
          <span class="transition-transform group-open:rotate-180"><i class="bi bi-chevron-down"></i></span>
        </summary>
        <p class="mt-2 text-sm text-gray-600">
          Penjelasan login kedua.
        </p>
      </details>
    </div>
  </div>
</section>
<x-footer></x-footer>
</x-layout>

