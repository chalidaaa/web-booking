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
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class=" bg-white-100 dark:bg-gray-900">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                        {{ $header }}  
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="container mt-5">    
                    @include('layouts.sidebar')
                    <div class="w-full p-[50px] mt-5 sm:ml-64">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
