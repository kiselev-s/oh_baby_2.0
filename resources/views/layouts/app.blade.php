<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{Auth::user()->theme}}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
{{--        @vite(['resources/css/app.css', 'resources/css/styles.css', 'resources/js/app.js'])--}}

        <!-- Styles -->
        @livewireStyles

        {{--        FOR HOST      --}}
        @vite('resources/js/app.js')

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-700">

            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow dark:shadow-indigo-900 dark:bg-gray-800">
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

        <!-- For Carousel -->
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

        <!-- For Charts -->
{{--        @livewireCharts--}}
        @livewireChartsScripts
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    </body>
</html>
