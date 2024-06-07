@extends('layouts.frontapp')
@section('content')
    <div class="it-breadcrumb-area it-breadcrumb-bg" data-background="assets/img/breadcrumb/breadcrumb.jpg">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="it-breadcrumb-content z-index-3 text-center">
                        <div class="it-breadcrumb-title-box">
                            <h3 class="it-breadcrumb-title">SignIn</h3>
                        </div>
                        <div class="it-breadcrumb-list-wrap">
                            <div class="it-breadcrumb-list">
                                <span><a href="/">home</a></span>
                                <span class="dvdr">//</span>
                                <span>SignIn</span>
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
                        <form method="POST" action="{{route('login')}}">
                            @csrf
                            <div class="it-signup-wrap">
                                <h4 class="it-signup-title">sign In</h4>
                                @error('email')
                                    <div class="alert alert-danger">Email yang anda masukan Belum ada atau salah !</div>
                                @enderror
                                 @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <div class="it-signup-input-wrap">
                                    <div class="it-signup-input mb-20">
                                        <input type="email" placeholder="Email *" name="email" required autofocus autocomplete="username">
                                    </div>
                                    <div class="it-signup-input mb-20">
                                        <input type="password" placeholder="Password *" name="password" required autocomplete="current-password">
                                    </div>
                                </div>
                                <div class="it-signup-forget d-flex justify-content-between flex-wrap">
                                    <a class="mb-20" href="{{route('password.request')}}">Forgot Password?</a>
                                    <div class="it-signup-agree mb-20">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="it-signup-btn mb-40">
                                    <button class="it-btn large">sign In</button>
                                </div>
                                <div class="it-signup-text">
                                    <span>Don't have an account?<a href="{{route('register')}}">Daftar/Register</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
