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
                <span id="modal-prev-btn" class="modal-btn">&lt;</span>
                <span id="modal-next-btn" class="modal-btn">&gt;</span>
                <div class="dropdown">
                    <button class="dropbtn" onclick="toggleDropdown(this)">&#8942;</button>
                    <div class="dropdown-content">
                        <a href="#" onclick="editPost($(this).closest('.post-item').index())">Edit Post</a>
                        <a href="#" onclick="deletePost($(this).closest('.post-item').index())">Delete Post</a>
                    </div>
                </div>
                <img id="modal-image" src="" alt="Modal Image">
                <div class="post-description">
                    <div>
                        <p id="modal-caption">Sample Caption</p>
                        <p id="modal-timestamp">13 minutes ago</p>
                    </div>
                    <div class="">
                        <button type="button" class="like-btn" data-post-id="{{ $post->id }}">
                            @if (auth()->user() && $post->likedByUser(auth()->user()))
                                <img src="{{ asset('images/red-heart.png') }}" alt="Liked" class="like-icon">
                            @else
                                <img src="{{ asset('images/heart.png') }}" alt="Not Liked" class="like-icon">
                            @endif
                        </button>
                        <span id="modal-like-count"></span>
                    </div>
                </div>
            </div>
        </div>

    @endif
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function toggleDropdown(button) {
            var dropdownContent = button.nextElementSibling;
            // Toggle the 'show' class on the dropdown content to display or hide it
            dropdownContent.classList.toggle("show");

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    for (var i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            };
        }

        function editPost(currentPostIndex) {
            var postId = $('.post-item').eq(currentPostIndex).data('post-id');
            window.location.href = '/posts/' + postId + '/edit';
        }

        function deletePost(currentPostIndex) {
            var postId = $('.post-item').eq(currentPostIndex).data('post-id');
            $.ajax({
                url: '/posts/' + postId,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Handle success response
                    console.log('Post deleted successfully');
                    // Close the modal after deleting the post
                    $('#modal').hide();
                    // You may also want to remove the deleted post from the grid
                    $('.post-item[data-post-id="' + postId + '"]').remove();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('An error occurred while deleting the post.');
                }
            });
        }


        $(document).ready(function() {
            $('.like-btn').click(function(e) {
                e.preventDefault();
                var postId = $(this).data('post-id');
                var $likeBtn = $(this);
                var $likeCount = $likeBtn.siblings('#modal-like-count');
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
                    });
                }
            });

            // Modal functionality
            var modal = document.getElementById("modal");
            var modalImage = document.getElementById("modal-image");
            var modalCaption = document.getElementById("modal-caption");
            var modalTimestamp = document.getElementById("modal-timestamp");
            var modalLikeCount = document.getElementById("modal-like-count");
            var closeButton = document.getElementsByClassName("close-button")[0];
            var prevButton = document.getElementById("modal-prev-btn");
            var nextButton = document.getElementById("modal-next-btn");

            var currentPostIndex = -1;
            var allPosts = $(".post-item");

            $(".post-item").click(function() {
                currentPostIndex = $(".post-item").index(this);
                updateModalContent();
                modal.style.display = "block";
            });

            closeButton.onclick = function() {
                modal.style.display = "none";
            }

            prevButton.onclick = function() {
                if (currentPostIndex > 0) {
                    currentPostIndex--;
                    updateModalContent();
                }
            }

            nextButton.onclick = function() {
                if (currentPostIndex < allPosts.length - 1) {
                    currentPostIndex++;
                    updateModalContent();
                }
            }

            function updateModalContent() {
                var currentPost = $(allPosts[currentPostIndex]);
                var imageSrc = currentPost.find('.post-image').attr("src");
                var caption = currentPost.find('.post-image').attr("alt");
                var likeCount = currentPost.find('.post-like-count').text();
                var timestamp = currentPost.find('.post-timestamp').text();

                modalImage.src = imageSrc;
                modalCaption.textContent = caption;
                modalTimestamp.textContent = timestamp;
                modalLikeCount.textContent = likeCount;
            }
        });
    </script>
@endpush
