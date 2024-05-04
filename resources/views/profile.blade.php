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
                    <div class="post">
                        <div class="posttop">
                            <img src="/images/catsleep.png">
                            <b>
                                <p>{{ $post->user->username }}</p>
                            </b>
                            <div class="likeButtons">
                                @if ($post->likes->contains(auth()->user()))
                                    <form action="{{ route('posts.unlike', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Unlike</button>
                                    </form>
                                @else
                                    <form action="{{ route('posts.like', $post) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Like</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <div class="postimage">
                            <img src="{{ Storage::url($post->image_path) }}" alt="{{ $post->caption }}">
                        </div>
                        <p>{{ $post->caption }}</p>
                        <p>{{ $post->created_at->diffForHumans() }}</p>
                        @if ($post->user_id === Auth::id())
                            <div class="postActions">
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            @else
                <p>You have no posts yet.</p>
            @endif
    @endif
@endsection
