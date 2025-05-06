<nav class="text-tirddary bg-transparent navbar w-full fixed top-0 overflow-hidden nav-parent duration-500">
  <div class="absolute flex justify-center left-0 w-full overflow-hidden -z-50">
    <div class="hidden animate-none anim-bg-navbar bg-primary w-1 h-32"></div>
  </div>
  <div class="flex flex-wrap items-center justify-between mx-auto p-4">
    <div class="flex items-center justify-center ">
      <img src="assets/images/logo.png" alt="" class="h-14 mr-2">
      <p>SMK AMALIAH 1&2 CIAWI</p>
    </div>
    <button class="flex w-10 md:hidden text-[2rem]" type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
      <i class='bx bx-menu-alt-right'></i>
    </button>

    <form class="max-w-md">
      <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
      <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
          </svg>
        </div>
        <input type="search" id="default-search"
          class="block w-[28rem] p-4 ps-10 text-sm text-primary border border-gray-300 rounded-lg placeholder-primary focus:ring-primary focus:border-primary"
          placeholder="Search Mockups, Logos..." required />
        <button type="submit"
          class="text-white absolute end-2.5 bottom-2.5 bg-primary focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm px-4 py-2 ">Search</button>
      </div>
    </form>

    <div class="items-center justify-center gap-5 hidden md:flex relative">
      @if (Route::has('login'))
        @auth
          <i @click="openCart = true" class="bx bx-cart text-[2rem] cursor-pointer"></i>
          <a class="block"
            href="{{ url(Auth::user()->role . (Auth::user()->role == 'siswa' ? '/' . Auth::user()->kelas : '') . '/dashboard') }}">Dashboard</a>
        @else
          <i @click="openCart = true" class="bx bx-cart text-[2rem] cursor-pointer"></i>
          <a class="lr block bg-primary border-[1px] p-3 rounded-full border-primary text-secondary"
            href="{{ route('login') }}"><i class="bx bx-user"></i></a>
        @endauth
      @endif

      {{-- TOAST SESSION --}}
      @if(session('success'))
      <div id="toast-success"
          class="fixed top-20 right-5 z-50 w-72 p-4 text-green-800 bg-green-100 rounded-lg shadow">
        <div class="flex items-center">
          <svg class="w-5 h-5 me-2" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
          </svg>
          <span class="text-sm font-medium">{{ session('success') }}</span>
          <button class="ml-auto text-green-800" onclick="this.closest('#toast-success').remove()">×</button>
        </div>
      </div>
      @endif

      @if(session('error'))
      <div id="toast-error"
          class="fixed top-20 right-5 z-50 w-72 p-4 text-red-800 bg-red-100 rounded-lg shadow">
        <div class="flex items-center">
          <svg class="w-5 h-5 me-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11V7a1 1 0 10-2 0v5a1 1 0 102 0V9h-1v1a1 1 0 102 0V9a1 1 0 10-2 0z"
              clip-rule="evenodd" />
          </svg>
          <span class="text-sm font-medium">{{ session('error') }}</span>
          <button class="ml-auto text-red-800" onclick="this.closest('#toast-error').remove()">×</button>
        </div>
      </div>
      @endif
    </div>
  </div>
</nav>

{{-- Script agar toast hilang otomatis --}}
<script>
  setTimeout(() => {
    document.getElementById('toast-success')?.remove();
    document.getElementById('toast-error')?.remove();
  }, 5000);
</script>
