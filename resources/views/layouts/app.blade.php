<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>WanderSnap</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>

<body>
    <div class="sidenav">
        <a href="#home">Home</a>
        <a href="#temp">Temp</a>
        <a href="#temp">Temp</a>
        <a href="#temp">Temp</a>
    </div>
        @yield('content')
    </div>
</body>
</html>
