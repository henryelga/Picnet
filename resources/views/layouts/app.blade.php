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
            @guest
                <a href="/register"><img class="navicons"
                        src="https://img.icons8.com/fluency-systems-regular/48/add-user-male--v1.png"
                        alt="register" />Register</a>
                <a href="/login"><img class="navicons" src="https://img.icons8.com/fluency-systems-regular/48/enter-2.png"
                        alt="login icon" />Login</a>
            @else
                <a href="{{ route('posts.create') }}"><img class="navicons"
                        src="https://img.icons8.com/fluency-systems-regular/48/plus.png" alt="create icon" />Create</a>
                <a href="/profile"><img class="navicons"
                        src="https://img.icons8.com/fluency-systems-regular/48/user-male-circle--v1.png"
                        alt="user icon" />Profile</a>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <img class="navicons flipped" img src="https://img.icons8.com/fluency-systems-regular/48/exit--v1.png"
                        alt="logout icon" />Logout</a>
            @endguest

            @admin
                <a href="{{ route('admin.dashboard') }}"><img class="navicons"
                        src="https://img.icons8.com/fluency-systems-regular/48/data-configuration.png"
                        alt="admin icon" />Admin</a>
            @endadmin

            <!-- Logout Form -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </div>
        @yield('content')
    </div>
    @stack('scripts')

</body>

</html>
