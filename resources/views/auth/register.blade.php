@extends('layouts.app')

@section('content')
    <div class="card-container">
        <div class="card">
            <div class="card-header">{{ __('Register') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        {{-- <label for="name">{{ __('Name') }}</label> --}}

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        {{-- <label for="username">{{ __('Username') }}</label> --}}

                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username') }}" placeholder="Username" required autocomplete="username" autofocus>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        {{-- <label for="email">{{ __('Email Address') }}</label> --}}

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Email address" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        {{-- <label for="password">{{ __('Password') }}</label> --}}

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        {{-- <label for="password-confirm">{{ __('Confirm Password') }}</label> --}}

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        placeholder="Confirm password" required autocomplete="new-password">
                    </div>

                    <div class="submitButton">
                        <div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
