@extends('layouts.frontapp')
@section('content')
    <div class="it-breadcrumb-area it-breadcrumb-bg" data-background="assets/img/breadcrumb/breadcrumb.jpg">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="it-breadcrumb-content z-index-3 text-center">
                        <div class="it-breadcrumb-title-box">
                            <h3 class="it-breadcrumb-title">SignUp</h3>
                        </div>
                        <div class="it-breadcrumb-list-wrap">
                            <div class="it-breadcrumb-list">
                                <span><a href="/">home</a></span>
                                <span class="dvdr">//</span>
                                <span>SignUp</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="it-signup-area pt-120 pb-120">
        <div class="container">
            <div class="it-signup-bg p-relative">
                <div class="it-signup-thumb d-none d-lg-block">
                    <img src="assets/img/contact/signup.jpg" alt>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="it-signup-wrap">
                                <h4 class="it-signup-title">sign up</h4>
                                <div class="it-signup-input-wrap mb-40">
                                    <div class="it-signup-input mb-20">
                                        <input type="text" placeholder="Full Name *" name="name" required autofocus
                                            autocomplete="name">
                                    </div>
                                    <div class="it-signup-input mb-20">
                                        <input type="text" placeholder="No Telepon" name="phone" required autofocus
                                            autocomplete="phone">
                                    </div>
                                    <div class="it-signup-input mb-20">
                                        <input type="text" placeholder="alamat *" name="alamat" required autofocus
                                            autocomplete="alamat">
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger">Email yang anda masukan sudah terdaftar !</div>
                                    @enderror
                                    <div class="it-signup-input mb-20">
                                        <input type="email" placeholder="Email *" name="email" required autofocus
                                            autocomplete="username">
                                    </div>
                                    <div class="it-signup-input mb-20">
                                        <input type="password" placeholder="Password *" name="password"
                                            autocomplete="new-password">
                                    </div>
                                    <div class="it-signup-input mb-20">
                                        <input type="password" placeholder="Confirm Password *" name="password_confirmation"
                                            required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="it-signup-btn mb-40">
                                    <button class="it-btn large">sign up</button>
                                </div>
                                <div class="it-signup-text">
                                    <span>Already have an account? <a href="{{ route('login') }}">Sign In</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
