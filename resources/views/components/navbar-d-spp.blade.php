<nav class="text-tirddary bg-transparent navbar w-full fixed top-0 overflow-hidden nav-parent duration-500">
  <div class="absolute flex justify-center left-0 w-full overflow-hidden -z-50">
    <div class="hidden animate-none anim-bg-navbar bg-primary w-1 h-32"></div>
  </div>
  <div class="flex flex-wrap items-center justify-between mx-auto p-4">
    <div class="flex items-center justify-center ">
      <img src="assets/images/logo.png" alt="" class="h-14 mr-2">
      <p>SMK AMALIAH 1&2 CIAWI</p>
    </div>
    <button  class="flex w-10 md:hidden text-[2rem]" type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
      <i class='bx bx-menu-alt-right' ></i>
    </button>
    
    <form class="max-w-md">   
      <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
      <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
          </div>
          <input type="search" id="default-search" class="block w-[28rem] p-4 ps-10 text-sm text-primary border border-gray-300 rounded-lg placeholder-primary focus:ring-primary focus:border-primary" placeholder="Search Mockups, Logos..." required />
          <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-primary focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm px-4 py-2 ">Search</button>
      </div>
    </form>

    <div class="items-center justify-center gap-5 hidden md:flex">
      @if (Route::has('login'))
      @auth
          <i @click="openCart = true" class="bx bx-cart text-[2rem] cursor-pointer"></i>
          <a class="block " href="{{ url(Auth::user()->role . (Auth::user()->role == 'siswa' ? '/' . Auth::user()->kelas : '') . '/dashboard') }}">Dashboard</a>
      @else
          <i @click="openCart = true" class="bx bx-cart text-[2rem] cursor-pointer"></i>
          <a class="lr block bg-primary border-[1px] p-3 rounded-full border-primary text-secondary" href="{{ route('login') }}"><i class="bx bx-user"></i></a>
      @endauth
      @endif
    </div>
  </div>
</nav>

  
{{-- // iyee navbar buat ukuran hape ke tablet // --}}
<div id="drawer-navigation" class="fixed top-0 left-0 z-50 h-screen p-4 overflow-y-auto transition-transform -translate-x-full  w-64 bg-primary text-secondary" tabindex="-1" aria-labelledby="drawer-navigation-label">
   <h5 id="drawer-navigation-label" class="text-base font-semibold  uppercase">Menu</h5>
   <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class=" bg-transparent hover:bg-opacity-50 rounded-lg w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center" >
    x
     <span class="sr-only">Close menu</span>
  </button>
 <div class="py-4 overflow-y-auto">

  @if (Route::has('login'))
  @auth
  <ul class="space-y-2 font-medium">
    <li>
       <a href="#" class="flex items-center p-2 hover:bg-secondary hover:text-tirddary rounded-sm focus:bg-secondary focus:text-tirddary">
          <span class="ms-3">Dashboard</span>
       </a>
    </li>
    <li>
       <button type="button" class="flex items-center w-full p-2  transition duration-75 group hover:bg-secondary hover:text-tirddary rounded-sm focus:bg-secondary focus:text-tirddary" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
       </button>
       <ul id="dropdown-example" class="hidden py-2 space-y-2">
             <li>
                <a href="#" class="flex items-center w-full p-2 hover:bg-secondary hover:text-tirddary fo">Products</a>
             </li>
             <li>
                <a href="#" class="flex items-center w-full p-2 hover:bg-secondary hover:text-tirddary">Billing</a>
             </li>
             <li>
                <a href="#" class="flex items-center w-full p-2 hover:bg-secondary hover:text-tirddary">Invoice</a>
             </li>
       </ul>
    </li>
 </ul>
      <li class=""><a class="" href="{{ url(Auth::user()->role . (Auth::user()->role == 'siswa' ? '/' . Auth::user()->kelas : '') . '/dashboard') }}">Dashboard</a></li>
  @else
  <div id="nav-btn" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="flex items-center p-2 hover:bg-secondary hover:text-tirddary rounded-sm focus:bg-secondary focus:text-tirddary">
    <span class="ms-3">home</span>
  </div>
 <div id="nav-btn" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="flex items-center p-2 hover:bg-secondary hover:text-tirddary rounded-sm focus:bg-secondary focus:text-tirddary">
  <span class="ms-3">about</span>
 </div>
<div id="nav-btn" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="flex items-center p-2 hover:bg-secondary hover:text-tirddary rounded-sm focus:bg-secondary focus:text-tirddary">
  <span class="ms-3">help</span>
</div>
  <div class="flex items-center justify-center flex-col w-full mt-10 gap-3">

    <i class='bx bx-info-circle text-[4rem] text-secondary'></i>
    <p>Anda belum login atau register</p>
    <div class="flex items-center justify-center w-full">
      <a class="" href="{{ route('login') }}">
        <button type="button" class="font-medium rounded-md px-5 py-2.5 me-2 mb-2 bg-secondary text-tirddary">login</button>
      </a>
        @if (Route::has('register'))
      <a class="" href="{{ route('register') }}">
        <button type="button" class="font-medium rounded-md px-5 py-2.5 me-2 mb-2 bg-opacity-10 bg-secondary text-secondary">register</button>
      </a>
    </div>
  </div>
  @endif
  @endauth
@endif

  </div>
</div>

