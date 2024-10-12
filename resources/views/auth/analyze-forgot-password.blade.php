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
            <form method="POST" action="{{ route('password.email') }}" class="w-70 m-auto">
                <div class="signin-typography mb-5">
                    <h1>Forgot Password</h1>
                    <p>Please enter your email address to receive a password reset link.</p>
                </div>
                @csrf
                <div class="mb-3">
                    <x-mandatory-validation for="email" label="Email Address" />
                    <input type="email" class="form-control" id="email" name="email" required autofocus>
                </div>

                <button type="submit" class="btn btn-custom2 border border-2 w-100 mt-4">Send Password Reset Link</button>
            </form>
        </div>
    </div>

    @if (session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('status') }}',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: '{{ $errors->first() }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
    @endif
@endsection
