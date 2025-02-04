@extends('layouts.app')

@section('PAGE_CONTENT')
<div class="main-bg container d-flex justify-content-center align-items-center">
    <div class="row justify-content-center">
        <div class="login-page">
            <div class="login-title text-center">
                <p class="mt-0">Confirm Password</p>
                <span>Please confirm your password before continuing.</span>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="form-group row justify-content-center">
                    <div class="col-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ old('email') }}" placeholder="E-Mail Address" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $email }}</strong>
                            </span>
                        @enderror

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row justify-content-center mb-3">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary login-button">
                            {{ __('Confirm Password') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
