<x-layout-dashboard-siswa>
  <div class="px-5 py-10 max-w-2xl xl:max-w-4xl mx-auto">

    <div class="flex flex-col items-center space-y-1">
    <div class="flex items-center justify-center w-32 h-32 border-4 rounded-full">
      <p class="text-4xl">{{ strtoupper(substr($user->siswa->name, 0, 1)) }}</p>
    </div>
    <h2 class="text-sm font-semibold">{{ ucwords(strtolower($user->siswa->name)) }}</h2>
    <p class="text-gray-500 text-sm">{{ $user->email }}</p>
  </div>

  <!-- Detail Section -->
  <div class="rounded-xl mt-10 mx-auto ">
    <h3 class="text-gray-500 font-semibold mb-4">Details</h3>
    <div class="space-y-4 text-sm text-gray-800 bg-gray-50 shadow-lg p-4 rounded-md">
      <div>
        <p class="text-gray-400">Nama</p>
        <p>{{ ucwords(strtolower($user->siswa->name)) }}</p>
      </div>
      <div>
        <p class="text-gray-400">Email</p>
        <p>{{ $user->email }}</p>
      </div>
      <div>
        <p class="text-gray-400">Kelas</p>
        <p>{{ strtoupper($user->siswa->kelas) }}</p>
      </div>
      <div>
        <p class="text-gray-400">Jurusan</p>
        <p>{{ strtoupper($user->siswa->jurusan) }}</p>
      </div>
      <div>
        <p class="text-gray-400">NISN</p>
        <p class="font-semibold">{{ $user->siswa->nisn }}</p>
      </div>
    </div>
  </div>

  <!-- Logout Button -->
  <div class="mb-20 mt-5 mx-auto">
    <h3 class="text-gray-500 font-semibold mb-2">General</h3>
          
    <form method="POST" action="{{ route('logout') }}" class="mb-6">
        @csrf
    <button class="w-full flex items-center justify-between px-4 py-2 rounded-full shadow-md bg-gray-50 text-gray-400 hover:bg-gray-200 transition">
      <span>Logout</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h6a1 1 0 110 2H5v10h5a1 1 0 110 2H4a1 1 0 01-1-1V4zm10.293 3.707a1 1 0 010-1.414L16.586 3H10a1 1 0 110-2h8a1 1 0 011 1v8a1 1 0 11-2 0V5.414l-3.293 3.293a1 1 0 01-1.414 0z" clip-rule="evenodd" />
      </svg>
    </button>    </form>

  </div>
  </div>
</x-layout-dashboard-siswa>