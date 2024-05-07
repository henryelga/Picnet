<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <title>Picnet</title>
</head>

<body>
    <div class="welcomeContainer">
        <h1>Picnet</h1>
        <div class="buttonContainer">
            <div class="reglogcontainer">
                <a class="registerbutton" href="{{ route('register') }}">Register</a>
                <a class="loginbutton" href="{{ route('login') }}">Login</a>
            </div>
            <a class="guestbutton" href="{{ route('posts.index') }}">Continue as guest</a>
        </div>
    </div>
</body>

</html>
