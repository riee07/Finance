<x-allLinks></x-allLinks>

<script src="//unpkg.com/alpinejs" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<div x-data="{ isOpen: true, openProjects: false }" class="flex">

  <!-- Sidebar -->
  <div :class="isOpen ? 'w-64' : 'w-16'" class="bg-white transition-all duration-300 flex flex-col h-screen text-gray-700 relative">
  <!-- Toggle Button -->
    <button @click="isOpen = !isOpen"
            class="absolute -right-4 top-6 bg-white text-black rounded-full p-1 shadow z-10">
      <i class="fas fa-chevron-left transition-transform"
         :class="{ 'rotate-180': !isOpen }"></i>
    </button>

            <!-- Logo Section -->
            <div class="flex items-center justify-between p-4 border-b">
                <div class="flex items-center">
                    <div class="h-8 w-8 rounded-full bg-green-600 flex items-center justify-center text-white mr-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjCH5oxtpVBPr6mv5jRyyOBfNxdtTQCoT-rA&s" alt="">
                    </div>
                    <span x-show="isOpen" class="text-xl font-bold">Amaliah</span>
                </div>
                <button id="collapse-btn" class="lg:hidden text-gray-500 hover:text-gray-700">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Menu Section -->
            <nav class="flex flex-col space-y-2 mt-4 px-2 ">
            <div class="py-4">
                <p class="px-4 text-xs font-medium uppercase text-gray-500 mb-2">Menu</p>
                
                <a href="{{ url('admin/dashboard') }}" class="flex items-center px-4 py-3 gap-x-2 text-gray-700 hover:bg-green-50 hover:text-green-600">
                    <i class="fa fa-th-large" aria-hidden="true"></i>
                    <span x-show="isOpen" x-transition>Dashboard</span>
                </a>
                
                <!-- Manajemen Tagihan Dropdown -->
                <div class="relative">
                  <button @click="openProjects = !openProjects"
                          class="flex items-center justify-between w-full px-3 py-2 text-gray-700 hover:bg-green-50">
                    <div class="flex items-center space-x-3">
                      <i class="bi bi-cash-stack"></i> 
                            <span x-show="isOpen" x-transition>Manajemen Tagihan</span>
                    </div>
                    <i x-show="isOpen"
                        class="fas fa-chevron-down transition-transform duration-300"
                        :class="{ 'rotate-180': openProjects }"></i>
                    </button>
                    <div x-show="openProjects" x-collapse x-cloak id="manajemen-menu" class="block bg-gray-50">
                        <a href="{{ url('admin/jenis-tagihan') }}" class="block pl-12 pr-4 py-2 text-gray-600 hover:bg-green-50 hover:text-green-600">Jenis Tagihan</a>
                        <a href="{{ url('admin/tarif-tagihan') }}" class="block pl-12 pr-4 py-2 text-gray-600 hover:bg-green-50 hover:text-green-600">Tarif Tagihan</a>
                        <a href="{{ url('admin/siswa') }}" class="block pl-12 pr-4 py-2 text-gray-600 hover:bg-green-50 hover:text-green-600">Siswa</a>
                        <a href="{{ url('admin/tagihan') }}" class="block pl-12 pr-4 py-2 text-gray-600 hover:bg-green-50 hover:text-green-600">Tagihan</a>
                        <a href="{{ url('admin/detail-tagihan') }}" class="block pl-12 pr-4 py-2 text-gray-600 hover:bg-green-50 hover:text-green-600">Detail Tagihan</a>
                    </div>
                </div>
                
                <a href="{{ url('admin/tahun-ajaran') }}" class="flex items-center px-4 gap-x-2 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <span x-show="isOpen" x-transition>Tahun Ajaran</span>
                </a>
                
                <a href="{{ url('admin/pembayaran') }}" class="flex items-center px-4 gap-x-2 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600">
                   <i class="bi bi-wallet-fill"></i>
                    <span x-show="isOpen" x-transition>Pembayaran</span>
                </a>
                <!-- General Section -->
            <div class="py-4 border-t">
                <p class="px-4 text-xs font-medium uppercase text-gray-500 mb-2">General</p>
                
                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600">
                    <i class="fas fa-question-circle w-5 h-5 mr-3"></i>
                    <span x-show="isOpen" x-transition>Bantuan</span>
                </a>
                
                <form method="POST" class="flex items-center px-4 py-2 text-gray-700 hover:bg-green-50" action="{{ route('logout') }}">
                  @csrf
                  <i class="fas fa-sign-out-alt"></i>
                    <button x-show="isOpen" x-transition class="w-full text-left py-2 px-4 rounded text-gray-700 hover:bg-green-50 hover:text-green-600">Logout</button>
                </form>
                </nav>
            </div>
            
 <div class="flex-1 p-6">
     @yield('admin-sidebar')
  </div>
  </div>
</div>

