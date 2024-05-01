<!DOCTYPE html>
<html>

<head>
    <title>All Posts</title>
</head>

<body>
    <h1>All Posts</h1>

    <ul>
        @foreach ($posts as $post)
            <li>
                <h3>{{ $post->caption }}</h3>
                <img src="{{ $post->image_path }}" alt="{{ $post->caption }}">
                <p>Posted by User ID: {{ $post->user_id }}</p>
                <p>Created at: {{ $post->created_at }}</p>
            </li>
        @endforeach
    </ul>
</body>

</html>
