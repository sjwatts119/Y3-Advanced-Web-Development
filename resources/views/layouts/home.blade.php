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
    <div class="w-full max-h-[99.6vh]">

        @include('layouts.navigation-home')
        {{--make a container for the jumbotron and the content, yield to header--}}
        @if (isset($header))
            {{ $header }}
        @endif

    </div>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    @include('layouts.footer')

</body>
</html>
