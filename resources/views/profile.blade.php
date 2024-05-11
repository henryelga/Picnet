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
                        <a href="{{ route('posts.edit', $post) }}" class="btn-sm">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    @endif
                    <div class="post">
                        <div class="posttop">
                            {{-- <img src="/images/catsleep.png"> --}}
                            <img src="{{ $post->user->pfp ? asset('storage/' . $post->user->pfp) : '' }}"
                                alt="{{ $post->user->username }}'s profile picture">
                            <b>
                                <p>{{ $post->user->username }}</p>
                            </b>
                        </div>
                        <div class="postimage">
                            <button class="prev-btn">
                                <i class="fas fa-arrow-left"></i>
                            </button>
                            <div class="image-container">
                                @foreach ($post->image_paths as $imagePath)
                                    <img src="{{ Storage::url($imagePath) }}" alt="{{ $post->caption }}"
                                        class="post-image">
                                @endforeach
                            </div>
                            <button class="next-btn">
                                <i class="fas fa-arrow-right"></i>
                            </button>
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
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const prevBtns = document.querySelectorAll('.prev-btn');
            const nextBtns = document.querySelectorAll('.next-btn');
            const imageContainers = document.querySelectorAll('.image-container');

            imageContainers.forEach((container, index) => {
                const images = container.querySelectorAll('.post-image');
                let currentIndex = 0;

                // Event listener for previous button
                prevBtns[index].addEventListener('click', () => {
                    currentIndex = (currentIndex - 1 + images.length) % images.length;
                    scrollToImage(container, currentIndex);
                });

                // Event listener for next button
                nextBtns[index].addEventListener('click', () => {
                    currentIndex = (currentIndex + 1) % images.length;
                    scrollToImage(container, currentIndex);
                });
            });

            function scrollToImage(container, index) {
                const images = container.querySelectorAll('.post-image');
                images[index].scrollIntoView({
                    behavior: 'smooth',
                    inline: 'center'
                });
            }

            $('.like-btn').click(function(e) {
                e.preventDefault();
                var postId = $(this).data('post-id');
                var $likeBtn = $(this);
                var $likeCount = $likeBtn.siblings('.like-count');
                var $likeIcon = $likeBtn.find('.like-icon');

                // Check if the button has the "heart-filled" class
                if ($likeIcon.attr('src') === '{{ asset('images/red-heart.png') }}') {
                    // Unlike the post
                    $.ajax({
                        url: '/posts/' + postId + '/unlike',
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $likeIcon.attr('src', '{{ asset('images/heart.png') }}');
                            $likeIcon.attr('alt', 'Not Liked');
                            $likeCount.text(response.likeCount);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            alert(
                                'An error occurred while processing your request. Please try again later.');
                        }
                    });
                } else {
                    // Like the post
                    $.ajax({
                        url: '/posts/' + postId + '/like',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $likeIcon.attr('src', '{{ asset('images/red-heart.png') }}');
                            $likeIcon.attr('alt', 'Liked');
                            $likeCount.text(response.likeCount);
                        },
                        // error: function(xhr, status, error) {
                        //     console.error(error);
                        //     alert('An error occurred while processing your request.');
                        // }
                    });
                }
            });
        });
    </script>
@endpush
