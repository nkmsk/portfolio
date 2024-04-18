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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

        {{-- yubinbango --}}
        <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="h-screen flex bg-gray-100 dark:bg-gray-900">
            
            <div class=" inset-y-0 left-0 w-64 bg-white dark:bg-gray-800 shadow">
                @include('layouts.sidebar')
            </div>

            <div class="flex flex-col w-full h-full">

                <!-- Page Content -->
                <main class="overflow-auto">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
