@extends('layouts.app')

@section('google-analytics')
    <meta name="robots" content="noindex">
@endsection


@section('content')

<section class="signup container">
    <h1 class="main-title">Admin Login</h1>
    <div class="form-list">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-fill-x">
                <input type="text" class="input-control input-fill" name="email" value="{{ old('email') }}"  placeholder="Email" required>
                <label class="input-label label-require">Email</label>
                <div class="error"  @error('email')style="display: block"@enderror> @error('email') {{ $message }} @enderror</div>
            </div>
            <div class="input-fill-x">

                <input type="password" name="password" class="input-control input-fill" placeholder="Password" required>
                <label class="input-label label-require">Password</label>
                <div class="error"  @error('password')style="display: block"@enderror>@error('password') {{ $message }} @enderror</div>
            </div>

            <div class="form-item">
                <input type="checkbox" class="form-checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> <span class="form-checkbox-txt">Remember Me</span>
            </div>

            <div class="form-captcha">
                {!! htmlFormSnippet() !!}
                <div class="error"  @error('g-recaptcha-response')style="display: block"@enderror>@error('g-recaptcha-response') {{ $message }} @enderror</div>
            </div>
            <div class="form-button">
                <button class="button">
                    Login
                </button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif

            </div>
        </form>
    </div>
</section>
@endsection

@section('javascript')
    <{!! htmlScriptTagJsApi() !!}
@endsection
