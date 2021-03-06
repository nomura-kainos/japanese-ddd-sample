@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        @guest
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @endguest

                        <div class="form-group row mt-2">
                            <div class="col-md-8 offset-md-4" role="button">
                                <a href="/user/login/google" role="button">
                                    <img border="0" alt="Login with Google"
                                         src="{{ asset('/img/google?????????????????????.png') }}"
                                         width="160" height="40" />
                                </a>
                            </div>
                            <div class="col-md-8 offset-md-4">
                                <a href="/user/login/facebook" role="button">
                                    <img border="0" alt="Login with Facebook"
                                         src="{{ asset('/img/facebook?????????????????????.png') }}"
                                         width="156" height="35" />
                                </a>
                            </div>
                            <div class="col-md-8 offset-md-4">
                                <a href="/user/login/amazon" role="button">
                                    <img border="0" alt="Login with Amazon"
                                         src="https://images-na.ssl-images-amazon.com/images/G/01/lwa/btnLWA_gold_156x32.png"
                                         width="156" height="32" />
                                </a>
                            </div>
                        </div>

                        @guest
                            <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        @endguest

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
