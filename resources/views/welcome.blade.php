<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/style.css" rel="stylesheet">
    <title>WanderSnap</title>
</head>

<body>
    <div class="welcomeContainer">
        <h1>WanderSnap</h1>
        <div class="buttonContainer">
            <a href="{{ route('posts.index') }}">Continue as guest</a>
            <a href="{{ route('login') }}">Login</a>
        </div>
    </div>
</body>

</html>
