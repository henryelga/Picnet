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

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>

<body>
    <div class="mainContainer">
        <div class="sidenav">
            <a href="/posts"><img class="navicons" src="https://img.icons8.com/fluency-systems-regular/48/home--v1.png"
                    alt="home icon" />Home</a>
            <a href="{{ route('posts.create') }}"><img class="navicons"
                    src="https://img.icons8.com/fluency-systems-regular/48/create--v1.png"
                    alt="create icon" />Create</a>
            <a href="/profile"><img class="navicons"
                    src="https://img.icons8.com/fluency-systems-regular/48/user-male-circle--v1.png"
                    alt="user icon" />Profile</a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <img class="navicons" src="https://img.icons8.com/fluency-systems-regular/48/user-male-circle--v1.png"
                    alt="user icon" />
                Logout
            </a>

            <!-- Logout Form -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </div>
        @yield('content')
    </div>
    </div>
</body>

</html>
