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


    @include('export.table_pembayaran')

@endsection
