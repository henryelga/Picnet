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
                    <p>{{ $user->bio }}</p>
                </div>
            </div>

            <h2 style="text-align: center; margin-bottom: 0">Your Posts</h2>
            <div class="postGrid">
                @if (isset($posts) && count($posts))
                    @foreach ($posts as $post)
                        <div class="post-item" data-post-id="{{ $post->id }}">
                            <div class="postimage">
                                <img src="{{ Storage::url($post->image_path) }}" alt="{{ $post->caption }}"
                                    class="post-image">
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>You have no posts yet.</p>
                @endif
            </div>
        </div>

        <!-- Modal -->
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close-button">&times;</span>
                <img id="modal-image" src="" alt="Modal Image">
            </div>
        </div>
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

            // Modal functionality
            var modal = document.getElementById("modal");
            var modalImage = document.getElementById("modal-image");
            var closeButton = document.getElementsByClassName("close-button")[0];

            $(".post-item").click(function() {
                var postId = $(this).data('post-id');
                var imageSrc = $(this).find('.post-image').attr("src");
                modalImage.src = imageSrc;
                modal.style.display = "block";
            });

            closeButton.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });
    </script>
@endpush
