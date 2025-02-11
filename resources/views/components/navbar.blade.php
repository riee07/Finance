<nav class="text-primary bg-transparent navbar w-full fixed top-0 z-20 nav-parent duration-500">
  <div class="absolute flex justify-center left-0 w-full overflow-hidden -z-50">
    <div class="hidden animate-none anim-bg-navbar bg-primary w-1 h-24"></div>
  </div>
  <div class="flex flex-wrap items-center justify-between mx-auto p-4">
    <div class="flex items-center justify-center ">
      <img src="assets/images/logo.png" alt="" class="h-14 mr-2">
      <p>SMK AMALIAH 1&2 CIAWI</p>
    </div>
    <button  class="flex w-10 md:hidden text-[2rem]" type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
      <i class='bx bx-menu-alt-right' ></i>
    </button>
    <div class="items-center justify-center gap-5 hidden md:flex">
      <p class="cursor-pointer border-primary hover:opacity-50 border-none" id="nav-btn">home</p>
      <p class="cursor-pointer border-primary hover:opacity-50 border-none" id="nav-btn">about</p>
      <p class="cursor-pointer border-primary hover:opacity-50 border-none" id="nav-btn">help</p>
      @if (Route::has('login'))
      @auth
          <a class="lr  block bg-primary border-[1px] py-1 px-3 rounded-[4px] border-primary text-secondary " href="{{ url(Auth::user()->role . (Auth::user()->role == 'siswa' ? '/' . Auth::user()->kelas : '') . '/index') }}">Dashboard</a>
      @else
      <a class="lr  block bg-primary border-[1px] py-1 px-3 rounded-[4px] border-primary text-secondary " href="{{ route('login') }}">Log in</a>
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
    <div id="nav-btn" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="flex items-center p-2 hover:bg-secondary hover:text-primary rounded-sm focus:bg-secondary focus:text-primary">
      <span class="ms-3">home</span>
    </div>
  <div id="nav-btn" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="flex items-center p-2 hover:bg-secondary hover:text-primary rounded-sm focus:bg-secondary focus:text-primary">
    <span class="ms-3">about</span>
  </div>
  <div id="nav-btn" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="flex items-center p-2 hover:bg-secondary hover:text-primary rounded-sm focus:bg-secondary focus:text-primary">
    <span class="ms-3">help</span>
  </div>
  @if (Route::has('login'))
  @auth
  <a href="{{ url(Auth::user()->role . (Auth::user()->role == 'siswa' ? '/' . Auth::user()->kelas : '') . '/dashboard') }}">
    <div id="nav-btn" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="flex items-center p-2 hover:bg-secondary hover:text-primary rounded-sm focus:bg-secondary focus:text-primary">
      <span class="ms-3">dhasboard</span>
    </div>
    
  </a>
  @else
  
  <div class="flex items-center justify-center flex-col w-full mt-10 gap-3">

    <i class='bx bx-info-circle text-[4rem] text-secondary'></i>
    <p>Anda belum login atau register</p>
    <div class="flex items-center justify-center w-full">
      <div>
        <div>
          <a class="" href="{{ route('login') }}">
            <button type="button" class="font-medium rounded-md px-5 py-2.5 me-2 mb-2 bg-secondary text-primary">login</button>
          </a>

        </div>
      </div>
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

