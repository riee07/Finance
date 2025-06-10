<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .scrollbar-hide {
  scrollbar-width: none; /* Firefox */
  -ms-overflow-style: none; /* Internet Explorer 10+ */
}

.scrollbar-hide::-webkit-scrollbar {
  display: none; /* Chrome, Safari, Opera */
}
        </style>
    </head>
    <body class=" antialiased font-poppins text-text " >
        <x-navbar-dashboard-siswa></x-navbar-dashboard-siswa>
        <main>
            {{ $slot }}
        </main>
        {{-- <script>
        const wrapper = document.getElementById('mobileSidebarWrapper');
        const sidebar = document.getElementById('mobileSidebar');
        const gapArea = document.getElementById('sidebarGap');
        const openBtn = document.getElementById('toggleSidebar');

        window.addEventListener('scroll', function(){
            document.querySelector('nav').classList.replace('shadow-none','shadow')
            document.querySelector('nav').classList.replace('bg-transparent','bg-white')
            
            if(window.scrollY == 0){
            document.querySelector('nav').classList.replace('shadow','shadow-none')
            document.querySelector('nav').classList.replace('bg-white','bg-transparent')
            }
        })

        openBtn.addEventListener('click', () => {
            wrapper.classList.remove('hidden');
            setTimeout(() => {
            sidebar.classList.remove('translate-x-full');
            }, 10); // slight delay to allow transition
        });

        gapArea.addEventListener('click', () => {
            sidebar.classList.add('translate-x-full');
            setTimeout(() => {
            wrapper.classList.add('hidden');
            }, 300); // match transition duration
        });
        </script> --}}
    </body>
</html>
