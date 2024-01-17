@extends('layouts.app')
@section('content')
  <section class="account-login-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <div class="login-register-form-wrap">
                        <div class="login-register-form">
                            <div class="form-title">
                                <h4 class="title">Sign In</h4>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control @error('email') is-invalid @enderror" name="email"
                                                id="email" type="email" placeholder="Email" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control @error('password') is-invalid @enderror"
                                                id="password" type="password" placeholder="Password" name="password"
                                                required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="remember-forgot-info">
                                            <div class="remember">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="defaultCheck1">Remember me</label>
                                            </div>
                                            @if (Route::has('password.request'))
                                                <div class="forgot-password">
                                                    <a href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn-theme">{{ __('Sign In') }}</button>
                                    </div>
                                </div>

                                
                        </div>
                        </form>
                        <div class="login-register-form-info">
                            <p>Don't you have an account? <a href="{{ url('register') }}">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </section>
@endsection
