@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="formcard">
            <div class="formcard-header">Edit Post</div>

            <div class="formcard-body">
                <img style="max-height: 400px; max-width: 300px; margin-left: 8%" src="{{ Storage::url($post->image_path) }}" alt="{{ $post->caption }}">

                <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label for="caption" class="col-md-4 col-form-label text-md-right">Caption</label>

                    <textarea id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption"
                        required autocomplete="caption" autofocus>{{ $post->caption }}</textarea>

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button type="submit" class="formbtn-primary">
                        Update Post
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
