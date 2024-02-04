<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
  
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

        @stack('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') . '?version=' . Str::random() }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    {{-- <script>
            window.PUSHER_APP_KEY = '{{ config('broadcasting.connections.pusher.key') }}';
            window.APP_ENV = {{ config('app.env') == 'production' ? true : false }};
        </script> --}}

</head>

<body class="font-sans antialiased">


    <div class="h-32 bg-green-600">
    </div>

    <div class="absolute left-0 top-6 w-screen">
        <div class="container mx-auto">

            {{ $slot }}

        </div>
    </div>

    @stack('modals')

    @livewireScripts

    @stack('js')



</body>

</html>
