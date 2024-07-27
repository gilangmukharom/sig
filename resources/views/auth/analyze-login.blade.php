@extends('layouts.bootstrap')

@section('content')
    <div class="container-fluid d-flex flex-row min-vh-100 primary-color">

        <div class="signin-content w-100 d-none d-md-block">
            <div class="signin-logo">
                <img src="{{ asset('assets/img/logo/sig-white.png') }}" class="m-5 signin-logo-img" alt="">
            </div>
            <div class="signin-image text-center">
                <img src="{{ asset('assets/img/icon/login.png') }}" class="img-fluid" alt="Login Image">
            </div>
            <div class="signin-copyright text-center position-absolute bottom-0 w-50 text-white">
                <p>Copyright © 2024. All rights reserved.</p>
            </div>
        </div>

        <div class="signin-form d-flex flex-column justify-content-center bg-white w-100">
            <form action="{{ route('login') }}" method="POST" class="w-70 m-auto">
                <div class="signin-typography mb-5">
                    <h1>Sign in</h1>
                    <p>Welcome back! Login with your data that you entered during registration</p>
                </div>
                @csrf
                <div class="mb-3">
                    <x-mandatory-validation for="email" label="Username / Email address" />
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3 position-relative">
                    <x-mandatory-validation for="password" label="Password" />
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                <div class="signin-option d-flex flex-row justify-content-between">
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <div class="signin-forgot">
                        <a href="{{ route('password.request') }}" class="text-decoration-none text-black">Forgot Password?</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-custom border border-2 w-100 mt-4">Login</button>
                <div class="signin-register mt-3 text-center">
                    <p>Don't have account? <a href="" class="primary-color-text">Register here</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
