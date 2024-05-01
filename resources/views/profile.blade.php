<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
</head>

<body>
    <h1>User Profile</h1>

    <h2>User Information</h2>
    <p>Username: {{ $user->username }}</p>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Bio: {{ $user->bio }}</p>
    <img src="{{ $user->pfp }}" alt="{{ $user->name }}'s profile picture">

    <h2>User Posts</h2>
    <ul>
        @foreach ($posts as $post)
            <li>
                <h3>{{ $post->caption }}</h3>
                <img src="{{ $post->image_path }}" alt="{{ $post->caption }}">
                <p>Created at: {{ $post->created_at }}</p>
            </li>
        @endforeach
    </ul>
</body>

</html>
