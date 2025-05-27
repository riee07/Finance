@extends('components.sidebar-admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Data Tagihan</h1>
<div class="max-w-7xl mx-auto px-6 py-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Data Siswa</h1>
            <div class="flex items-center space-x-3">
                <!-- Action Buttons -->
                <div class="flex items-center space-x-2">
                    <!-- Tambah Data -->
                    <a href="{{ route('admin.tagihan.create') }}"    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium btn-hover flex items-center">
                        Tambah Data                            <i class="fas fa-plus ml-2 text-xs"></i>
                    </a>
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
                            
                            
                            <!-- Total Tagihan Filter -->
                            <div>
                                <label class="block text-xs font-medium text-gray-500">Total Tagihan</label>
                                <select name="tahun_ajaran" class="w-full p-1 border rounded text-sm">
                                    <option value="">Semua Total Tagihan</option>
                                    @foreach($tagihans as $tagihan)
                                    <option value="{{ $tagihan->id }}">{{ $tagihan->total_tagihan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <!-- Status Filter -->
                            <div>
                                <label class="block text-xs font-medium text-gray-500">Status</label>
                                <select name="status" class="w-full p-1 border rounded text-sm">
                                    <option value="">Status</option>
                                    <option value="belum_lunas">Belum Lunas</option>
                                    <option value="lunas">Lunas</option>
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
                            
                            <button id="apply-filter" type="submit" class="w-full bg-green-500 text-white py-1 rounded text-sm hover:bg-green-600">
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
                                <option value="total_tagihan_desc">Total Tagihan (Terbesar)</option>
                                <option value="total_tagihan_asc">Total Tagihan (Terkecil)</option>
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

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Tagihan</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Siswa</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun Ajaran</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Tagihan</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Pembayaran</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tagihans as $tagih)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tagih->id_tagihan }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tagih->siswa->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tagih->tahunAjaran->tahun_ajaran }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ formatRupiah($tagih->total_tagihan) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tagih->status_pembayaran }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                    <a href="{{ route('admin.tagihan.edit', $tagih->id_tagihan) }}" class="text-blue-500"><i class="fas fa-edit"></i></a> |
                    <form action="{{ route('admin.tagihan.destroy', $tagih->id_tagihan) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Apply Filter
    document.getElementById('apply-filter').addEventListener('click', function() {
        const form = document.createElement('form');
        form.method = 'GET';
        form.action = window.location.pathname;
        
        const total_tagihan = document.querySelector('select[name="total_tagihan"]').value;
        const status = document.querySelector('select[name="status"]').value;
        const tahun_ajaran = document.querySelector('select[name="tahun_ajaran"]').value;
        const search = document.querySelector('input[name="search"]').value;
        
        if(total_tagihan) addInput(form, 'total_tagihan', total_tagihan);
        if(status) addInput(form, 'status', status);
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
        ['siswa', 'total_tagihan', 'status', 'tahun_ajaran'].forEach(param => {
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
    if(urlParams.has('siswa')) document.querySelector('select[name="siswa"]').value = urlParams.get('siswa');
    if(urlParams.has('total_tagihan')) document.querySelector('select[name="total_tagihan"]').value = urlParams.get('total_tagihan');
    if(urlParams.has('status')) document.querySelector('select[name="status"]').value = urlParams.get('status');
    if(urlParams.has('tahun_ajaran')) document.querySelector('select[name="tahun_ajaran"]').value = urlParams.get('tahun_ajaran');
    if(urlParams.has('sort')) document.querySelector('select[name="sort"]').value = urlParams.get('sort');
});
</script>


@endsection
