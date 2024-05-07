@extends('layouts.app')
@section('content')
    @if (Auth::user())
        <div class="profileContainer">
            <div class="profileDetails">
                <div class="pfpContainer">
                    <img src="{{ $user->pfp ? asset('storage/' . $user->pfp) : '' }}" alt="{{ $user->name }}'s profile picture">
                </div>
                <div>
                    <p><b>{{ $user->username }}</b><a class="editProfileButton" href="{{ route('editprofile') }}">Edit
                            Profile</a></p>
                    <p>{{ $user->name }}</p>
                    {{-- <p>Email: {{ $user->email }}</p> --}}
                    <p>{{ $user->bio }}</p>
                </div>
            </div>

            <div class="yourPostsContainer">
                <h2>Posts</h2>
                @if (isset($posts) && count($posts))
                    @foreach ($posts as $post)
                        @if ($post->user_id === Auth::id())
                            <div class="post">
                                <div class="posttop">
                                    {{-- <img src="/images/catsleep.png"> --}}
                                    <img src="{{ $post->user->pfp ? asset('storage/' . $post->user->pfp) : '' }}"
                                        alt="{{ $post->user->username }}'s profile picture">
                                    <b>
                                        <p>{{ $post->user->username }}</p>
                                    </b>
                                    <div class="postActions">
                                        <div class="dropdown">
                                            <button class="dropbtn">&hellip;</button>
                                            <div class="dropdown-content">
                                                <a href="{{ route('posts.edit', $post) }}">Edit</a>
                                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="deletePostButton" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
                                                <img src="{{ asset('images/red-heart.png') }}" alt="Liked"
                                                    class="like-icon">
                                            @else
                                                <img src="{{ asset('images/heart.png') }}" alt="Not Liked"
                                                    class="like-icon">
                                            @endif
                                        </button>
                                        <span class="like-count">{{ $post->likes()->count() }}</span>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
    @endif
    @endforeach
@else
    <p>You have no posts yet.</p>
    @endif
    @endif
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
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
                                'An error occurred while processing your request. Please try again later.'
                            );
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
                        //     alert(
                        //         'An error occurred while processing your request. '
                        //     );
                        // }
                    });
                }
            });
        });
    </script>
@endpush
