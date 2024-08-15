@extends('layouts.bootstrap')

@section('content')
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
        <div class="text-center">
            <img src="{{ asset('assets/img/logo/logo.png') }}" class="m-3 signup-logo-img" alt="Logo SIG">
            <h1 class="my-4">Verify Your Email Address</h1>
            <p>
                Thanks for registering! Please check your inbox and click the verification link in the email we sent you.
            </p>
            <p>
                If you did not receive the email, you can request another:
            </p>
            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-custom2 border border-2">Resend Verify Email</button>
            </form>
        </div>
    </div>

    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        });
    </script>
    @endif

    @if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        });
    </script>
    @endif
@endsection
