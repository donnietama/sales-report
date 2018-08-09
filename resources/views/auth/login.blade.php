@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-md-8 col-lg-8 col-xl-8 welcome">
            <div class="welcome-context pl-4">
                <h1 class="display-4 text-capitalize">gulu gulu</h1>
                <p class="lead">The first authentic taiwanese cheese tea.</p>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 bg-white login-form">
            <div class="row mt-5 pt-5">
                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 offset-md-1">
                    <img src="http://www.gulugulu.id/wp-content/uploads/2018/03/instagram-head-anim2.gif" alt="logo" class="img-fluid">
                </div>
            </div>
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="pt-5 mt-5">
                @csrf

                <div class="form-group row">
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 offset-md-1">
                        <label for="email">{{ __('E-Mail') }}</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 offset-md-1">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-10 offset-md-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-10 offset-md-1 text-center">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Login') }}
                        </button>

                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        <a class="btn btn-link pt-0 mt-0" href="{{ route('register') }}">
                            Don't have account?
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
