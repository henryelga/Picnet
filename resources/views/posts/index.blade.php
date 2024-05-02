@extends('layouts.app')
@section('content')

    <div class="postContainer">
        @foreach ($posts as $post)
            <div class="post">
                <p>Posted by User ID: {{ $post->user_id }}</p>
                <img src="{{ $post->image_path }}" alt="{{ $post->caption }}">
                <h3>{{ $post->caption }}</h3>
                <p>Created at: {{ $post->created_at }}</p>
            </div>
        @endforeach
    </div>
    @endsection