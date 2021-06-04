<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" ">
    
    {{-- <script>!function(){try {var d=document.documentElement.classList;d.remove('light','dark');var e=localStorage.getItem('nightwind-mode');if(!e)return localStorage.setItem('nightwind-mode','system'),d.add('system');if("
        system"===e){var t="(prefers-color-scheme: dark)"
        ,m=window.matchMedia(t);m.media!==t||m.matches?d.add('dark'):d.add('light')}else d.add(e)}catch(e){}}()
        </script> <script>
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches &&
    !document.documentElement.classList.contains('dark')) {
    document.documentElement.classList.add('dark');
    window.localStorage.setItem('nightwind-mode', 'dark');
    document.getElementById('darkModeToggle').innerHTML = '<svg class=" h-6 w-6" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
    </svg>';
    }
    if (matchMedia) {
    const mq = window.matchMedia("(prefers-color-scheme: dark)");
    mq.addListener(toggleDarkMode);
    // WidthChange(mq);
    }
    </script> --}}
    <meta name=" csrf-token" content="{{ csrf_token() }}">

    <style>
        @media (prefers-color-scheme:dark) {
            .dark\:bg-black {
                --bg-opacity: 1;
                background-color: #000000;
                background-color: rgba(0, 0, 0, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }
        }
    </style>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://code.cdn.mozilla.net/fonts/fira.css">


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles
</head>

<body class="font-sans text-gray-900 antialiased bg-blue-50 dark:bg-gray-800" onload="test();">
    <div class="min-h-screen dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        {{-- <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header ?? '' }}
    </div>
    </header> --}}

    <!-- Page Content -->
    <main class="max-w-7xl mx-auto px-4 ">
        {{ $slot }}
    </main>
    </div>
    @livewireScripts
    <script>
        function toggleDarkMode() {
            if (!document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.add('dark');
                window.localStorage.setItem('nightwind-mode', 'dark');
                document.getElementById('darkModeToggle').innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>';
            } else {
                document.documentElement.classList.remove('dark');
                window.localStorage.setItem('nightwind-mode', 'light');
                document.getElementById('darkModeToggle').innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" /></svg>';
            }
        }
    </script>
</body>

</html>