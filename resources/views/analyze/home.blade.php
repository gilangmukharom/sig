@extends('layouts.bootstrap')
@section('content')
    <header class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <div class="container-fluid">
                <img src="{{ asset('assets/img/logo/sig2.png') }}" class="navbar-brand img-fluid img-logo" alt="">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link primary-color-text" aria-current="page" href="#"><b>Home</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link primary-color-text" href="#"><b>About Us</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link primary-color-text" href="#"><b>Contact Us</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container w-80">
        <div class="hero-banner d-flex flex-rows gap-5">
            <div class="banner-content d-flex flex-column gap-1 justify-content-center">
                <h1 class="text-justify w-80"><b>Manage your emitten for Bussiness Growth</b></h1>
                <p class="text-justify w-80">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt eligendi enim
                    reiciendis laboriosam
                    vero, iure ut temporibus, at aliquid quis necessitatibus repudiandae, laborum obcaecati dolores.
                    Provident eveniet iste ratione iusto.</p>
                <button class="btn bg-white border w-50 w-md-100 p-2 btn-custom">Get Started</button>
            </div>
            <div class="banner-img img-fluid d-none d-md-block">
                <img src="{{ asset('assets/img/hero/hero-1.png') }}" alt="">
            </div>
        </div>

        <div class="features mt-5">
            <div class="features-typography">
                <p><b>Features</b></p>
                <h3>Explore Our Features</h3>
                <p class="text-justify w-25">Uncover the power of SIG with a detailed look at the tools and capabilities that
                    make full access emiten.</p>
            </div>
            <div class="features-card d-flex flex-column flex-md-row">
                <div class="card border-0 bg-transparent">
                    <div class="card-header border-0 bg-transparent">
                        <img src="{{ asset('assets/img/icon/7.png') }}" alt="">
                    </div>
                    <div class="card-body border-0 bg-transparent">
                        <p><b>Analytics Dashboard</b></p>
                    </div>
                    <div class="card-footer border-0 bg-transparent">
                        <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi modi nam odio
                            nihil aut molestiae,
                            ullam cum illum facere aspernatur quam ratione consequatur quisquam omnis quaerat doloremque,
                            dolorem neque incidunt.</p>
                    </div>
                </div>
                <div class="card border-0 bg-transparent">
                    <div class="card-header border-0 bg-transparent">
                        <img src="{{ asset('assets/img/icon/7.png') }}" alt="">
                    </div>
                    <div class="card-body border-0 bg-transparent">
                        <p><b>Analytics Dashboard</b></p>
                    </div>
                    <div class="card-footer border-0 bg-transparent">
                        <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi modi nam odio
                            nihil aut molestiae,
                            ullam cum illum facere aspernatur quam ratione consequatur quisquam omnis quaerat doloremque,
                            dolorem neque incidunt.</p>
                    </div>
                </div>
                <div class="card border-0 bg-transparent">
                    <div class="card-header border-0 bg-transparent">
                        <img src="{{ asset('assets/img/icon/7.png') }}" alt="">
                    </div>
                    <div class="card-body border-0 bg-transparent">
                        <p><b>Analytics Dashboard</b></p>
                    </div>
                    <div class="card-footer border-0 bg-transparent">
                        <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi modi nam odio
                            nihil aut molestiae,
                            ullam cum illum facere aspernatur quam ratione consequatur quisquam omnis quaerat doloremque,
                            dolorem neque incidunt.</p>
                    </div>
                </div>
            </div>

            <div class="about-us mt-5 d-flex flex-column flex-md-row gap-5">
                <div class="about-us-image">
                    <img class="img-fluid" src="{{ asset('assets/img/hero/hero-6.png') }}" alt="">
                </div>
                <div class="about-us-typography">
                    <h3>About Us</h3>
                    <p class="text-justify">Didirikan Pada Tahun 2021, SIG Group Telah Berkembang menjadi Salah Satu Grup
                        Bisnis Keuangan dan
                        Memiliki Komunitas Investor Syariah Terbesar di indonesia.</p>
                    <p class="text-justify">SIG Group Telah Berkomitmen dalam Bidang Keuangan Yaitu Lembaga Sertifikasi,
                        Keuangan, Lembaga Pendidikan, Agen Investasi dan Konsultan Investasi.</p>
                </div>
            </div>
        </div>

        <div class="excess-typography mt-5">
            <h3 class="w-25"><b>With SIG buy famous emitten stock easily</b></h3>
            <ul class="mt-5 list-unstyled">
                <li>1. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ullam at quaerat quos. Omnis expedita
                    beatae</li>
                <li>2. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ullam at quaerat quos. Omnis expedita
                    beatae</li>
                <li>3. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ullam at quaerat quos. Omnis expedita
                    beatae</li>
                <li>4. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ullam at quaerat quos. Omnis expedita
                    beatae</li>
            </ul>
        </div>
    </div>
    <div class="container-fluid primary-color mt-5">
        <div class="trial-signup d-flex flex-column flex-md-row w-80 m-auto pt-5 pb-5">
            <div class="trial-typography w-100 text-white m-auto">
                <h3>Start Your Trial</h3>
                <p>Sign up now to access a free trial of our platform</p>
            </div>
            <div class="trial-form w-100">
                <form action="" class="d-flex flex-column gap-5">
                    <input type="text" class="rounded border-0 p-2">
                    <input type="text" class="rounded border-0 p-2">
                    <button type="submit" class="btn bg-white primary-color-text w-50 p-2">Sign Up</button>
                </form>
            </div>
        </div>
        <div class="partner bg-black w-80 m-auto mt-5 text-center pt-5 pb-5 rounded">
            <h1 class="pb-5">Our Partner</h1>
            <div class="partner-img d-flex flex-row justify-content-center align-items-center gap-2 pb-5">
                <img src="{{ asset('assets/img/brand/brand-1-1.png') }}" alt="">
                <img src="{{ asset('assets/img/brand/brand-1-1.png') }}" alt="">
                <img src="{{ asset('assets/img/brand/brand-1-1.png') }}" alt="">
                <img src="{{ asset('assets/img/brand/brand-1-1.png') }}" alt="">
                <img src="{{ asset('assets/img/brand/brand-1-1.png') }}" alt="">
            </div>
        </div>

        <footer class="d-flex flex-row mt-5 w-80 m-auto">
            <div class="footer-logo w-100">
                <img src="{{ asset('assets/img/logo/sig-white.png') }}" class="mb-5" alt="">
                <div class="footer-terms d-flex flex-row gap-2">
                    <a href="" class="text-white">Privacy Policy</a>
                    <a href="" class="text-white">Term of Service</a>
                    <a href="" class="text-white">Cookie Policy</a>
                </div>
            </div>
            <div class="footer-nav w-100">
                <ul class="list-unstyled d-flex flex-row justify-content-around">
                    <li>
                        <div class="d-flex flex-column gap-3">
                            <a href="" class="text-decoration-none text-white">About Us</a>
                            <a href="" class="text-decoration-none text-white">Contact Us</a>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex flex-column gap-3 text-center">
                            <a href="" class="text-decoration-none text-white">Partners</a>
                            <img src="{{ asset('assets/img/logo/midtrans.png') }}" alt="">
                        </div>
                    </li>
                    <li>
                        <div class="d-flex flex-column gap-3 text-center">
                            <a href="" class="text-decoration-none text-white">Social Media</a>
                            <div class="socmed-btn">
                                <img src="{{ asset('assets/img/logo/instagram.png') }}" alt="">
                                <img src="{{ asset('assets/img/logo/twitter.png') }}" alt="">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </footer>
        <div class="w-100 m-auto mt-4">
            <hr class="text-white">
        </div>
        <div class="footer-copyright m-auto p-2">
            <p class="text-center text-white">Copyright © 2024 SIG Group. All Rights Reserved</p>
        </div>
    </div>
@endsection
