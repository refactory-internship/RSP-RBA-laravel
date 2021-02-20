@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body m-3">
                        <div class="mb-3">
                            <img src="https://res.cloudinary.com/ffajarpratama/image/upload/v1613807929/public/app/laravel-logo_r6q5xg.png" alt="logo"
                                 class="d-block mx-auto"
                                 style="width: 20%">
                        </div>
                        <div class="mb-3 text-center">
                            <h3>Welcome to RSP-Laravel!</h3>
                            <h5>Log In to Your Account</h5>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ old('email') }}"
                                       autocomplete="email"
                                       aria-label="email"
                                       placeholder="Email Address">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password"
                                       autocomplete="current-password"
                                       aria-label="password"
                                       placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                           name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link float-right" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-5">
                                <button type="submit" class="btn btn-primary col-md-12">
                                    Login
                                </button>
                            </div>
                        </form>
                        <div class="text-center">
                            Need an account?
                            <a class="btn btn-link" href="{{ route('register') }}">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
