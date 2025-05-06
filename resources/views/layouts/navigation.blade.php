<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-gray-100 p-6 space-y-6">
            <div class="text-2xl font-bold text-white mb-8">
                WI WOK DE TOK, NOT ONLY TOK DE TOK🗣️🔥
            </div>
            <nav class="space-y-2">
                <a href="{{ url('admin/dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700 {{ request()->is('dashboard') ? 'bg-gray-800' : '' }}">Dashboard</a>
                <a href="{{ url('admin/tahun-ajaran') }}" class="block py-2 px-4 rounded hover:bg-gray-700 {{ request()->is('tahun-ajaran*') ? 'bg-gray-800' : '' }}">Tahun Ajaran</a>
                <a href="{{ url('admin/jenis-tagihan') }}" class="block py-2 px-4 rounded hover:bg-gray-700 {{ request()->is('jenis-tagihan*') ? 'bg-gray-800' : '' }}">Jenis Tagihan</a>
                <a href="{{ url('admin/tarif-tagihan') }}" class="block py-2 px-4 rounded hover:bg-gray-700 {{ request()->is('tarif-tagihan*') ? 'bg-gray-800' : '' }}">Tarif Tagihan</a>
                <a href="{{ url('admin/siswa') }}" class="block py-2 px-4 rounded hover:bg-gray-700 {{ request()->is('siswa*') ? 'bg-gray-800' : '' }}">Manajemen Siswa</a>
                <a href="{{ url('admin/tagihan') }}" class="block py-2 px-4 rounded hover:bg-gray-700 {{ request()->is('tagihan*') ? 'bg-gray-800' : '' }}">Data Tagihan</a>
                <a href="{{ url('admin/detail-tagihan') }}" class="block py-2 px-4 rounded hover:bg-gray-700 {{ request()->is('tagihan*') ? 'bg-gray-800' : '' }}">Detail Tagihan</a>
                <a href="{{ url('admin/pembayaran') }}" class="block py-2 px-4 rounded hover:bg-gray-700 {{ request()->is('pembayaran*') ? 'bg-gray-800' : '' }}">Pembayaran</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left py-2 px-4 rounded hover:bg-gray-700">Logout</button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <h1 class="text-2xl font-semibold mb-4">@yield('title')</h1>
            <div class="bg-white p-6 rounded-lg shadow">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
