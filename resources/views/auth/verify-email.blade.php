@extends('layouts.frontapp')
@section('content')
<div class="it-breadcrumb-area it-breadcrumb-bg" data-background="assets/img/breadcrumb/breadcrumb.jpg">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="it-breadcrumb-content z-index-3 text-center">
                        <div class="it-breadcrumb-title-box">
                            <h3 class="it-breadcrumb-title">Verify Your Email</h3>
                        </div>
                        <div class="it-breadcrumb-list-wrap">
                            <div class="it-breadcrumb-list">
                                <span><a href="/">home</a></span>
                                <span class="dvdr">//</span>
                                <span>Verify</span>
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
                    <img src="{{asset('assets/img/contact/signup.jpg')}}" alt>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                            <div class="it-signup-wrap">
                                <label style="font-size:20px">Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another</label>
                                @if (session('status') == 'verification-link-sent')
                                <div class="mt-20">
                                    <span class="it-span">A new verification link has been sent to the email address you provided in your profile settings.</span>
                                </div>
                                @endif
                                <div class="mt-20">
                                <form method="POST" action="{{route('verification.send')}}">
                                    @csrf
                                    <button type="submit" class="it-btn">Resend Verification Email</button>
                                </form>
                                <div class="mt-10">
                                    <a href="{{route('profile.show')}}" class="it-btn-white">Edit Email</a>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection