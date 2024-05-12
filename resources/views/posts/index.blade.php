@extends('layouts.app')
@section('content')
    <div class="postsContainer">
        @if (isset($allPosts) && count($allPosts))
            @foreach ($allPosts as $post)
                <div class="post">
                    <div class="posttop">
                        <a href="{{ route('profile.show', $post->user) }}">
                            <img src="{{ $post->user->pfp ? asset('storage/' . $post->user->pfp) : '' }}"
                                alt="{{ $post->user->username }}'s profile picture">
                        </a>
                        <a class="profileLink" href="{{ route('profile.show', $post->user) }}">
                            <b>
                                <p>{{ $post->user->username }}</p>
                            </b>
                        </a>
                    </div>
                    <div class="postimage">
                        <img src="{{ Storage::url($post->image_path) }}" alt="{{ $post->caption }}">
                    </div>
                    <div class="postDescription">
                        <div>
                            <p>{{ $post->caption }}</p>
                            <p style="color: rgb(74, 74, 74);">{{ $post->created_at->diffForHumans() }}</p>
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
                    <div class="post-comments">
                        @auth
                        <form action="{{ route('comments.store', $post) }}" method="POST">
                            @csrf
                            <div class="comments-form">
                                <input type="text" name="content" placeholder="Add a comment" required>
                                <button type="submit">
                                    <img src="{{ asset('images/submit.png') }}" alt="Submit">
                                </button>
                            </div>
                        </form>
                        @endauth
                        {{-- <strong>Comments</strong> --}}
                        <ul>
                            @foreach ($post->comments as $comment)
                                <li>
                                    <div>
                                        <strong>{{ $comment->user->username }}</strong>: {{ $comment->content }}
                                    </div>
                                    @if ($comment->user_id === Auth::id())
                                        <div class="postActions">
                                            <div class="dropdown">
                                                <button class="dropbtn">&hellip;</button>
                                                <div class="dropdown-content">
                                                    <div class="comment-actions">
                                                        <form action="{{ route('comments.destroy', $comment) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        @else
            <p>There are no posts yet.</p>
        @endif
    </div>
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
