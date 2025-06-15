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
        
        <!-- Tambahan Boxicons, AOS, Alpine -->
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/alpinejs" defer></script>
        <style>
            .scrollbar-hide {
                scrollbar-width: none;
                -ms-overflow-style: none;
            }

            .scrollbar-hide::-webkit-scrollbar {
                display: none;
            }
            html {
                scroll-behavior: smooth;
            }
        </style>
    </head>
    <body class=" antialiased font-poppins text-text " >
        <main>
            {{ $slot }}
        </main>
        <x-footer></x-footer>
        <script>
        window.addEventListener('scroll', function(){
            document.querySelector('nav').classList.replace('shadow-none','shadow')
            document.querySelector('nav').classList.replace('bg-transparent','bg-white')
            if(window.scrollY == 0){
                document.querySelector('nav').classList.replace('shadow','shadow-none')
                document.querySelector('nav').classList.replace('bg-white','bg-transparent')
            }
        })
        </script>
        <script src="assets/js/utama.js"></script>
    </body>
</html>