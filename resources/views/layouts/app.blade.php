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
            
            <div class="hidden md:block inset-y-0 left-0 w-64 bg-white dark:bg-gray-800 shadow">
                @include('layouts.sidebar')
            </div>

            <div class="flex flex-col w-full h-full">

                <!-- Page Content -->
                <main class="overflow-auto">

                    
                    {{-- モバイルメニューボタン --}}
                    <div class="pt-4 pr-4 absolute bottom-4 right-4 sm:hidden">
                        <div class="drawer text-right">
                            <input id="my-drawer" type="checkbox" class="drawer-toggle" />
                            <div class="drawer-content">
                                <!-- Page content here -->    
                                <label for="my-drawer" class="inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-12 h-12 bg-white rounded-full p-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                    </svg>
                                </label>
                            </div> 
                            <div class="drawer-side z-50">
                                <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                                @include('layouts.sidebar')
                            </div>
                        </div>
                    </div>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
