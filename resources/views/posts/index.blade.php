@extends('layouts.app')
@section('content')
    <div class="postsContainer">
        @foreach ($posts as $post)
            <div class="post">
                <div class="posttop">
                    <img src="/images/catsleep.png">
                    <p>{{ $post->user->username }}</p>
                </div>
                <!--<img src="{{ $post->image_path }}" alt="{{ $post->caption }}">-->
                <div class="postimage">
                    <img src="/images/catsleep.png">
                </div>
                <p>{{ $post->caption }}</hp>
                <p>Created at: {{ $post->created_at }}</p>
            </div>
        @endforeach
    </div>
@endsection
