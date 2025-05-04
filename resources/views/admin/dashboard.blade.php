@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Dashboard Admin</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @php
            $menus = [
                ['title' => 'Manajemen Siswa', 'route' => 'admin.siswa.index', 'icon' => '👨‍🎓'],
                ['title' => 'Jenis Tagihan', 'route' => 'admin.jenis-tagihan.index', 'icon' => '📄'],
                ['title' => 'Tarif Tagihan', 'route' => 'admin.tarif-tagihan.index', 'icon' => '💸'],
                ['title' => 'Data Tagihan', 'route' => 'admin.tagihan.index', 'icon' => '📋'],
                ['title' => 'Detail Tagihan', 'route' => 'admin.detail-tagihan.index', 'icon' => '🔍'],
                ['title' => 'Pembayaran', 'route' => 'admin.pembayaran.index', 'icon' => '💰'],
                ['title' => 'Tahun Ajaran', 'route' => 'admin.tahun-ajaran.index', 'icon' => '📅'],
            ];
        @endphp

        @foreach($menus as $menu)
            <a href="{{ route($menu['route']) }}" class="rounded-xl bg-white p-5 shadow hover:shadow-lg transition duration-300 ease-in-out flex items-center gap-4">
                <div class="text-3xl">{{ $menu['icon'] }}</div>
                <div>
                    <div class="text-lg font-semibold text-gray-700">{{ $menu['title'] }}</div>
                    <div class="text-sm text-gray-500">Kelola {{ strtolower($menu['title']) }}</div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
