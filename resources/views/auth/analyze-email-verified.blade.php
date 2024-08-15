@extends('layouts.bootstrap')

@section('content')
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="my-4">Email Verified</h1>
            <p>Your email address has been successfully verified.</p>
            <a href="{{ route('dashboard-core') }}" class="btn btn-primary">Go to Dashboard</a>
        </div>
    </div>
@endsection
