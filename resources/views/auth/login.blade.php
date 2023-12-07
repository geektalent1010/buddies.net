@extends('layouts.app')

@section('title', __('- Log In'))

@section('PAGE_LEVEL_STYLES')
@endsection

@section('PAGE_CONTENT')
<div class="main-bg-login d-flex justify-content-center align-items-center">
    <div class="row justify-content-center">
        <div class="login-page">
            <div class="login-title text-center">
                <p>LOGIN</p>
                <span>FOR REGISTERED USERS</span>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row justify-content-center">
                    <div class="col-12">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username" required autocomplete="username" autofocus>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-12">
                        <label class="checkbox-container ml-3">
                            <input type="checkbox" class="autoplacement-submit" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                            <span class="checkbox-circle"></span>
                            <span class="checkbox-name">{{ __('REMEMBER ME') }}</span>
                        </label>
                    </div>
                </div>

                <div class="form-group row justify-content-center mb-3">
                    <div class="col-12 text-center">
                        <button type="submit" class="login-button">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
            <div class="form-group row justify-content-center">
                <div class="col-12 text-center">
                    <button class="login-button d-flex align-items-center justify-content-center" onclick="window.location.href='{{ route('register') }}'">
                        {{ __('REGISTER') }}
                    </button>
                    <div class="login-title text-center mb-0 mt-2">
                        <span>FOR NEW USERS</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('PAGE_LEVEL_SCRIPTS')
<script>
    $(document).ready(function () {
        var $usernameInput = $("#username");
        var $passwordInput = $("#password");

        function onChangeUsernameInput() {
            $usernameInput.css("background-color", "#04246b40");
            var value = $.trim($usernameInput.val());

            if (value.length === 0) {
                $usernameInput.css("background-color", "#04246b40");
            }
        }

        function onChangePasswordInput() {
            $passwordInput.css("background-color", "#04246b40");
            var value = $.trim($passwordInput.val());

            if (value.length === 0) {
                $passwordInput.css("background-color", "#04246b40");
            }
        }

        $usernameInput.on("keyup", onChangeUsernameInput);
        $passwordInput.on("keyup", onChangePasswordInput);
    });
</script>
@endsection