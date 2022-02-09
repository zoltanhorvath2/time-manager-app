<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Time Manager') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ url('css/styles.css')}}">
        <link rel="stylesheet" href="{{ url('css/table.css')}}">

        {{-- TOASTR AND JQUERY--}}
        <link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js" defer></script>
        <script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js" defer></script>

        {{-- FONTAWESOME --}}

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

        {{-- Date and timepickers --}}

        <link href = "https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css"
         rel = "stylesheet">
        <script src = "https://code.jquery.com/jquery-1.10.2.js" defer></script>
        <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js" defer></script>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/table.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
