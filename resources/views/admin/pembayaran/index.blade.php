@extends('components.sidebar-admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Data Pembayaran</h1>

<div class="max-w-7xl mx-auto px-6 py-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Data Pembayaran</h1>
            <div class="flex items-center space-x-3">
                <!-- Action Buttons -->
                <div class="flex items-center space-x-2">
                    <!-- Export -->
                    <form action="{{ route('pembayaran.export') }}" method="GET" class="inline">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium btn-hover">
                            Export
                        </button>
                    </form>

                    <!-- Tambah Data -->
                    <a href="{{ route('admin.pembayaran.create') }}"  class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm font-medium btn-hover flex items-center">
                        Tambah Data
                        <i class="fas fa-plus ml-2 text-xs"></i>
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
                            <!-- Tagihan ID Filter -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-500">ID Tagihan</label>
                                    <select name="tagihan_id" class="w-full p-1 border rounded text-sm">
                                    <option value="">Semua Tagihan</option>
                                    @foreach($tagihans as $tagihan)
                                    <option value="{{$tagihan->id }}" {{ request('tagihan_id') ==$tagihan->id ? 'selected' : '' }}>
                                        {{$tagihan->tagihan_id }}
                                    </option>
                                    @endforeach
                                </select>
                                </div>

                                <!-- Tanggal Pembayaran Filter -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-500">Tanggal Pembayaran</label>
                                    <input type="date" name="tanggal_pembayaran" 
                                        value="{{ request('tanggal_pembayaran') }}" class="w-full p-1 border rounded text-sm">
                                </div>

                                <!-- Jumlah Pembayaran Filter -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-500">Jumlah Pembayaran</label>
                                    <input type="number" name="jumlah_pembayaran" placeholder="Jumlah Pembayaran" 
                                        value="{{ request('jumlah_pembayaran') }}" class="w-full p-1 border rounded text-sm">
                                </div>

                                <!-- Metode Pembayaran Filter -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-500">Metode Pembayaran</label>
                                    <select name="metode_pembayaran" class="w-full p-1 border rounded text-sm">
                                        <option value="">Semua Metode</option>
                                        <option value="tunai" {{ request('metode_pembayaran') == 'tunai' ? 'selected' : '' }}>Tunai</option>
                                        <option value="transfer" {{ request('metode_pembayaran') == 'transfer' ? 'selected' : '' }}>Transfer</option>
                                        <!-- Add other payment methods as needed -->
                                    </select>
                                </div>

                                <button id="apply-filter" type="submit" class="w-full bg-green-500 text-white py-1 rounded text-sm hover:bg-green-600">
                                    Terapkan Filter
                                </button>
                                <button type="button" id="clear-filter" class="px-3 bg-gray-300 text-gray-700 py-1 rounded text-sm hover:bg-gray-400">
                                Clear
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
                                <option value="tanggal_pembayaran_asc">Tanggal Terbaru</option>
                                <option value="tanggal_pembayaran_desc">Tanggal Terlama</option>
                                <option value="jumlah_pembayaran_asc">Harga (Terendah)</option>
                                <option value="jumlah_pembayaran_desc">Harga (Tertinggi)</option>
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
        
        const tagihan_id = document.querySelector('select[name="tagihan_id"]').value;
        const tanggal_pembayaran = document.querySelector('input[name="tanggal_pembayaran"]').value;
        const jumlah_pembayaran = document.querySelector('input[name="jumlah_pembayaran"]').value; // Fixed: input not select
        const metode_pembayaran = document.querySelector('select[name="metode_pembayaran"]').value; // Fixed: select not input
        const search = document.querySelector('input[name="search"]').value;

        console.log('Filter values:', {
            tagihan_id,
            tanggal_pembayaran,
            jumlah_pembayaran,
            metode_pembayaran,
            search
        });
        
        if(tagihan_id) addInput(form, 'tagihan_id', tagihan_id);
        if(tanggal_pembayaran) addInput(form, 'tanggal_pembayaran', tanggal_pembayaran);
        if(jumlah_pembayaran) addInput(form, 'jumlah_pembayaran', jumlah_pembayaran);
        if(metode_pembayaran) addInput(form, 'metode_pembayaran', metode_pembayaran);
        if(search) addInput(form, 'search', search);
        
        document.body.appendChild(form);
        form.submit();
    });
    
    // Clear Filter - ADD THIS
    document.getElementById('clear-filter').addEventListener('click', function() {
        window.location.href = window.location.pathname;
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
        ['tagihan_id', 'tanggal_pembayaran', 'jumlah_pembayaran', 'metode_pembayaran'].forEach(param => {
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
    if(urlParams.has('tagihan_id')) document.querySelector('select[name="tagihan_id"]').value = urlParams.get('tagihan_id');
    if(urlParams.has('tanggal_pembayaran')) document.querySelector('input[name="tanggal_pembayaran"]').value = urlParams.get('tanggal_pembayaran');
    if(urlParams.has('jumlah_pembayaran')) document.querySelector('input[name="jumlah_pembayaran"]').value = urlParams.get('jumlah_pembayaran'); // Fixed
    if(urlParams.has('metode_pembayaran')) document.querySelector('select[name="metode_pembayaran"]').value = urlParams.get('metode_pembayaran'); // Fixed
    if(urlParams.has('sort')) document.querySelector('select[name="sort"]').value = urlParams.get('sort');
});
</script>



    @include('export.table_pembayaran')

@endsection
