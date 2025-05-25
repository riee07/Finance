@extends('components.sidebar-admin')

@section('admin-sidebar')

     <h1 class="text-2xl font-bold mb-4">Data Siswa</h1>

    <div class="max-w-7xl mx-auto px-6 py-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Data Siswa</h1>
            <div class="flex items-center space-x-3">
                
                
                <!-- Action Buttons -->
                <div class="flex items-center space-x-2">
                    <!-- Naikkan Kelas -->
                    <form action="{{ route('admin.siswa.promosi') }}" method="POST" onsubmit="return confirm('Yakin ingin naikkan semua kelas?')" class="inline">
                        @csrf
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium btn-hover">
                            Naikkan Kelas
                        </button>
                    </form>
                    
                    <!-- Export -->
                    <form action="{{ url('/siswa.export') }}" method="GET" class="inline">
                        <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm font-medium btn-hover">
                            Export
                        </button>
                    </form>

                    <!-- Import -->
                    <div class="relative">
                        <form action="{{ url('/import-siswa') }}" method="POST" enctype="multipart/form-data" class="flex">
                        @csrf
                        <input type="file" name="file" class="hidden" required><br>
                        <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md flex items-center text-sm font-medium">
                            <i class="fas fa-plus mr-2"></i>
                            Import
                        </button>
                    </form>
                       
                    </div>

                    <!-- Tambah Data -->
                    <a href="{{ route('admin.siswa.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium btn-hover flex items-center">
                        Tambah Data
                        <i class="fas fa-plus ml-2 text-xs"></i>
                    </a>
                </div>
            </div>
        </div>


    
    @include('export.table_siswa')
    
@endsection
