<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 text-white">
        <div class="max-w-6xl mx-auto">
            <a href="{{ url('/') }}" class="font-bold text-lg">Sistem Pembayaran Sekolah</a>
        </div>
    </nav>
    <div class="max-w-6xl mx-auto mt-4 p-4 bg-white shadow">
        @yield('content')
    </div>
</body>
</html>
