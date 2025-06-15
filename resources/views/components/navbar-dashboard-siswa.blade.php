<nav class="flex px-5 2xl:px-20 justify-between py-5 w-full  top-0 z-10">
    <div class="flex space-x-1 items-center">
      <img src="/assets/images/lps.png" alt="" class="h-[30px]">
      <p>amaliah</p>
    </div>
  <a href="">
    <i class="text-lg bi bi-bell"></i>  
  </a>
</nav>
<div class="h-full justify-center items-center fixed top-0 z-10 hidden md:flex">
  <div class="py-20 px-2 flex bg-white shadow-md w-fit border border-[#efefef] rounded-tr-[4rem] rounded-br-[4rem] group  -translate-x-[60%] hover:translate-x-0 duration-100">
    <div class=" flex-col space-y-5 flex">
      <a href="{{ route('siswa.dashboard') }}" class="text-center">
        <i class="text-xl bi bi-house-door"></i>
        <div class=" text-xs">home</div>
      </a>
      <a href="{{ route('siswa.pembayaran.index') }}" class="text-center">
        <i class="text-xl bi bi-cash-stack"></i>
        <div class=" text-xs">tagihan</div>
      </a>
      <a href="{{ route('siswa.riwayat.pembayaran') }}" class="text-center">
        <i class="text-xl bi bi-clock-history"></i>
        <div class=" text-xs">riwayat</div>
      </a>
      <a href="{{ route('siswa.account') }}" class="text-center">
        <i class="text-xl bi bi-person-circle"></i>
        <div class=" text-xs">account</div>
      </a>
    </div>
    <div class=" rounded-full ml-5 mr-2 p-1 shadow bg-gray-300"></div>
  </div>
</div>
    
<nav class="fixed bottom-0 left-0 right-0 bg-white border-t-2 border-[#00000008] z-50 flex justify-around py-2 md:hidden">
  <a href="/siswa/dashboard">
    <i class="text-lg bi bi-house-door"></i>
  </a>
  <a href="/siswa/pembayaran">
    <i class="text-lg bi bi-cash-stack"></i>
  </a>
  <a href="/siswa/riwayat-pembayaran">
    <i class="text-lg bi bi-clock-history"></i>
  </a>
  <a href="/account">
    <i class="text-lg bi bi-person-circle"></i>
  </a>
</nav>