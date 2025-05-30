@extends('components.sidebar-admin')

{{-- @section('title', 'Data Detail Tagihan') --}}

@section('content')
    <h1 class="text-2xl font-bold mb-4">Data Detail Tagihan</h1>

    <div class="max-w-7xl mx-auto px-6 py-6">
        <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold text-gray-900">Data Siswa</h1>
                <div class="flex items-center space-x-3">
                    <!-- Action Buttons -->
                    <div class="flex items-center space-x-2">
                        <!-- Tambah Data -->
                        <a href="{{ route('admin.detail-tagihan.create') }}"     class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium btn-hover flex items-center">
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
                            
                         <!-- Tarif Tagihan Filter -->
                            <div>
                                <label class="block text-xs font-medium text-gray-500">Jenis Tagihan</label>
                                <select name="tarif_tagihan_id" class="w-full p-1 border rounded text-sm">
                                    <option value="">Semua Jenis Tagihan</option>
                                    @foreach($tarif_tagihans as $tarif)
                                    <option value="{{ $tarif->id_tarif_tagihan }}" {{ request('tarif_tagihan_id') == $tarif->id_tarif_tagihan ? 'selected' : '' }}>
                                        {{ $tarif->jenis_tagihan->nama_jenis ?? $tarif->jenis_tagihan_id }}
                                    </option>
                                    @endforeach
                                </select>
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
                                    
                                    
                           <!-- Tagihan Filter -->
                            <div>
                                <label class="block text-xs font-medium text-gray-500">Tagihan</label>
                                <select name="tagihan_id" class="w-full p-1 border rounded text-sm">
                                    <option value="">Semua Tagihan</option>
                                    @foreach($tagihans as $tagihan)
                                    <option value="{{ $tagihan->id }}" {{ request('tagihan_id') == $tagihan->id ? 'selected' : '' }}>
                                        {{ $tagihan->tagihan_id ?? 'No ID' }} - {{ $tagihan->id }}
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
                                <option value="tagihan_asc" {{ request('sort') == 'tagihan_asc' ? 'selected' : '' }}>Tagihan (A-Z)</option>
                                <option value="tagihan_desc" {{ request('sort') == 'tagihan_desc' ? 'selected' : '' }}>Tagihan (Z-A)</option>
                                <option value="tarif_asc" {{ request('sort') == 'tarif_asc' ? 'selected' : '' }}>Tarif (A-Z)</option>
                                <option value="tarif_desc" {{ request('sort') == 'tarif_desc' ? 'selected' : '' }}>Tarif (Z-A)</option>
                                <option value="jumlah_tagihan_desc" {{ request('sort') == 'jumlah_tagihan_desc' ? 'selected' : '' }}>Jumlah Tagihan (Terbesar)</option>
                                <option value="jumlah_tagihan_asc" {{ request('sort') == 'jumlah_tagihan_asc' ? 'selected' : '' }}>Jumlah Tagihan (Terkecil)</option>
                                <option value="tahun_ajaran_desc" {{ request('sort') == 'tahun_ajaran_desc' ? 'selected' : '' }}>Tahun Ajaran (Terbaru)</option>
                                <option value="tahun_ajaran_asc" {{ request('sort') == 'tahun_ajaran_asc' ? 'selected' : '' }}>Tahun Ajaran (Terlama)</option>                            </select>
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
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Detail Tagihan</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tagihan ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tarif Tagihan ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun Ajaran</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Tagihan</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detail_tagihans as $detail)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $detail->id_detail_tagihan }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $detail->tagihan_id }}  ({{ $detail->tagihan->siswa->name }})</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $detail->tarif_tagihan_id }} ({{ $detail->tarifTagihan->jenisTagihan->jenis_tagihan }})</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $detail->tagihan->tahunAjaran->id_tahun_ajaran }}  ({{ $detail->tagihan->tahunAjaran->tahun_ajaran }})</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ formatRupiah($detail->jumlah_tagihan) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                    <a href="{{ route('admin.detail-tagihan.edit', $detail->id_detail_tagihan) }}" class="text-blue-500"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.detail-tagihan.destroy', $detail->id_detail_tagihan) }}" method="POST" class="inline">
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
    // Function to add hidden inputs to form
    function addInput(form, name, value) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = value;
        form.appendChild(input);
    }

    // Apply Filter
    const applyFilterBtn = document.getElementById('apply-filter');
    if (applyFilterBtn) {
        applyFilterBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const form = document.createElement('form');
            form.method = 'GET';
            form.action = window.location.pathname;
            
            // Get all filter values
            const tagihanId = document.querySelector('select[name="tagihan_id"]')?.value;
            const tarifTagihanId = document.querySelector('select[name="tarif_tagihan_id"]')?.value;
            const tahunAjaran = document.querySelector('select[name="tahun_ajaran"]')?.value;
            const search = document.querySelector('input[name="search"]')?.value;

            // Add non-empty values to form
            if (tagihanId) addInput(form, 'tagihan_id', tagihanId);
            if (tarifTagihanId) addInput(form, 'tarif_tagihan_id', tarifTagihanId);
            if (tahunAjaran) addInput(form, 'tahun_ajaran', tahunAjaran);
            if (search) addInput(form, 'search', search);
            
            // Submit the form
            document.body.appendChild(form);
            form.submit();
        });
    }

    // Apply Sort
    const applySortBtn = document.getElementById('apply-sort');
    if (applySortBtn) {
        applySortBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const form = document.createElement('form');
            form.method = 'GET';
            form.action = window.location.pathname;
            
            const sort = document.querySelector('select[name="sort"]')?.value;
            const search = document.querySelector('input[name="search"]')?.value;
            
            if (sort) addInput(form, 'sort', sort);
            if (search) addInput(form, 'search', search);
            
            // Preserve existing filter parameters
            const urlParams = new URLSearchParams(window.location.search);
            const filterParams = ['tagihan_id', 'tarif_tagihan_id', 'tahun_ajaran'];
            
            filterParams.forEach(param => {
                if (urlParams.has(param)) {
                    addInput(form, param, urlParams.get(param));
                }
            });
            
            document.body.appendChild(form);
            form.submit();
        });
    }

    // Search Form
    const searchForm = document.getElementById('search-form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const searchValue = document.querySelector('input[name="search"]')?.value;
            const url = new URL(window.location);
            
            // Get current URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const newParams = new URLSearchParams();
            
            // Preserve existing filters
            const filterParams = ['tagihan_id', 'tarif_tagihan_id', 'tahun_ajaran', 'sort'];
            filterParams.forEach(param => {
                if (urlParams.has(param)) {
                    newParams.set(param, urlParams.get(param));
                }
            });
            
            // Add search parameter if exists
            if (searchValue) {
                newParams.set('search', searchValue);
            }
            
            // Update URL
            window.location.href = `${window.location.pathname}?${newParams.toString()}`;
        });
    }

    // Initialize form values from URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    
    // Set filter values
    const setValue = (selector, value) => {
        const element = document.querySelector(selector);
        if (element && value) element.value = value;
    };
    
    setValue('select[name="tagihan_id"]', urlParams.get('tagihan_id'));
    setValue('select[name="tarif_tagihan_id"]', urlParams.get('tarif_tagihan_id'));
    setValue('select[name="tahun_ajaran"]', urlParams.get('tahun_ajaran'));
    setValue('select[name="sort"]', urlParams.get('sort'));
    setValue('input[name="search"]', urlParams.get('search'));
});
</script>
@endsection
