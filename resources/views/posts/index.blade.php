@extends('layouts.app')
@section('content')
    <div class="postsContainer">
        @if (isset($allPosts) && count($allPosts))
            @foreach ($allPosts as $post)
                <div class="post">
                    <div class="posttop">
                        <img src="/images/catsleep.png">
                        <b>
                            <p>{{ $post->user->username }}</p>
                        </b>
                        <div class="likeButtons">
                            <button type="button" class="like-btn" data-post-id="{{ $post->id }}">
                                @if ($post->likedByUser(auth()->user()))
                                    Like
                                @else
                                    Unlike
                                @endif
                            </button>
                        </div>

                    </div>
                    <div class="postimage">
                        <img src="{{ Storage::url($post->image_path) }}" alt="{{ $post->caption }}">
                    </div>
                    <p>{{ $post->caption }}</p>
                    <p>{{ $post->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        @else
            <p>There are no posts yet.</p>
        @endif
    </div>
@endsection
@push('scripts')
    <script>
        document.querySelectorAll('.like-btn').forEach(btn => {
            btn.addEventListener('click', async () => {
                const postId = btn.dataset.postId;
                const method = btn.textContent.trim().toLowerCase() === 'like' ? 'POST' : 'DELETE';
                const response = await fetch(`/posts/${postId}/like`, {
                    method,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                });

                if (response.ok) {
                    const data = await response.json();
                    btn.textContent = data.buttonText;
                } else {
                    alert('Error: could not update like status.');
                }
            });
        });
    </script>
@endpush
