@extends('layouts.app')
@section('content')
    @if (Auth::user())
        <h1>User Profile</h1>

        <h2>User Information</h2>
        <p>Username: {{ $user->username }}</p>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Bio: {{ $user->bio }}</p>
        <img src="{{ $user->pfp ? asset('storage/' . $user->pfp) : '' }}" alt="{{ $user->name }}'s profile picture">

        <a href="{{ route('editprofile') }}">Edit Profile</a>


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
@endsection
