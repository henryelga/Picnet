@extends('layouts.app')
@section('content')
    @if (Auth::user())
        <div class="profileContainer">
            <div class="profileWrapper">
                <div class="pfpContainer">
                    <img src="{{ $user->pfp ? asset('storage/' . $user->pfp) : '' }}"
                        alt="{{ $user->name }}'s profile picture">
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
                        <div class="postDescription">
                            <div>
                                <p>{{ $post->caption }}</p>
                                <p>{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="likeButtons">
                                <button type="button" class="like-btn" data-post-id="{{ $post->id }}">
                                    @if (auth()->user() && $post->likedByUser(auth()->user()))
                                        <img src="{{ asset('images/red-heart.png') }}" alt="Liked" class="like-icon">
                                    @else
                                        <img src="{{ asset('images/heart.png') }}" alt="Not Liked" class="like-icon">
                                    @endif
                                </button>
                                <span class="like-count">{{ $post->likes()->count() }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>You have no posts yet.</p>
            @endif
    @endif
@endsection
