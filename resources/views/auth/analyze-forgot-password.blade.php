@extends('layouts.bootstrap')
@section('content')
<div class="container">
    <h2>Forgot Password</h2>
    <p>Please enter your email address to receive a password reset link.</p>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" class="form-control" required autofocus>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Send Password Reset Link</button>
    </form>
</div>
@endsection