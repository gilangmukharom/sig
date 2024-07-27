@extends('layouts.bootstrap')

@section('content')
    <div class="container-fluid min-vh-100">
        <div class="logo">
            <img src="{{ asset('assets/img/logo/logo.png') }}" class="m-3 signup-logo-img" alt="">
        </div>
        <div class="form-typography container">
            <h1>Register</h1>
            <p>Welcome back! Login with your data that you entered during registration</p>
        </div>
        <form action="" class="w-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <x-mandatory-validation for="fullname" label="Full Name" />
                            <input type="text" class="form-control" id="fullName" placeholder="Please input full name ...">
                        </div>
                        <div class="mb-3">
                            <x-mandatory-validation for="email" label="Email" />
                            <input type="email" class="form-control" id="email" placeholder="Please input email ...">
                        </div>
                        <div class="mb-3">
                            <x-mandatory-validation for="address" label="Address" />
                            <input type="text" class="form-control" id="address" placeholder="Please input address ...">
                        </div>
                        <div class="mb-3">
                            <x-mandatory-validation for="password" label="Password" />
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" placeholder="Please input password ..." required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <x-mandatory-validation for="username" label="Username" />
                            <input type="text" class="form-control" id="username" placeholder="Please input username ...">
                        </div>
                        <div class="mb-3">
                            <x-mandatory-validation for="phone" label="Mobile Phone" />
                            <input type="tel" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" class="form-control" id="phone" placeholder="Please input phone number ...">
                        </div>
                        <div class="mb-3">
                            <x-mandatory-validation for="work" label="Work" />
                            <input type="text" class="form-control" id="work" placeholder="Please input work ...">
                        </div>
                        <div class="mb-3">
                            <x-mandatory-validation for="confirmpassword" label="Password" />
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirmpassword" placeholder="Please input confirm password ..." required>
                                <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-start mt-3">
                    <button type="submit" class="btn btn-custom border border-2 w-25">Sign up</button>
                </div>
            </div>
        </form>
    </div>
@endsection
