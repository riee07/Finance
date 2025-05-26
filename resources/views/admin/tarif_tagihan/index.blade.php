@extends('components.sidebar-admin')

@section('admin-sidebar')
    <h1 class="text-2xl font-bold mb-4">Data Tarif Tagihan</h1>
    <div class="max-w-7xl mx-auto px-6 py-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Data Siswa</h1>
            <div class="flex items-center space-x-3">
                <!-- Action Buttons -->
                <div class="flex items-center space-x-2">
                    <!-- Tambah Data -->
                    <a href="{{ route('admin.tarif-tagihan.create') }}"    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium btn-hover flex items-center">
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
        <!-- Jenis Tagihan Filter -->
        <div>
            <label class="block text-xs font-medium text-gray-500">Jenis Tagihan</label>
            <select name="jenis_tagihan" class="w-full p-1 border rounded text-sm">
                <option value="">Semua Jenis Tagihan</option>
                @foreach($jenis_tagihans as $jenis)
                <option value="{{ $jenis->id_jenis_tagihan }}" {{ request('jenis_tagihan') == $jenis->id_jenis_tagihan ? 'selected' : '' }}>
                    {{ $jenis->jenis_tagihan }}
                </option>
                @endforeach
            </select>
        </div>
        
        <!-- Range Jumlah Tarif -->
        <div>
            <label class="block text-xs font-medium text-gray-500">Range Tarif</label>
            <div class="flex space-x-2">
                <input type="number" name="tarif_min" placeholder="Min" 
                       value="{{ request('tarif_min') }}" class="w-1/2 p-1 border rounded text-sm">
                <input type="number" name="tarif_max" placeholder="Max" 
                       value="{{ request('tarif_max') }}" class="w-1/2 p-1 border rounded text-sm">
            </div>
        </div>
       
        <!-- Tahun Ajaran Filter -->
        <div>
            <label class="block text-xs font-medium text-gray-500">Tahun Ajaran</label>
            <select name="tahun_ajaran" class="w-full p-1 border rounded text-sm">
                <option value="">Semua Tahun</option>
                @foreach($tahun_ajarans as $tahun)
                <option value="{{ $tahun->id_tahun_ajaran }}" {{ request('tahun_ajaran') == $tahun->id_tahun_ajaran ? 'selected' : '' }}>
                    {{ $tahun->tahun_ajaran }}
                </option>
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
                                <option value="jenis_tagihan_asc">Nama (A-Z)</option>
                                <option value="jenis_tagihan_desc">Nama (Z-A)</option>
                                <option value="jumlah_tarif_asc">Harga (Terendah)</option>
                                <option value="jumlah_tarif_desc">Harga (Tertinggi)</option>
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
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Tagihan</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun Ajaran</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Tarif</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($tarif_tagihans as $tarif)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tarif->jenisTagihan->jenis_tagihan }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $tarif->tahunAjaran->tahun_ajaran }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ formatRupiah($tarif->jumlah_tarif) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                    <a href="{{ route('admin.tarif-tagihan.edit', $tarif->id_tarif_tagihan) }}" class="text-blue-500"><i class="fas fa-edit"></i></a> |
                    <form action="{{ route('admin.tarif-tagihan.destroy', $tarif->id_tarif_tagihan) }}" method="POST" class="inline">
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
        
        const jenis_tagihan = document.querySelector('select[name="jenis_tagihan"]').value;
        const tarifMin = document.querySelector('input[name="tarif_min"]').value;
        const tarifMax = document.querySelector('input[name="tarif_max"]').value;        const tahun_ajaran = document.querySelector('select[name="tahun_ajaran"]').value;
        const search = document.querySelector('input[name="search"]').value;

        
        if(jenis_tagihan) addInput(form, 'jenis_tagihan', jenis_tagihan);
        if(tarifMin) addInput(form, 'tarif_min', tarifMin);
        if(tarifMax) addInput(form, 'tarif_max', tarifMax);        
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
        ['jenis_tagihan', 'jumlah_tarif', 'tahun_ajaran'].forEach(param => {
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
    if(urlParams.has('jenis_tagihan')) document.querySelector('select[name="jenis_tagihan"]').value = urlParams.get('jenis_tagihan');
    if(urlParams.has('jumlah_tarif')) document.querySelector('select[name="jumlah_tarif"]').value = urlParams.get('jumlah_tarif');
    if(urlParams.has('tahun_ajaran')) document.querySelector('select[name="tahun_ajaran"]').value = urlParams.get('tahun_ajaran');
    if(urlParams.has('sort')) document.querySelector('select[name="sort"]').value = urlParams.get('sort');
});
</script>

@endsection
