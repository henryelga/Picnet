@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Post</div>

                    <div class="card-body">
                        <div class="postimage">
                            <img src="{{ Storage::url($post->image_path) }}" alt="{{ $post->caption }}" class="img-fluid">
                        </div>

                        <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="caption" class="col-md-4 col-form-label text-md-right">Caption</label>

                                <div class="col-md-6">
                                    <textarea id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption"
                                        required autocomplete="caption" autofocus>{{ $post->caption }}</textarea>

                                    @error('caption')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Post
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
