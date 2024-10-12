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
            <form method="POST" action="{{ route('password.update') }}" class="w-70 m-auto">
                <div class="signin-typography mb-5">
                    <h1>Reset Password</h1>
                    <p>Please enter your new password below.</p>
                </div>
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <x-mandatory-validation for="email" label="Email Address" />
                    <input type="email" class="form-control" id="email" name="email" required
                        value="{{ request()->input('email', old('email')) }}">
                </div>

                <div class="mb-3">
                    <x-mandatory-validation for="password" label="New Password" />
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword1">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <div class="mb-3">
                    <x-mandatory-validation for="password_confirmation" label="Confirm Password" />
                    <div class="input-group">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword2">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>                

                <button type="submit" class="btn btn-custom2 border border-2 w-100 mt-4">Reset Password</button>
            </form>
        </div>
    </div>

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword1 = document.querySelector('#togglePassword1');
        const passwordField1 = document.querySelector('#password');

        togglePassword1.addEventListener('click', function() {
            const type = passwordField1.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField1.setAttribute('type', type);

            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });

        const togglePassword2 = document.querySelector('#togglePassword2');
        const passwordField2 = document.querySelector('#password_confirmation');

        togglePassword2.addEventListener('click', function() {
            const type = passwordField2.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField2.setAttribute('type', type);

            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    });
</script>