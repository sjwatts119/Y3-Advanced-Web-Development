<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $theme->company_name }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="w-full">

        @include('layouts.navigation-home')
        {{--make a container for the jumbotron and the content, yield to header--}}
        @if (isset($header))
            {{ $header }}
        @endif

    </div>

    <div class="absolute inset-0 -z-10 h-[calc(70rem)] w-full bg-[radial-gradient(#DBDCDE_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="absolute top-0 z-[-11] h-[calc(70rem)] w-full rotate-180 transform bg-white bg-[radial-gradient(60%_120%_at_50%_50%,hsla(0,0%,100%,0)_0,rgba(252,205,238,.99)_100%)]"></div>


    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    @include('layouts.footer')

</body>
</html>
