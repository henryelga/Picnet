<!DOCTYPE html>
<html>

<head>
    <title>All Posts</title>
</head>

<body>
    <h1>All Posts</h1>

    @if (Auth::user())
        <h2>Your Posts</h2>
        @if (isset($posts) && count($posts))
            <ul>
                @foreach ($posts as $post)
                    <li>
                        <h3>{{ $post->caption }}</h3>
                        <img src="{{ $post->image_path }}" alt="{{ $post->caption }}">
                        <p>Created at: {{ $post->created_at }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p>You have no posts yet.</p>
        @endif
    @endif

    <h2>All Posts</h2>
    @if (isset($allPosts) && count($allPosts))
        <ul>
            @foreach ($allPosts as $post)
                <li>
                    <h3>{{ $post->caption }}</h3>
                    <img src="{{ $post->image_path }}" alt="{{ $post->caption }}">
                    <p>Posted by User ID: {{ $post->user_id }}</p>
                    <p>Posted by: {{ $post->user->name }}</p>
                    <p>Created at: {{ $post->created_at }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>There are no posts yet.</p>
    @endif
</body>

</html>
