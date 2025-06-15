@extends('components.sidebar-admin')

@section('title', 'Dashboard Admin')

@section('content')
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Dashboard Admin</h1>

    <div class="max-w-2xl mx-auto p-4 space-y-4">
        <!-- Search Bar -->
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
            </div>
            <input type="text" 
                   placeholder="Cari Data Siswa" 
                   class="w-full pl-12 pr-4 py-4 bg-white rounded-2xl shadow-sm border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700 placeholder-gray-400">
        </div>

        <!-- Notification Cards -->
        <div class="space-y-3">
            <!-- First Card with Delete Button -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 flex items-center justify-between hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center space-x-4">
                    <!-- Avatar -->
                    <div class="w-12 h-12 bg-gray-800 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-user text-white text-lg"></i>
                    </div>
                    
                    <!-- Content -->
                    <div class="flex-1 min-w-0">
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">SPP Bulanan</h3>
                        <p class="text-sm text-gray-500 mb-1">20/06/2024</p>
                        <p class="text-sm text-gray-700">Pembayaran Kamu berhasil</p>
                    </div>
                </div>
                
                <!-- Delete Button -->
                <button class="bg-gray-100 hover:bg-gray-200 text-gray-600 px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 flex-shrink-0">
                    Hapus pesan
                </button>
            </div>
    <br><br>

    <form action="{{ route('generate.tagihan') }}" method="POST">
        @csrf
        <select name="tahun_ajaran_id" required>
            @foreach ($tahunAjarans as $tahun)
                <option value="{{ $tahun->id_tahun_ajaran }}">{{ $tahun->tahun_ajaran }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">Generate Tagihan</button>
    </form>
@endsection
