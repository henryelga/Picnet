@extends('layouts.app')
@section('content')
    @if (Auth::user())
        <div class="profileContainer">
            <div class="profileWrapper">
                <div class="pfpContainer">
                    <img src="{{ $user->pfp ? asset('storage/' . $user->pfp) : '' }}" alt="{{ $user->name }}'s profile picture">
                </div>
                <div class="profileDetails">
                    <p><b>{{ $user->username }}</b> <a href="{{ route('editprofile') }}">Edit Profile</a></p>
                    <p>{{ $user->name }}</p>
                    {{-- <p>Email: {{ $user->email }}</p> --}}
                    <p>{{ $user->bio }}</p>
                </div>
            </div>

            <h2>Your Posts</h2>
            @if (isset($posts) && count($posts))
                @foreach ($posts as $post)
                    @if ($post->user_id === Auth::id())
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    @endif
                    <div class="post">
                        <div class="posttop">
                            <img src="/images/catsleep.png">
                            <b>
                                <p>{{ $post->user->username }}</p>
                            </b>
                        </div>
                        <div class="postimage">
                            <img src="{{ Storage::url($post->image_path) }}" alt="{{ $post->caption }}">
                        </div>
                        <p>{{ $post->caption }}</hp>
                        <p>{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                @endforeach
            @else
                <p>You have no posts yet.</p>
            @endif
    @endif
@endsection
