<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/preview.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

{{--        <!-- TailwindCSS styles -->--}}
{{--        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">--}}

        <!-- AlpineJS javascript -->
{{--        <script src="//cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>--}}

{{--        @stack('styles')--}}

{{--        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />--}}
{{--        <script src="https://cdn.tailwindcss.com"></script>--}}
{{--        <script src="./node_modules/tw-elements/dist/js/index.min.js"></script>--}}
{{--        <script>--}}
{{--            tailwind.config = {--}}
{{--                theme: {--}}
{{--                    extend: {--}}
{{--                        fontFamily: {--}}
{{--                            sans: ['Inter', 'sans-serif'],--}}
{{--                        },--}}
{{--                    }--}}
{{--                }--}}
{{--            }--}}
{{--        </script>--}}

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-700">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow dark:bg-gray-800">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <!-- For Alert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />

{{--        @stack('scripts')--}}
        <!-- For Carousel -->
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

        <!-- For Charts -->
{{--        @livewireCharts--}}
        @livewireChartsScripts
{{--        <livewire:livewire-charts/>--}}
{{--        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>--}}
{{--        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>--}}
        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.theme === 'dark' ||
                (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches))
            {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.remove('dark')
            }

            document.getElementById('switchTheme').addEventListener('click', () =>
            {
               let htmlClasses = document.querySelector('html').classList;
               if(localStorage.theme == 'dark') {
                   htmlClasses.remove('dark');
                   localStorage.removeItem('theme')
               } else {
                   htmlClasses.add('dark');
                   localStorage.theme = 'dark';
               }
            });

            // // Whenever the user explicitly chooses light mode
            // localStorage.theme = 'light'
            //
            // // Whenever the user explicitly chooses dark mode
            // localStorage.theme = 'dark'
            //
            // // Whenever the user explicitly chooses to respect the OS preference
            // localStorage.removeItem('theme')
        </script>

    </body>
</html>
