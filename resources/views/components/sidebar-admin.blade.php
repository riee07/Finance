<x-allLinks></x-allLinks>


<script src="//unpkg.com/alpinejs" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<div x-data="{ isOpen: true, openProjects: false }" class="flex">

  <!-- Sidebar -->
  <div :class="isOpen ? 'w-64' : 'w-16'" class="bg-[#3D3D3D] h-screen transition-all duration-300 text-white flex flex-col relative">

    <!-- Toggle Button -->
    <button @click="isOpen = !isOpen"
            class="absolute -right-4 top-6 bg-white text-black rounded-full p-1 shadow z-10">
      <i class="fas fa-chevron-left transition-transform"
         :class="{ 'rotate-180': !isOpen }"></i>
    </button>

    <!-- Logo -->
    <div class="flex items-center space-x-3 px-4 py-5">
      <img src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" class="h-6 w-6" alt="Logo">
      <span x-show="isOpen" class="text-xl font-bold">Tailwind</span>
    </div>

    <!-- Menu Items -->
    <nav class="flex flex-col space-y-2 mt-4 px-2 text-sm font-medium">

      <!-- Dashboard -->
      <a href="#" class="flex items-center space-x-3 px-3 py-2 hover:bg-[#578E7E] rounded">
        <i class="fas fa-th-large"></i>
        <span x-show="isOpen">Dashboard</span>
      </a>

      <!-- Projects Dropdown -->
      <div>
        <button @click="openProjects = !openProjects"
                class="flex items-center justify-between w-full px-3 py-2 hover:bg-[#578E7E] rounded">
          <div class="flex items-center space-x-3">
            <i class="fas fa-folder-open"></i>
            <span x-show="isOpen">Projects</span>
          </div>
          <i x-show="isOpen"
             class="fas fa-chevron-down transition-transform duration-300"
             :class="{ 'rotate-180': openProjects }"></i>
        </button>

        <!-- Submenu -->
        <div x-show="openProjects" x-collapse x-cloak class="ml-8 mt-1 space-y-1 text-sm">
         <a href="#" class="block px-3 py-1.5 rounded hover:bg-[#F5ECD5] hover:text-[#3D3D3D]">Siswa</a>
          <a href="tahun-ajaran" class="block px-3 py-1.5 rounded hover:bg-[#F5ECD5] hover:text-[#3D3D3D]">Tahun ajaran</a>
          <a href="jenis-tagihan" class="block px-3 py-1.5 rounded hover:bg-[#F5ECD5] hover:text-[#3D3D3D]">Jenis tagihan</a>
          <a href="tarif-tagihan" class="block px-3 py-1.5 rounded hover:bg-[#F5ECD5] hover:text-[#3D3D3D]">tarif tagihan</a>
          <a href="tagihan" class="block px-3 py-1.5 rounded hover:bg-[#F5ECD5] hover:text-[#3D3D3D]">Tagihan</a>
          <a href="detail-tagihan" class="block px-3 py-1.5 rounded hover:bg-[#F5ECD5] hover:text-[#3D3D3D]">Detail tagihan</a>
          <a href="pembayaran" class="block px-3 py-1.5 rounded hover:bg-[#F5ECD5] hover:text-[#3D3D3D]">Pembayaran</a>
        </div>
      </div>

      <!-- Tambahan Menu -->
      <a href="#" class="flex items-center space-x-3 px-3 py-2 hover:bg-[#578E7E] rounded">
        <i class="fas fa-chart-bar"></i>
        <span x-show="isOpen">Analytics</span>
      </a>

      <a href="#" class="flex items-center space-x-3 px-3 py-2 hover:bg-[#578E7E] rounded">
        <i class="fas fa-envelope"></i>
        <span x-show="isOpen">Inbox</span>
      </a>

      <a href="#" class="flex items-center space-x-3 px-3 py-2 hover:bg-[#578E7E] rounded">
        <i class="fas fa-user"></i>
        <span x-show="isOpen">Profile</span>
      </a>

      <a href="#" class="flex items-center space-x-3 px-3 py-2 hover:bg-[#578E7E] rounded">
        <i class="fas fa-cog"></i>
        <span x-show="isOpen">Setting</span>
      </a>

      <a href="#" class="flex items-center space-x-3 px-3 py-2 hover:bg-[#578E7E] rounded">
        <i class="fas fa-sign-out-alt"></i>
        <span x-show="isOpen">Logout</span>
      </a>
    </nav>
  </div>

  <!-- Konten utama -->
  <div class="flex-1 p-6">
     @yield('admin-sidebar')
  </div>
</div>
