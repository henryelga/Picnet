<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Picnet</title>

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

<body class="{{ Request::is('login') || Request::is('register') ? 'auth-page' : '' }}">
    <div class="mainContainer">
        <div class="logo">
            <a href="/posts">
                <img src="/images/picnet.png">
            </a>
        </div>
        <div class="sidenav">
            <a href="/posts">
                @if (Request::is('posts'))
                    <img class="navicons" src="https://img.icons8.com/fluency-systems-filled/48/1A1A1A/home.png"
                        alt="home icon" />
                @else
                    <img class="navicons" src="https://img.icons8.com/fluency-systems-regular/48/home--v1.png"
                        alt="home icon" />
                @endif
                Home
            </a>
            @guest
                <a href="/register">
                    <img class="navicons" src="https://img.icons8.com/fluency-systems-regular/48/add-user-male--v1.png"
                        alt="register" />
                    Register
                </a>
                <a href="/login">
                    <img class="navicons" src="https://img.icons8.com/fluency-systems-regular/48/enter-2.png"
                        alt="login icon" />
                    Login
                </a>
            @else
                <a href="{{ route('posts.create') }}">
                    @if (Request::is('posts/create'))
                        <img class="navicons" src="https://img.icons8.com/fluency-systems-filled/48/1A1A1A/plus.png"
                            alt="create icon" />
                    @else
                        <img class="navicons" src="https://img.icons8.com/fluency-systems-regular/48/plus.png"
                            alt="create icon" />
                    @endif
                    Create
                </a>

                <a href="/profile">
                    @if (Request::is('profile'))
                        <img class="navicons"
                            src="https://img.icons8.com/fluency-systems-filled/48/1A1A1A/user-male-circle.png"
                            alt="user icon" />
                    @else
                        <img class="navicons"
                            src="https://img.icons8.com/fluency-systems-regular/48/user-male-circle--v1.png"
                            alt="user icon" />
                    @endif
                    Profile
                </a>
            @endguest

            @admin
                <a href="{{ route('admin.dashboard') }}">
                    @if (Request::is('admin/dashboard'))
                        <img class="navicons"
                            src="https://img.icons8.com/fluency-systems-filled/48/1A1A1A/data-configuration.png"
                            alt="admin icon" />
                    @else
                        <img class="navicons"
                            src="https://img.icons8.com/fluency-systems-regular/48/1A1A1A/data-configuration.png"
                            alt="admin icon" />
                    @endif
                    Admin
                </a>
            @endadmin

            @auth
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img
                        class="navicons flipped" img src="https://img.icons8.com/fluency-systems-regular/48/exit--v1.png"
                        alt="logout icon" />Logout</a>
            @endauth

            <!-- Logout Form -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </div>
        @yield('content')
    </div>
    @include('layouts.bottomnav')
    @stack('scripts')

</body>

</html>
