@extends('layouts.app')
@section('content')

    <div class="postsContainer">
        @foreach ($posts as $post)
            <div class="post">
                <p>Posted by User ID: {{ $post->user_id }}</p>
                <img src="{{ $post->image_path }}" alt="{{ $post->caption }}">
                <p>{{ $post->caption }}</hp>
                <p>Created at: {{ $post->created_at }}</p>
            </div>
        @endforeach
    </div>
    @endsection