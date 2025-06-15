@extends('components.sidebar-admin')

@section('content')

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
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium h-10">
                        Naikkan Kelas
                    </button>
                </form>

                <!-- Export -->
                <form action="{{ url('/siswa.export') }}" method="GET" class="inline">
                    <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm font-medium h-10">
                        Export
                    </button>
                </form>

                <!-- Import -->
                <form action="{{ url('/import-siswa') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-2">
                    @csrf

                    <!-- Hidden file input -->
                    <input type="file" name="file" id="fileInput" class="hidden" required>

                    <!-- Label Upload -->
                    <label for="fileInput" class="cursor-pointer bg-gray-200 hover:bg-gray-300 text-black px-4 py-2 rounded-md flex items-center text-sm font-medium h-10 min-w-[120px]">
                        <i class="fas fa-upload mr-2"></i> Pilih File
                    </label>

                    <!-- Nama File -->
                    <span id="fileName"
                        class="hidden text-sm text-gray-600 px-4 py-2 rounded-md font-medium h-10 min-w-[120px] items-center bg-white border border-gray-300"></span>

                    <!-- Tombol Import -->
                    <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md flex items-center text-sm font-medium h-10">
                        <i class="fas fa-plus mr-2"></i>
                        Import
                    </button>
                </form>

                <!-- Tambah Data -->
                <a href="{{ route('admin.siswa.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium flex items-center h-10">
                    Tambah Data
                    <i class="fas fa-plus ml-2 text-xs"></i>
                </a>
            </div>
                </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white p-4 rounded-md shadow-sm mb-6">
        <div class="flex flex-wrap items-center justify-between">
            <!-- Filter Dropdown -->
            <div class="flex space-x-2 mb-2 sm:mb-0">
                <div class="relative group">
                    <button class="flex items-center space-x-1 px-3 py-2 border rounded-md text-sm text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-filter"></i>
                        <span>Filter</span>
                    </button>
                    <div class="hidden group-hover:block absolute z-10 mt-1 w-56 bg-white rounded-md shadow-lg border">
                        <div class="p-2 space-y-2">
                            <!-- Jurusan Filter -->
                            <div>
                                <label class="block text-xs font-medium text-gray-500">Jurusan</label>
                                <select name="jurusan" class="w-full p-1 border rounded text-sm">
                                    <option value="">Semua Jurusan</option>
                                    <option value="tjkt">TJKT</option>
                                    <option value="an">AN</option>
                                    <option value="pplg">PPLG</option>
                                    <option value="dkv">DKV</option>
                                    <option value="ak">AK</option>
                                    <option value="mp">MP</option>
                                    <option value="dpb">DPB</option>
                                    <option value="lps">LPS</option>
                                    <option value="br">BR</option>
                                </select>
                            </div>
                            
                            <!-- Kelas Filter -->
                            <div>
                                <label class="block text-xs font-medium text-gray-500">Kelas</label>
                                <select name="kelas" class="w-full p-1 border rounded text-sm">
                                    <option value="">Semua Kelas</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                            </div>
                            
                            <!-- Status Filter -->
                            <div>
                                <label class="block text-xs font-medium text-gray-500">Status</label>
                                <select name="status" class="w-full p-1 border rounded text-sm">
                                    <option value="">Semua Status</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                            
                            <!-- Tahun Ajaran Filter -->
                            <div>
                                <label class="block text-xs font-medium text-gray-500">Tahun Ajaran</label>
                                <select name="tahun_ajaran" class="w-full p-1 border rounded text-sm">
                                    <option value="">Semua Tahun</option>
                                    @foreach($tahun_ajarans as $tahun)
                                    <option value="{{ $tahun->id }}">{{ $tahun->tahun_ajaran }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <button id="apply-filter" class="w-full bg-green-500 text-white py-1 rounded text-sm hover:bg-green-600">
                                Terapkan Filter
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Sort Dropdown -->
                <div class="relative group">
                    <button class="flex items-center space-x-1 px-3 py-2 border rounded-md text-sm text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-sort"></i>
                        <span>Sort by</span>
                    </button>
                    <div class="hidden group-hover:block absolute z-10 mt-1 w-48 bg-white rounded-md shadow-lg border">
                        <div class="p-2 space-y-2">
                            <select name="sort" class="w-full p-1 border rounded text-sm">
                                <option value="">Default</option>
                                <option value="name_asc">Nama (A-Z)</option>
                                <option value="name_desc">Nama (Z-A)</option>
                                <option value="kelas_asc">Kelas (Terendah)</option>
                                <option value="kelas_desc">Kelas (Tertinggi)</option>
                                <option value="tahun_ajaran_desc">Tahun Ajaran (Terbaru)</option>
                                <option value="tahun_ajaran_asc">Tahun Ajaran (Terlama)</option>
                            </select>
                            <button id="apply-sort" class="w-full bg-blue-500 text-white py-1 rounded text-sm hover:bg-blue-600">
                                Terapkan Sort
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Search -->
            <div class="w-full sm:w-auto mt-2 sm:mt-0">
                <form id="search-form">
                    <div class="relative">
                        <input type="text" name="search" placeholder="Search" value="{{ request('search') }}" class="w-full sm:w-64 pl-10 pr-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <div class="absolute left-3 top-2.5 text-gray-400">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Apply Filter
    document.getElementById('apply-filter').addEventListener('click', function() {
        const form = document.createElement('form');
        form.method = 'GET';
        form.action = window.location.pathname;
        
        const jurusan = document.querySelector('select[name="jurusan"]').value;
        const kelas = document.querySelector('select[name="kelas"]').value;
        const status = document.querySelector('select[name="status"]').value;
        const tahun_ajaran = document.querySelector('select[name="tahun_ajaran"]').value;
        const search = document.querySelector('input[name="search"]').value;
        
        if(jurusan) addInput(form, 'jurusan', jurusan);
        if(kelas) addInput(form, 'kelas', kelas);
        if(status) addInput(form, 'status_aktif', status);
        if(tahun_ajaran) addInput(form, 'tahun_ajaran', tahun_ajaran);
        if(search) addInput(form, 'search', search);
        
        document.body.appendChild(form);
        form.submit();
    });
    
    // Apply Sort
    document.getElementById('apply-sort').addEventListener('click', function() {
        const form = document.createElement('form');
        form.method = 'GET';
        form.action = window.location.pathname;
        
        const sort = document.querySelector('select[name="sort"]').value;
        const search = document.querySelector('input[name="search"]').value;
        
        if(sort) addInput(form, 'sort', sort);
        if(search) addInput(form, 'search', search);
        
        // Keep existing filter params
        const urlParams = new URLSearchParams(window.location.search);
        ['jurusan', 'kelas', 'status_aktif', 'tahun_ajaran'].forEach(param => {
            if(urlParams.has(param)) addInput(form, param, urlParams.get(param));
        });
        
        document.body.appendChild(form);
        form.submit();
    });
    
    // Search Form
    document.getElementById('search-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const search = document.querySelector('input[name="search"]').value;
        const url = new URL(window.location.href);
        
        if(search) {
            url.searchParams.set('search', search);
        } else {
            url.searchParams.delete('search');
        }
        
        window.location.href = url.toString();
    });
    
    function addInput(form, name, value) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = value;
        form.appendChild(input);
    }
    
    // Set current filter values from URL
    const urlParams = new URLSearchParams(window.location.search);
    if(urlParams.has('jurusan')) document.querySelector('select[name="jurusan"]').value = urlParams.get('jurusan');
    if(urlParams.has('kelas')) document.querySelector('select[name="kelas"]').value = urlParams.get('kelas');
    if(urlParams.has('status_aktif')) document.querySelector('select[name="status"]').value = urlParams.get('status_aktif');
    if(urlParams.has('tahun_ajaran')) document.querySelector('select[name="tahun_ajaran"]').value = urlParams.get('tahun_ajaran');
    if(urlParams.has('sort')) document.querySelector('select[name="sort"]').value = urlParams.get('sort');
});

//buat import
const fileInput = document.getElementById('fileInput');
    const fileName = document.getElementById('fileName');

    fileInput.addEventListener('change', function () {
        if (fileInput.files.length > 0) {
            fileName.textContent = fileInput.files[0].name;
            fileName.classList.remove('hidden');
            fileName.classList.add('flex'); // biar align dengan tombol
        } else {
            fileName.textContent = '';
            fileName.classList.remove('flex');
            fileName.classList.add('hidden');
        }
    });
</script>

    
    @include('export.table_siswa')
    
@endsection
