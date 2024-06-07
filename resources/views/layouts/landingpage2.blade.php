<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIG GROUP</title>
    <!-- my font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,700;1,200;1,700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gantari:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- my style -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom-animation.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon_xoft.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome-pro.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/spacing.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/primary1.css')}}">
    <!-- my icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
  <button class="whatsapp" onclick="window.location.href='https://api.whatsapp.com/send?phone=0811201955'">
    <svg xmlns="http://www.w3.org/2000/svg" height="50" width="50" viewBox="0 0 448 512">
        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
        <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 
        10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 
        341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 
        34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 
        4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 
        0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 
        4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg></button>
    <nav class="navbar" id="navbar">
        <a href="#" class="navbar-logo">Sig <span>Institute</span></a>
        <div class="navbar-utama">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#sig">Kelas</a>
            <a href="#contact">Kontak</a>
            @if(Route::has('login'))
            @auth
            <li class="logout"> 
            <form method="POST" action="{{ route('logout') }}">
             @csrf
              <button type="submit" class="it-btn-ijo">Logout</button>
                </form></li>
            @else
            <li class="logout">
             <a href="{{route('login')}}">Login</a></li>
             @endauth
            @endif
        </div>
        <div class="navbar-extra">
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
          @if(Route::has('login'))
            @auth
              <div class="it-header-2-right d-flex align-items-center justify-content-end">
                  @if(Session('cart') >= 1)
                  <div class="it-header-2-icon">
                      <a href="{{route('cart')}}">
                         <i class="fa-sharp fa-regular fa-cart-shopping"></i>
                      </a>
                  </div>
                  @endif
                  <div class="col tombollogout">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle it-btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>{{Auth::user()->name}}</span>
                      </a>
                      <ul class="dropdown-menu justify-content-center">
                        <li> <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <button type="submit" class="it-btn-ijo">Logout</button>
                          </form></li>
                      </ul>
                    </li>
                  </div>
              </div>
          @else
          <div class="col-xl-3 col-6">
              <div class="it-header-2-right d-flex align-items-center justify-content-end">
                  <div class="d-none d-md-block">
                      <a class="it-btn" href="{{route('login')}}">Login
                      </a>
                  </div>
              </div>
          </div>
          @endauth
          @endif
        </div>
    </nav>

    <!-- hero section start-->
    <section class="hero" id="home">
        <main class="content">
            <h1>Siap Menjadi Investor Handal ?</h1>
            <h3 class="subjudul">Pelajari Investasi dari Dasar Hingga Mahir dengan <span>Special Class
                    Program dari SIG</span>
            </h3>
            <a href="{{route('register')}}" class="cta">Daftar Sekarang</a>
            <a href="#about" class="cta">Baca Selengkapnya</a>
        </main>
    </section>
    <!-- hero section end-->

    {{-- about section start --}}
    <section id="about" class="about">
        <h2><span>Tentang </span>Special Class Program</h2>


        <div class="row">
            <div class="about-img">
                <img src="{{asset('assets/img/landing/specialclass2.png')}}" alt="Tentang Kami">
            </div>

            <div class="content">
                <h1>Apa itu Program Special Class ?</h1>
                <h3>Program Spesial Class adalah sebuah program yang cocok bagi anda untuk mempelajari aktivitas investasi dari tingkatan basic sampai dengan advance.
                </h3>
                <h3>Dengan Topik bahasan yang komprehensif serta pendekatan praktikal oleh para mentor, menjadikan program special class ini lebih reliabel antara teori dan juga praktik dilapangan.</h3>
                <h3>Difasilitasi program 1 on 1 coaching service oleh mentor yang juga seorang praktisi pasar modal, memberikan kesempatan yang luas untuk mengetahui informasi-informasi yang tidak dijelaskan dalam kelas.</h3>
            </div>
        </div>
    </section>

    {{-- about section end --}}
    {{-- benefit section start --}}
    <section class="categories-area bottom-padding position-relative">
      <div class="container">
      <div class="row justify-content-center">
      <div class="col-xl-9 col-lg-8 col-md-10">
      
      <div class="section-title text-center mb-60">
      <h2>Benefit yang kamu dapatkan</h2>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
      <div class="single-cat mb-50">
      <h5><a href="services.html">50+ Kompetensi</a></h5>
      <div class="cat-icon">
        <img src="{{asset('assets/img/icon/1.png')}}" alt="teacher"/>
      </div>
      <div class="cat-cap">
      <p>lebih dari 50 list kompetensi yang akan disampaikan</p>
      </div>
      </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
      <div class="single-cat mb-50">
      <h5><a href="#">Pengajar</a></h5>
      <div class="cat-icon">
      <img src="{{asset('assets/img/icon/2.png')}}" alt>
      </div>
      <div class="cat-cap">
      <p>⁠Pengajar yang merupakan praktisi dan akademisi pasar modal</p>
      </div>
      </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
      <div class="single-cat mb-50">
      <h5><a href="#">Service</a></h5>
      <div class="cat-icon">
      <img src="{{asset('assets/img/icon/3.png')}}" alt>
      </div>
      <div class="cat-cap">
      <p>⁠Fasilitas 1 on 1 coaching services</p>
      </div>
      </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
      <div class="single-cat mb-50">
      <h5><a href="services.html">After Sales Service</a></h5>
      <div class="cat-icon">
      <img src="{{asset('assets/img/icon/4.png')}}" alt>
      </div>
      <div class="cat-cap">
      <p>After sales service berupa grup diskusi dan akses informasi bursa saham</p>
      </div>
      </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
        <div class="single-cat mb-50">
        <h5><a href="services.html">Materi</a></h5>
        <div class="cat-icon">
        <img src="{{asset('assets/img/icon/5.png')}}" alt>
        </div>
        <div class="cat-cap">
        <p>Salinan berupa vidio recording dan materi bahan ajar</p>
        </div>
        </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
          <div class="single-cat mb-50">
          <h5><a href="services.html">Opening Account</a></h5>
          <div class="cat-icon">
          <img src="{{asset('assets/img/icon/6.png')}}" alt>
          </div>
          <div class="cat-cap">
          <p>Opening Account Sekuritas(Salah satu top broker Indonesia)</p>
          </div>
          </div>
          </div>
      </div>
      </div>
      <div class="shape-s1 d-none d-xxl-block">
      <img src="assets/img/gallery/shape-1.png" alt>
      </div>
      <div class="shape-s2 d-none d-xl-block">
      <img src="assets/img/gallery/shape-2.png" alt>
      </div>
      </section>


    {{-- benefit section end --}}
      {{-- Overview Materi Section Start --}}
      <section id="materi" class="materi">
        <div class="container">
          <h2>Overview Materi</h2>
            <div class="wrapper">
              <input type="radio" id="radioYour Account" name="accordion" checked="checked"/>
              <label class="item" for="radioYour Account">
                <div class="title">Pengantar Personal Finance</div>
                <div class="contents">Rangkaian kegiatan spesial class dimulai dengan fundamental building berkaitan dengan pendalaman personal finance. Kami akan membawakan konsep secara komprehensif berkaitan dengan bagaimana mengelola keuangan secara sehat efektif dan produktif. </div>
              </label>
              <input type="radio" id="radioPayment &amp; Pricing" name="accordion"/>
              <label class="item" for="radioPayment &amp; Pricing">
                <div class="title">Pengantar Investasi</div>
                <div class="contents">Pada sesi ini, kami akan membawakan sebuah topik bahasan berkaitan konsep awal  investasi. Dimulai dari pengenalan hingga perencanaan keuangan dan investasi.</div>
              </label>
              <input type="radio" id="radioReturns &amp; Refunds" name="accordion"/>
              <label class="item" for="radioReturns &amp; Refunds">
                <div class="title">Pengantar Pasar Modal Syariah</div>
                <div class="contents">Sebagaimana banyak narasi yang berkembang berkaitan dengan ke syariah an investasi saham, dalam section ini kami akan memberikan diskusi pasar modal syariah. Dimulai dari dasar-dasar pasar modal syariah sampaikan dengan teknis pasar modal syariah.</div>
              </label>
              <input type="radio" id="radioShipping &amp; Pickup" name="accordion"/>
              <label class="item" for="radioShipping &amp; Pickup">
                <div class="title">Pengantar Analisis Saham</div>
                <div class="contents">Dalam section ini kita akan masuk ke dalam teknis analisa dengan pendekatan top down analysis meliputi perkembangan makro ekonomi, industri hingga analisa kualitatif dan kuantitatif emiten. Tidak lupa kami juga akan membahas dari aspek harga sebagai konfirmasi timing jual atau beli.</div>
              </label>
              <input type="radio" id="radioViewing &amp; Changing Orders" name="accordion"/>
              <label class="item" for="radioViewing &amp; Changing Orders">
                <div class="title">Analisa Fundamental dan Teknikal Lanjutan</div>
                <div class="contents">Pada section ini, kami akan memberikan tutorial atas konseptual yang sudah didiskusikan pada pertemuan sebelumnya. Aspek yang akan didiskusikan adalah pelaksanaan teknis dengan optimasi fasilitas sekuritas dalam aspek analisis fundamental dan teknikal.</div>
              </label>
              <input type="radio" id="radioView &amp; Changing" name="accordion"/>
              <label class="item" for="radioView &amp; Changing">
                <div class="title">Management Portofolio</div>
                <div class="contents">Pada section ini, kami akan memberikan tutorial atas konseptual yang sudah didiskusikan pada pertemuan sebelumnya. Aspek yang akan didiskusikan adalah pelaksanaan teknis dengan optimasi fasilitas sekuritas dalam aspek analisis fundamental dan teknikal.</div>
              </label>
            </div>
          </div>
      </section>
      {{-- Overview Materi Section End --}}
    {{-- Our Team Section Start --}}
     <section id="team" class="team">
        <h2>Getting Closer with Our Expert </h2>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4 mb-15">
              <a data-bs-toggle="modal" data-bs-target="#exampleModal">
              <div class="card mb-5">
                <div class="row g-0">
                  <div class="col-md-4">
                    <a type="button" class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="{{asset('assets/img/team/melly.jpg')}}" class="foto-pemateri" alt="..."></a>
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <p class="pemateri">Expert Coaches</p>
                        <a type="button" class="card-title underline" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Melly Siti Maryam, S.E., AWP
                        </a>
                      <div class="row">
                        <div class="social-media">
                        <a href="https://www.linkedin.com/in/melly-siti-maryam-913348153?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" class="social-media"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 48 48">
                          <path fill="#0078d4" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5	V37z"></path><path d="M30,37V26.901c0-1.689-0.819-2.698-2.192-2.698c-0.815,0-1.414,0.459-1.779,1.364	c-0.017,0.064-0.041,0.325-0.031,1.114L26,37h-7V18h7v1.061C27.022,18.356,28.275,18,29.738,18c4.547,0,7.261,3.093,7.261,8.274	L37,37H30z M11,37V18h3.457C12.454,18,11,16.528,11,14.499C11,12.472,12.478,11,14.514,11c2.012,0,3.445,1.431,3.486,3.479	C18,16.523,16.521,18,14.485,18H18v19H11z" opacity=".05"></path><path d="M30.5,36.5v-9.599c0-1.973-1.031-3.198-2.692-3.198c-1.295,0-1.935,0.912-2.243,1.677	c-0.082,0.199-0.071,0.989-0.067,1.326L25.5,36.5h-6v-18h6v1.638c0.795-0.823,2.075-1.638,4.238-1.638	c4.233,0,6.761,2.906,6.761,7.774L36.5,36.5H30.5z M11.5,36.5v-18h6v18H11.5z M14.457,17.5c-1.713,0-2.957-1.262-2.957-3.001	c0-1.738,1.268-2.999,3.014-2.999c1.724,0,2.951,1.229,2.986,2.989c0,1.749-1.268,3.011-3.015,3.011H14.457z" opacity=".07"></path><path fill="#fff" d="M12,19h5v17h-5V19z M14.485,17h-0.028C12.965,17,12,15.888,12,14.499C12,13.08,12.995,12,14.514,12	c1.521,0,2.458,1.08,2.486,2.499C17,15.887,16.035,17,14.485,17z M36,36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698	c-1.501,0-2.313,1.012-2.707,1.99C24.957,25.543,25,26.511,25,27v9h-5V19h5v2.616C25.721,20.5,26.85,19,29.738,19	c3.578,0,6.261,2.25,6.261,7.274L36,36L36,36z"></path>
                          </svg></a>
                      </div>
                    </div>
                      <p class="card-text">Kenalkan, salah satu mentor kami. Ia biasa dipanggil Melly. Saat ini ia merupakan seorang Karyawan BUMN. Kegiatan sehari-hari ia adalah memberikan pelayanan kepada Nasabah. 
                        Selain itu ia juga aktif dalam berbagai aktivitas internal dan juga eksternal 
                        dalam hal edukasi berkaitan dengan finance/Investasi.
                      </p>
                        <span class="license">Education and License :</span>
                        <br>
                        <span class="license">Bachelor Degree of Economic</span>
                        <span class="license">Certified Associate Wealth Planner (AWP)</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-50">
                <div class="card mb-3" style="max-width: 640px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <a type="button" class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal1"><img src="{{asset('assets/img/team/cahiyono.jpg')}}" class="foto-pemateri" alt="..."></a>
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <p class="pemateri">Expert Coaches</p>
                          <a type="button" class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal1">Cahiyono, S.Sos., RSA</a>
                          <div class="row">
                            <div class="social-media">
                            <a href="https://www.linkedin.com/in/cahiyono?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" class="social-media"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 48 48">
                              <path fill="#0078d4" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5	V37z"></path><path d="M30,37V26.901c0-1.689-0.819-2.698-2.192-2.698c-0.815,0-1.414,0.459-1.779,1.364	c-0.017,0.064-0.041,0.325-0.031,1.114L26,37h-7V18h7v1.061C27.022,18.356,28.275,18,29.738,18c4.547,0,7.261,3.093,7.261,8.274	L37,37H30z M11,37V18h3.457C12.454,18,11,16.528,11,14.499C11,12.472,12.478,11,14.514,11c2.012,0,3.445,1.431,3.486,3.479	C18,16.523,16.521,18,14.485,18H18v19H11z" opacity=".05"></path><path d="M30.5,36.5v-9.599c0-1.973-1.031-3.198-2.692-3.198c-1.295,0-1.935,0.912-2.243,1.677	c-0.082,0.199-0.071,0.989-0.067,1.326L25.5,36.5h-6v-18h6v1.638c0.795-0.823,2.075-1.638,4.238-1.638	c4.233,0,6.761,2.906,6.761,7.774L36.5,36.5H30.5z M11.5,36.5v-18h6v18H11.5z M14.457,17.5c-1.713,0-2.957-1.262-2.957-3.001	c0-1.738,1.268-2.999,3.014-2.999c1.724,0,2.951,1.229,2.986,2.989c0,1.749-1.268,3.011-3.015,3.011H14.457z" opacity=".07"></path><path fill="#fff" d="M12,19h5v17h-5V19z M14.485,17h-0.028C12.965,17,12,15.888,12,14.499C12,13.08,12.995,12,14.514,12	c1.521,0,2.458,1.08,2.486,2.499C17,15.887,16.035,17,14.485,17z M36,36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698	c-1.501,0-2.313,1.012-2.707,1.99C24.957,25.543,25,26.511,25,27v9h-5V19h5v2.616C25.721,20.5,26.85,19,29.738,19	c3.578,0,6.261,2.25,6.261,7.274L36,36L36,36z"></path>
                              </svg></a>
                          </div>
                        </div>
                          <p class="card-text">Seorang Relationship Manager di Bank BUMN. Kegiatan sehari-harinya yaitu menjalani hubungan baik dengan nasabah sebagai jembatan bisnis antara Bank BRI dengan nasabah.
                            Pengalamannya dalam berinvestasi sejak tahun 2020, terhitung sudah 4 tahun berkecimpung di ruang lingkup pasar modal. Sehingga pengalaman market crash/hancur sudah pernah dirasakan. Market Crash ini yang membuatnya mendapat cuan ratusan persen, salah satunya di emiten Bank BNI 140%an, Bank Mandiri 139%, Bank BRI 60%an.
                            Kedisiplinan, kesabaran, serta perhitungan menjadikannya sebagai investor jangka panjang. Ia juga sering membagikan momen atau sharing ilmu melalui channel youtube nya “Cahiyono_edukatorpasarmodal”
                            </p>
                            <span class="license">Education and License :</span>
                            <br>
                            <span class="license">Bachelor Degree of Social</span>
                            <br>
                            <span class="license">Regular Sertifikasi Analys (RSA) by LSPPM</span>
                            <span class="license">Course Wakil Perantara Perdagangan Efek-Pemasaran (WPPE-P) by Ticmi</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <div class="col-md-4 mb-15">
                <div class="card mb-3" style="max-width: 640px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <a type="button" class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal2"><img src="{{asset('assets/img/team/nanda.jpg')}}" class="foto-pemateri" alt="..."></a>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <p class="pemateri">Expert Coaches</p>
                        <a type="button" class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal2">Nanda Lutfi Habib Mustofa S.E., RTA</a>
                        <div class="row">
                          <div class="social-media">
                            <a href="https://www.linkedin.com/in/nanda-lutfi-habib-musthofa-s-e-rta-a1651a1a1?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="social-media"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 48 48">
                              <path fill="#0078d4" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5	V37z"></path><path d="M30,37V26.901c0-1.689-0.819-2.698-2.192-2.698c-0.815,0-1.414,0.459-1.779,1.364	c-0.017,0.064-0.041,0.325-0.031,1.114L26,37h-7V18h7v1.061C27.022,18.356,28.275,18,29.738,18c4.547,0,7.261,3.093,7.261,8.274	L37,37H30z M11,37V18h3.457C12.454,18,11,16.528,11,14.499C11,12.472,12.478,11,14.514,11c2.012,0,3.445,1.431,3.486,3.479	C18,16.523,16.521,18,14.485,18H18v19H11z" opacity=".05"></path><path d="M30.5,36.5v-9.599c0-1.973-1.031-3.198-2.692-3.198c-1.295,0-1.935,0.912-2.243,1.677	c-0.082,0.199-0.071,0.989-0.067,1.326L25.5,36.5h-6v-18h6v1.638c0.795-0.823,2.075-1.638,4.238-1.638	c4.233,0,6.761,2.906,6.761,7.774L36.5,36.5H30.5z M11.5,36.5v-18h6v18H11.5z M14.457,17.5c-1.713,0-2.957-1.262-2.957-3.001	c0-1.738,1.268-2.999,3.014-2.999c1.724,0,2.951,1.229,2.986,2.989c0,1.749-1.268,3.011-3.015,3.011H14.457z" opacity=".07"></path><path fill="#fff" d="M12,19h5v17h-5V19z M14.485,17h-0.028C12.965,17,12,15.888,12,14.499C12,13.08,12.995,12,14.514,12	c1.521,0,2.458,1.08,2.486,2.499C17,15.887,16.035,17,14.485,17z M36,36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698	c-1.501,0-2.313,1.012-2.707,1.99C24.957,25.543,25,26.511,25,27v9h-5V19h5v2.616C25.721,20.5,26.85,19,29.738,19	c3.578,0,6.261,2.25,6.261,7.274L36,36L36,36z"></path>
                              </svg></a>
                          </div>
                      </div>
                        <p class="card-text">Pegiat pasar modal yang sudah berkecipung di dunia pasar modal selama lebih dari 7 Tahun. Nah, saat ini Nanda merupakan seorang Investment Specialist di salah satu Sekuritas Asing. 
                          Kegiatannya sehari-hari memberikan advise dari hasil analisa market global maupun lokal kepada Ritel Client. 
                          Sehingga sering berdiskusi dengan ratusan client ritel yang memiliki pandangan dan pengalaman berbeda di market. 
                          Selain itu, aktif juga di berbagai organisasi yang berhubungan dengan Pasar Modal Indonesia.
                        </p>
                        <span class="license">Education and License :</span>
                        <br>
                        <span class="license">Bachelor Degree of Sharia Financial Management</span>
                        <br>
                        <span class="license">Registerd Technical Analyst (RTA)</span>
                        <br>
                        <span class="license">Broker Dealer Representative (WPPE Licensed)</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              </div>
              <div class="col-md-4 mb-15">
                <div class="card mb-3" style="max-width: 640px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <a type="button" class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal3"><img src="{{asset('assets/img/team/Budi.PNG')}}" class="foto-pemateri" alt="..."></a>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <p class="pemateri">Expert Coaches</p>
                        <a type="button" class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal3">Budi Santoso., RTA., CRA., AWP</a>
                        <div class="row">
                          <div class="social-media">
                            <a href="https://www.linkedin.com/in/budi-santoso-003a29217?fbclid=PAAaZnQ3tPXLR-p8cwZDK2Q4wGmKvQuxyPRGn6bbkMjK-cV4DGtfoHe_JQJTw" class="social-media"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 48 48">
                              <path fill="#0078d4" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5	V37z"></path><path d="M30,37V26.901c0-1.689-0.819-2.698-2.192-2.698c-0.815,0-1.414,0.459-1.779,1.364	c-0.017,0.064-0.041,0.325-0.031,1.114L26,37h-7V18h7v1.061C27.022,18.356,28.275,18,29.738,18c4.547,0,7.261,3.093,7.261,8.274	L37,37H30z M11,37V18h3.457C12.454,18,11,16.528,11,14.499C11,12.472,12.478,11,14.514,11c2.012,0,3.445,1.431,3.486,3.479	C18,16.523,16.521,18,14.485,18H18v19H11z" opacity=".05"></path><path d="M30.5,36.5v-9.599c0-1.973-1.031-3.198-2.692-3.198c-1.295,0-1.935,0.912-2.243,1.677	c-0.082,0.199-0.071,0.989-0.067,1.326L25.5,36.5h-6v-18h6v1.638c0.795-0.823,2.075-1.638,4.238-1.638	c4.233,0,6.761,2.906,6.761,7.774L36.5,36.5H30.5z M11.5,36.5v-18h6v18H11.5z M14.457,17.5c-1.713,0-2.957-1.262-2.957-3.001	c0-1.738,1.268-2.999,3.014-2.999c1.724,0,2.951,1.229,2.986,2.989c0,1.749-1.268,3.011-3.015,3.011H14.457z" opacity=".07"></path><path fill="#fff" d="M12,19h5v17h-5V19z M14.485,17h-0.028C12.965,17,12,15.888,12,14.499C12,13.08,12.995,12,14.514,12	c1.521,0,2.458,1.08,2.486,2.499C17,15.887,16.035,17,14.485,17z M36,36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698	c-1.501,0-2.313,1.012-2.707,1.99C24.957,25.543,25,26.511,25,27v9h-5V19h5v2.616C25.721,20.5,26.85,19,29.738,19	c3.578,0,6.261,2.25,6.261,7.274L36,36L36,36z"></path>
                              </svg></a>
                          </div>
                      </div>
                        <p class="card-text">Memiliki ketertarikan lebih terhadap dunia pasar modal membawanya menekuni bidang ini sejak dibangku sekolah menengah atas, 
                          dedikasi penuh dilalui dengan turut aktif mengikuti berbagai organisasi 
                          dan komunitas pasar modal, berhasil memenangkan berbagai perlombaan trading di tingkat nasional, mengikuti beberapa pelatihan dan sertifikasi, serta turut aktif mengedukasi dengan menjadi pemateri di berbagai seminar.</p>
                        <span class="license">Education and License :</span>
                        <br>
                        <span class="license">Regular Technical Analyst (RTA)</span>
                        <br>
                        <span class="license">Certified Risk Associate (CRA)</span>
                        <br>
                        <span class="license">Assosiate Wealth Planner (AWP)</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-15">
                <div class="card mb-3" style="max-width: 640px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <a type="button" class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal4"><img src="{{asset('assets/img/team/ades.jpg')}}" class="foto-pemateri" alt="..."></a>
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <p class="pemateri">Expert Coaches</p>
                          <a type="button" class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal4">Ade Surya Fadhilah, S.E., RTA</a>
                          <div class="row">
                            <div class="social-media">
                              <a href="https://id.linkedin.com/in/ade-surya-fadhillah-b36482147" class="social-media"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 48 48">
                                <path fill="#0078d4" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5	V37z"></path><path d="M30,37V26.901c0-1.689-0.819-2.698-2.192-2.698c-0.815,0-1.414,0.459-1.779,1.364	c-0.017,0.064-0.041,0.325-0.031,1.114L26,37h-7V18h7v1.061C27.022,18.356,28.275,18,29.738,18c4.547,0,7.261,3.093,7.261,8.274	L37,37H30z M11,37V18h3.457C12.454,18,11,16.528,11,14.499C11,12.472,12.478,11,14.514,11c2.012,0,3.445,1.431,3.486,3.479	C18,16.523,16.521,18,14.485,18H18v19H11z" opacity=".05"></path><path d="M30.5,36.5v-9.599c0-1.973-1.031-3.198-2.692-3.198c-1.295,0-1.935,0.912-2.243,1.677	c-0.082,0.199-0.071,0.989-0.067,1.326L25.5,36.5h-6v-18h6v1.638c0.795-0.823,2.075-1.638,4.238-1.638	c4.233,0,6.761,2.906,6.761,7.774L36.5,36.5H30.5z M11.5,36.5v-18h6v18H11.5z M14.457,17.5c-1.713,0-2.957-1.262-2.957-3.001	c0-1.738,1.268-2.999,3.014-2.999c1.724,0,2.951,1.229,2.986,2.989c0,1.749-1.268,3.011-3.015,3.011H14.457z" opacity=".07"></path><path fill="#fff" d="M12,19h5v17h-5V19z M14.485,17h-0.028C12.965,17,12,15.888,12,14.499C12,13.08,12.995,12,14.514,12	c1.521,0,2.458,1.08,2.486,2.499C17,15.887,16.035,17,14.485,17z M36,36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698	c-1.501,0-2.313,1.012-2.707,1.99C24.957,25.543,25,26.511,25,27v9h-5V19h5v2.616C25.721,20.5,26.85,19,29.738,19	c3.578,0,6.261,2.25,6.261,7.274L36,36L36,36z"></path>
                                </svg></a>
                            </div>
                        </div>
                          <p class="card-text">Seorang Investment Spesialis di salah satu sekuritas. Dengan gelar sarjana dalam bidang keuangan dan pengalaman lebih dari lima tahun di industri telah membuktikan kemampuannya dalam menganalisis tren pasar, melakukan penelitian investasi yang mendalam dan memberikan saran investasi yang cerdas kepada klien.
                            Dengan fokus pada kepuasan klien, saya terampil dalam mengidentifikasi kebutuhan dan tujuan finansial individu serta merancang strategi investasi yang sesuai. Dengan memanfaatkan alat analisis yang canggih dan pengetahuan mendalam tentang produk investasi, Saya membantu klien untuk mengelola risiko dan mencapai tujuan keuangan mereka.
                            </p>
                          <span class="license">Education and License :</span>
                          <br>
                          <span class="license">Bachelor Degree of Economic</span>
                          <span class="license">Regular Technical Analyst (RTA)</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <div class="col-md-4 mb-15">
                <div class="card mb-3" style="max-width: 640px;">
                  <div class="row g-0">
                    <div class="col-md-4" style="border: 1rem">
                      <a type="button" class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal5"><img src="{{asset('assets/img/team/hadi.jpg')}}" class="foto-pemateri" alt="..."></a>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <p class="pemateri">Expert Coaches</p>
                        <a type="button" class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal5">Muhammad Hadi Susetio</a>
                        <div class="row">
                          <div class="social-media">
                            <a href="https://www.linkedin.com/in/muhammad-hadi-susetio?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="social-media"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 48 48">
                              <path fill="#0078d4" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5	V37z"></path><path d="M30,37V26.901c0-1.689-0.819-2.698-2.192-2.698c-0.815,0-1.414,0.459-1.779,1.364	c-0.017,0.064-0.041,0.325-0.031,1.114L26,37h-7V18h7v1.061C27.022,18.356,28.275,18,29.738,18c4.547,0,7.261,3.093,7.261,8.274	L37,37H30z M11,37V18h3.457C12.454,18,11,16.528,11,14.499C11,12.472,12.478,11,14.514,11c2.012,0,3.445,1.431,3.486,3.479	C18,16.523,16.521,18,14.485,18H18v19H11z" opacity=".05"></path><path d="M30.5,36.5v-9.599c0-1.973-1.031-3.198-2.692-3.198c-1.295,0-1.935,0.912-2.243,1.677	c-0.082,0.199-0.071,0.989-0.067,1.326L25.5,36.5h-6v-18h6v1.638c0.795-0.823,2.075-1.638,4.238-1.638	c4.233,0,6.761,2.906,6.761,7.774L36.5,36.5H30.5z M11.5,36.5v-18h6v18H11.5z M14.457,17.5c-1.713,0-2.957-1.262-2.957-3.001	c0-1.738,1.268-2.999,3.014-2.999c1.724,0,2.951,1.229,2.986,2.989c0,1.749-1.268,3.011-3.015,3.011H14.457z" opacity=".07"></path><path fill="#fff" d="M12,19h5v17h-5V19z M14.485,17h-0.028C12.965,17,12,15.888,12,14.499C12,13.08,12.995,12,14.514,12	c1.521,0,2.458,1.08,2.486,2.499C17,15.887,16.035,17,14.485,17z M36,36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698	c-1.501,0-2.313,1.012-2.707,1.99C24.957,25.543,25,26.511,25,27v9h-5V19h5v2.616C25.721,20.5,26.85,19,29.738,19	c3.578,0,6.261,2.25,6.261,7.274L36,36L36,36z"></path>
                              </svg></a>
                          </div>
                      </div>
                        <p class="card-text">Kenalkan, salah satu mentor kami. Ia biasa dipanggil Hadi. Saat ini ia merupakan seorang Investment Specialist di salah satu sekuritas.Kegiatan sehari-hari ia adalah memberikan aktivitas konsultasi dan akuisisi nasabah. 
                          Pendekatan yang menjadi ciri khas ia adalah melakukan metode analisa kolaborasi fundamental 
                          kualitatif/kuantitatif dan analisa teknikal sederhana dengan mencocokan profil risiko client dalam pengambilan keputusan investasi.
                          Selain itu ia juga aktif dalam berbagai aktifitas komunitas independen dalam hal edukasi & Inklusi berkaitan dengan Capital Market and Investment.</p>
                          <span class="license">Education and License :</span>
                          <br>
                          <span class="license">Bachelor Degree of International Relations</span>
                          <span class="license">Associated Wealth Planner (AWP)</span>
                          <br>
                          <span class="license">Broker Dealer Representative (WPPE-P Licensed)</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-15">
                <div class="card mb-3" style="max-width: 640px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <a type="button" class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal6"><img src="{{asset('assets/img/team/naufal.jpg')}}" class="foto-pemateri" alt="..."></a>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <p class="pemateri">Expert Coaches</p>
                        <a type="button" class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal6">Naufal Qois, S.E, RSA.</a>
                        <div class="row">
                          <div class="social-media">
                            <a href="https://www.linkedin.com/in/naufal-qois-97b7142bb/" class="social-media"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 48 48">
                              <path fill="#0078d4" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5	V37z"></path><path d="M30,37V26.901c0-1.689-0.819-2.698-2.192-2.698c-0.815,0-1.414,0.459-1.779,1.364	c-0.017,0.064-0.041,0.325-0.031,1.114L26,37h-7V18h7v1.061C27.022,18.356,28.275,18,29.738,18c4.547,0,7.261,3.093,7.261,8.274	L37,37H30z M11,37V18h3.457C12.454,18,11,16.528,11,14.499C11,12.472,12.478,11,14.514,11c2.012,0,3.445,1.431,3.486,3.479	C18,16.523,16.521,18,14.485,18H18v19H11z" opacity=".05"></path><path d="M30.5,36.5v-9.599c0-1.973-1.031-3.198-2.692-3.198c-1.295,0-1.935,0.912-2.243,1.677	c-0.082,0.199-0.071,0.989-0.067,1.326L25.5,36.5h-6v-18h6v1.638c0.795-0.823,2.075-1.638,4.238-1.638	c4.233,0,6.761,2.906,6.761,7.774L36.5,36.5H30.5z M11.5,36.5v-18h6v18H11.5z M14.457,17.5c-1.713,0-2.957-1.262-2.957-3.001	c0-1.738,1.268-2.999,3.014-2.999c1.724,0,2.951,1.229,2.986,2.989c0,1.749-1.268,3.011-3.015,3.011H14.457z" opacity=".07"></path><path fill="#fff" d="M12,19h5v17h-5V19z M14.485,17h-0.028C12.965,17,12,15.888,12,14.499C12,13.08,12.995,12,14.514,12	c1.521,0,2.458,1.08,2.486,2.499C17,15.887,16.035,17,14.485,17z M36,36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698	c-1.501,0-2.313,1.012-2.707,1.99C24.957,25.543,25,26.511,25,27v9h-5V19h5v2.616C25.721,20.5,26.85,19,29.738,19	c3.578,0,6.261,2.25,6.261,7.274L36,36L36,36z"></path>
                              </svg></a>
                          </div>
                      </div>
                        <p class="card-text">Seorang Investment Advisor di salah satu sekuritas. Kegiatan sehari-harinya memberikan aktivitas advisory kepada Group Client. Hal ini menjadi salah satu cara untuk membantu para client dalam mengambil keputusan investasi. 
                          Selain itu, aktif juga dalam berbagai aktivitas internal dan juga eksternal dalam hal edukasi berkaitan dengan Capital Market and Investment.
                        </p>
                          <span class="license">Education and License :</span>
                          <br>
                          <span class="license">Bachelor Degree of Economic</span>
                          <br>
                          <span class="license">Registered Securities Analyst</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-15 d-flex justify-content-center align-items-center">
                <a href="" class="it-btn-ijo"><i data-feather="corner-down-right"></i> Cek Selengkapnya</a>
              </div>
          </div>
    </div>
  </section>
    {{-- Our Team Section end --}}

    {{-- mode test --}}
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Melly Siti Maryam, S.E., AWP</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Seorang Karyawan BUMN. Kegiatannya sehari-hari yaitu memberikan pelayanan kepada Nasabah. Selain itu, aktif juga dalam berbagai aktivitas internal dan eksternal dalam hal edukasi berkaitan dengan finance dan Investasi. </p>
              <span class="license">Education and License :</span>
              <br>
              <span class="license">Bachelor Degree of Economic</span>
              <span class="license">Certified Associate Wealth Planner (AWP)</span>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel1">Cahiyono, S.Sos., RSA</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Seorang Relationship Manager di Bank BUMN. Kegiatan sehari-harinya yaitu menjalani hubungan baik dengan nasabah sebagai jembatan bisnis antara Bank BRI dengan nasabah.
                Pengalamannya dalam berinvestasi sejak tahun 2020, terhitung sudah 4 tahun berkecimpung di ruang lingkup pasar modal. Sehingga pengalaman market crash/hancur sudah pernah dirasakan. Market Crash ini yang membuatnya mendapat cuan ratusan persen, salah satunya di emiten Bank BNI 140%an, Bank Mandiri 139%, Bank BRI 60%an.
                Kedisiplinan, kesabaran
                ,serta perhitungan menjadikannya sebagai investor jangka panjang. Ia juga sering membagikan momen atau sharing ilmu melalui channel youtube nya “Cahiyono_edukatorpasarmodal” </p>
                <span class="license">Education and License :</span>
                <br>
                <span class="license">Bachelor Degree of Social</span>
                <br>
                <span class="license">Regular Sertifikasi Analys (RSA) by LSPPM</span>
                <span class="license">Course Wakil Perantara Perdagangan Efek-Pemasaran (WPPE-P) by Ticmi</span>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel2">Nanda Lutfi Habib Mustofa S.E., RTA</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Pegiat pasar modal yang sudah berkecipung di dunia pasar modal selama lebih dari 7 Tahun. Nah, saat ini Nanda merupakan seorang Investment Specialist di salah satu Sekuritas Asing. 
                Kegiatannya sehari-hari memberikan advise dari hasil analisa market global maupun lokal kepada Ritel Client. 
                Sehingga sering berdiskusi dengan ratusan client ritel yang memiliki pandangan dan pengalaman berbeda di market. 
                Selain itu, aktif juga di berbagai organisasi yang berhubungan dengan Pasar Modal Indonesia.</p>
                <span class="license">Education and License :</span>
                <br>
                <span class="license">Bachelor Degree of Sharia Financial Management</span>
                <br>
                <span class="license">Registerd Technical Analyst (RTA)</span>
                <br>
                <span class="license">Broker Dealer Representative (WPPE Licensed)</span>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel3">Budi Santoso., RTA., CRA., AWP</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Memiliki ketertarikan lebih terhadap dunia pasar modal membawanya menekuni bidang ini sejak dibangku sekolah menengah atas, dedikasi penuh dilalui dengan turut aktif mengikuti berbagai organisasi 
                dan komunitas pasar modal, berhasil memenangkan berbagai perlombaan trading di tingkat nasional, mengikuti beberapa pelatihan dan sertifikasi, serta turut aktif mengedukasi dengan menjadi pemateri di berbagai seminar.</p>
                <span class="license">Education and License :</span>
                <br>
                <span class="license">Regular Technical Analyst (RTA)</span>
                <br>
                <span class="license">Certified Risk Associate (CRA)</span>
                <br>
                <span class="license">Assosiate Wealth Planner (AWP)</span>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      
      <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel4">Ade Surya Fadhilah, S.E., RTA</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Seorang Investment Spesialis di salah satu sekuritas. Dengan gelar sarjana dalam bidang keuangan dan pengalaman lebih dari lima tahun di industri telah membuktikan kemampuannya dalam menganalisis tren pasar, melakukan penelitian investasi yang mendalam dan memberikan saran investasi yang cerdas kepada klien.
                Dengan fokus pada kepuasan klien, saya terampil dalam mengidentifikasi kebutuhan dan tujuan finansial individu serta merancang strategi investasi yang sesuai. Dengan memanfaatkan alat analisis yang canggih dan pengetahuan mendalam tentang produk investasi, Saya membantu klien untuk mengelola risiko dan mencapai tujuan keuangan mereka.</p>
                <span class="license">Education and License :</span>
                <br>
                <span class="license">Bachelor Degree of Economic</span>
                <span class="license">Regular Technical Analyst (RTA)</span>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel4">Muhammad Hadi Susetio</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Kenalkan, salah satu mentor kami. Ia biasa dipanggil Hadi. Saat ini ia merupakan seorang Investment Specialist di salah satu sekuritas.Kegiatan sehari-hari ia adalah memberikan aktivitas konsultasi dan akuisisi nasabah. 
                Pendekatan yang menjadi ciri khas ia adalah melakukan metode analisa kolaborasi fundamental 
                kualitatif/kuantitatif dan analisa teknikal sederhana dengan mencocokan profil risiko client dalam pengambilan keputusan investasi.
                Selain itu ia juga aktif dalam berbagai aktifitas komunitas independen dalam hal edukasi & Inklusi berkaitan dengan Capital Market and Investment.</p>
                <span class="license">Education and License :</span>
                <br>
                <span class="license">Bachelor Degree of International Relations</span>
                <span class="license">Associated Wealth Planner (AWP)</span>
                <br>
                <span class="license">Broker Dealer Representative (WPPE-P Licensed)</span>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      
      <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel6">Naufal Qois, S.E, RSA.</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Seorang Investment Advisor di salah satu sekuritas. Kegiatan sehari-harinya memberikan aktivitas advisory kepada Group Client. Hal ini menjadi salah satu cara untuk membantu para client dalam mengambil keputusan investasi. 
                Selain itu, aktif juga dalam berbagai aktivitas internal dan juga eksternal dalam hal edukasi berkaitan dengan Capital Market and Investment.</p>
                <span class="license">Education and License :</span>
                <br>
                <span class="license">Bachelor Degree of Economic</span>
                <br>
                <span class="license">Registered Securities Analyst</span>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- menu section start --}}
    <section id="sig" class="menu">
        <div class="row">
            @foreach($products as $item)
            <div class="menu-card">
              <div class="container">
                <h2 class="section-title">Special Promo Bundling Class</h2>
                <p class="section-description">Khusus untuk pendaftar Sebelum Bulan Juni 2024</p>
        
                <div class="row">
                    <div class="col-md-6">
                        <div class="pricing-item">
                          <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-0.535 -0.535 15 15" height="45" width="45" id="Definition-Search-Book--Streamline-Flex"><desc>Definition Search Book Streamline Icon: https://streamlinehq.com</desc><g id="Definition-Search-Book--Streamline-Flex"><path id="Vector 2712" fill="#d7ffed" d="M13.4188685 10.1387515V1.94591155c0 -0.42827784999999996 -0.272829 -0.8141090000000001 -0.689933 -0.91119115C10.755850500000001 0.5755050150000001 8.406028650000001 0.7978556750000001 6.965 1.758563v9.600158c1.4474065999999999 -0.964951 3.811646 -1.1849455 5.790104 -0.7176935000000001 0.3304395 0.0781075 0.6637645 -0.16278199999999998 0.6637645 -0.5022760000000001Z" stroke-width="1.07"></path><path id="Vector 2713" fill="#d7ffed" d="M0.51110364 10.1387515V1.94591155c0 -0.42827784999999996 0.27283397499999995 -0.8141090000000001 0.68996086 -0.91119115C3.1741893 0.5755050150000001 5.52397135 0.7978556750000001 6.965 1.758563v9.600158c-1.4474065999999999 -0.964951 -3.8116360499999997 -1.1849455 -5.790104 -0.7176935000000001 -0.33048228500000004 0.0781075 -0.6637923600000001 -0.16278199999999998 -0.6637923600000001 -0.5022760000000001Z" stroke-width="1.07"></path><path id="Vector 2714" stroke="#13ec85" stroke-linecap="round" stroke-linejoin="round" d="M13.4188685 6.23649085V1.94591155c0 -0.42827784999999996 -0.272829 -0.8141090000000001 -0.689933 -0.91119115C10.755850500000001 0.5755050150000001 8.406028650000001 0.7978556750000001 6.965 1.758563v4.4779278499999995" stroke-width="1.07"></path><path id="Vector 2715" stroke="#13ec85" stroke-linecap="round" stroke-linejoin="round" d="M6.965 1.758563C5.52397135 0.7978556750000001 3.1741893 0.5755050150000001 1.2010645 1.0347203999999999c-0.417126885 0.09708215 -0.68996086 0.4829133 -0.68996086 0.91119115v8.19283995c0 0.339494 0.33342052 0.580284 0.66390181 0.5022760000000001 1.25846605 -0.29720650000000004 2.6729879 -0.3163105 3.90836 -0.042586" stroke-width="1.07"></path><path id="Vector" stroke="#13ec85" stroke-linecap="round" stroke-linejoin="round" d="m13.332004999999999 13.341756 -1.1811645 -1.1811645" stroke-width="1.07"></path><path id="Vector_2" fill="#ffffff" d="M10.098653 12.844355499999999c1.7512 0 2.73625 -0.98505 2.73625 -2.73625 0 -1.7511602 -0.98505 -2.7362102000000004 -2.73625 -2.7362102000000004 -1.75119005 0 -2.7362400499999997 0.98505 -2.7362400499999997 2.7362102000000004 0 1.7512 0.98505 2.73625 2.7362400499999997 2.73625Z" stroke-width="1.07"></path><path id="Vector_3" stroke="#13ec85" stroke-linecap="round" stroke-linejoin="round" d="M10.098653 12.844355499999999c1.7512 0 2.73625 -0.98505 2.73625 -2.73625 0 -1.7511602 -0.98505 -2.7362102000000004 -2.73625 -2.7362102000000004 -1.75119005 0 -2.7362400499999997 0.98505 -2.7362400499999997 2.7362102000000004 0 1.7512 0.98505 2.73625 2.7362400499999997 2.73625Z" stroke-width="1.07"></path></g></svg>
                        <h3 class="product-name">Special Class</h3>  
                        </div>
                        <div class="borderutama">
                          <div class="flyer">
                            <img src="{{asset('assets/img/landing/flyer.png')}}"/>
                          </div>
                            <p class="promo-price">Harga : Rp. 600.000</p>
                            <div class="tombol">
                              <form action="{{route('add_cart',$item->id)}}" method="POST">
                                              @csrf
                                              <input type="hidden" name="id" value="{{$item->id}}">
                                              <input type="hidden" name="product_name" value="{{$item->product_name}}">
                                              <input type="hidden" name="qty" value="">
                                              <input type="hidden" name="harga" value="{{$item->product_name}}">
                                              <button type="submit" class="it-btn-ijo"><span>Ambil Sekarang</span></button>
                                          </form>
                          </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            @endforeach
        </div>
    </section>
    {{-- menu section end --}}
    <!-- Testimoni -->
    <section class="testimoni">
      <h2>Testimoni</h2>
    <div id="testimonial" class="it-testimonial-3-area it-testimonial-4-style theme-bg-10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-4 d-none d-lg-block">
                    <div class="it-testimonial-3-thumb">
                        <img src="{{asset('assets/img/testimonial/50955.jpg')}}" alt>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-8">
                    <div class="it-testimonial-3-box z-index p-relative">
                        <div class="it-testimonial-3-shape-1">
                            <img src="{{asset('assets/img/testimonial/shape-3-1.png')}}" alt>
                        </div>
                        <div class="it-testimonial-3-wrapper white-bg p-relative">
                            <div class="it-testimonial-3-quote">
                                <img src="{{asset('assets/img/testimonial/quot.png')}}" alt>
                            </div>
                            <div class="swiper-container it-testimonial-3-active">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="it-testimonial-3-item">
                                            <div class="it-testimonial-3-content">
                                                <p>Program special class yang diselenggarakan oleh tim SIG sangat worth it untuk diikuti. Saya yang berangkat dari nol berkaitan dengan pengetahuan pasar modal. Rasanya ingin langsung praktik setelah mengikuti sesi kelas ini. Proses pembukaan akun sahamnya pun sangat mudah karena dibantu oleh tim SIG</p>
                                                <div class="it-testimonial-3-author-box d-flex align-items-center">
                                                    <div class="it-testimonial-3-avata">
                                                        <img src="{{asset('assets/img/avatar/9720009.jpg')}}" alt>
                                                    </div>
                                                    <div class="it-testimonial-3-author-info">
                                                        <h5>Fachri M F</h5>
                                                        <span>Pengusaha</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="it-testimonial-3-item">
                                            <div class="it-testimonial-3-content">
                                                <p>Para pengajarnya engga pelit ilmu. Kebanyakan mereka dari para praktisi sehingga subtansi yang disampaikan tidak hanya soalan materi melainkan juga studi kasus sesuai dengan keadaan dilapangan.</p>
                                                <div class="it-testimonial-3-author-box d-flex align-items-center">
                                                    <div class="it-testimonial-3-avata">
                                                        <img src="{{asset('assets/img/avatar/9720009.jpg')}}" alt>
                                                    </div>
                                                    <div class="it-testimonial-3-author-info">
                                                        <h5>Aditya F A</h5>
                                                        <span>Analis Keuangan</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="it-testimonial-3-item">
                                            <div class="it-testimonial-3-content">
                                                <p>Saya sangat puas mengikuti program spesial class ini, selain karena metode pengajaran yang komprehensif juga tersedis recording sehingga bisa saya putar berkali-kali ketika ada hal yang saya lupa.</p>
                                                <div class="it-testimonial-3-author-box d-flex align-items-center">
                                                    <div class="it-testimonial-3-avata">
                                                        <img src="{{asset('assets/img/avatar/9720009.jpg')}}" alt>
                                                    </div>
                                                    <div class="it-testimonial-3-author-info">
                                                        <h5>Mariam F</h5>
                                                        <span>Manajemen Keuangan</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="test-slider-dots"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- End Testimoni -->

    <!-- Start Faq -->
    <section class="promo">
      <div class="container">
        <h2 class="section-title">Cek Kelas lain</h2>
        <p class="section-description">Khusus untuk kamu yang mau menambah ilmu lain</p>
        <div class="row d-flex justify-content-center">
          @foreach($productlain as $product)
            <div class="col-md-5 mb-50">
                <div class="harga">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-0.535 -0.535 15 15" height="45" width="45" id="Definition-Search-Book--Streamline-Flex"><desc>Definition Search Book Streamline Icon: https://streamlinehq.com</desc><g id="Definition-Search-Book--Streamline-Flex"><path id="Vector 2712" fill="#d7ffed" d="M13.4188685 10.1387515V1.94591155c0 -0.42827784999999996 -0.272829 -0.8141090000000001 -0.689933 -0.91119115C10.755850500000001 0.5755050150000001 8.406028650000001 0.7978556750000001 6.965 1.758563v9.600158c1.4474065999999999 -0.964951 3.811646 -1.1849455 5.790104 -0.7176935000000001 0.3304395 0.0781075 0.6637645 -0.16278199999999998 0.6637645 -0.5022760000000001Z" stroke-width="1.07"></path><path id="Vector 2713" fill="#d7ffed" d="M0.51110364 10.1387515V1.94591155c0 -0.42827784999999996 0.27283397499999995 -0.8141090000000001 0.68996086 -0.91119115C3.1741893 0.5755050150000001 5.52397135 0.7978556750000001 6.965 1.758563v9.600158c-1.4474065999999999 -0.964951 -3.8116360499999997 -1.1849455 -5.790104 -0.7176935000000001 -0.33048228500000004 0.0781075 -0.6637923600000001 -0.16278199999999998 -0.6637923600000001 -0.5022760000000001Z" stroke-width="1.07"></path><path id="Vector 2714" stroke="#13ec85" stroke-linecap="round" stroke-linejoin="round" d="M13.4188685 6.23649085V1.94591155c0 -0.42827784999999996 -0.272829 -0.8141090000000001 -0.689933 -0.91119115C10.755850500000001 0.5755050150000001 8.406028650000001 0.7978556750000001 6.965 1.758563v4.4779278499999995" stroke-width="1.07"></path><path id="Vector 2715" stroke="#13ec85" stroke-linecap="round" stroke-linejoin="round" d="M6.965 1.758563C5.52397135 0.7978556750000001 3.1741893 0.5755050150000001 1.2010645 1.0347203999999999c-0.417126885 0.09708215 -0.68996086 0.4829133 -0.68996086 0.91119115v8.19283995c0 0.339494 0.33342052 0.580284 0.66390181 0.5022760000000001 1.25846605 -0.29720650000000004 2.6729879 -0.3163105 3.90836 -0.042586" stroke-width="1.07"></path><path id="Vector" stroke="#13ec85" stroke-linecap="round" stroke-linejoin="round" d="m13.332004999999999 13.341756 -1.1811645 -1.1811645" stroke-width="1.07"></path><path id="Vector_2" fill="#ffffff" d="M10.098653 12.844355499999999c1.7512 0 2.73625 -0.98505 2.73625 -2.73625 0 -1.7511602 -0.98505 -2.7362102000000004 -2.73625 -2.7362102000000004 -1.75119005 0 -2.7362400499999997 0.98505 -2.7362400499999997 2.7362102000000004 0 1.7512 0.98505 2.73625 2.7362400499999997 2.73625Z" stroke-width="1.07"></path><path id="Vector_3" stroke="#13ec85" stroke-linecap="round" stroke-linejoin="round" d="M10.098653 12.844355499999999c1.7512 0 2.73625 -0.98505 2.73625 -2.73625 0 -1.7511602 -0.98505 -2.7362102000000004 -2.73625 -2.7362102000000004 -1.75119005 0 -2.7362400499999997 0.98505 -2.7362400499999997 2.7362102000000004 0 1.7512 0.98505 2.73625 2.7362400499999997 2.73625Z" stroke-width="1.07"></path></g></svg>
                    </div>
                    <h3 class="product-name">{{$product -> product_name}}</h3>
                    <div class="borderdalem">
                    <p class="product-desc">{!! $product -> product_desc !!}</p>
                    </div>
                    <p class="text-harga">Harga</p>
                    <p class="harga-wppe">Rp. {{ number_format($product->harga, 0, ',', '.') }}</p>
                    <a href="{{route('siginstitute')}}" class="it-btn-ijo">Daftar Sekarang</a>
                </div>
              </div>
            @endforeach
      </div>
    </section>
    {{-- contact section start --}}
    <section id="contact" class="contact">
        <h2><span>Kontak</span> Kami</h2>
        <p>Menara 165 Lantai 21 Unit B, T.B. Simatumpang
            Jakarta, Indonesia 12560</p>

        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.789140425579!2d106.80681457597397!3d-6.291421061580436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8b9588a5c329bd73%3A0x4e4528ccae1ebd19!2sSIG%20Institute!5e0!3m2!1sid!2sid!4v1705056563140!5m2!1sid!2sid"
                 class="map"></iframe>
            <form action="#">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" placeholder="Nama">
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="email" placeholder="email">
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" placeholder="Deskripsi Pesan">
                </div>
                <button type="submit" class="btn">Kirim Pesan</button>
            </form>

        </div>
    </section>
    {{-- contact section end --}}

    {{-- footer start --}}
    <footer>
        <div class="social">
            <a href="#"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
        </div>
        <div class="links">
            <a href="#home"><i data-feather="phone" style="margin-right:5px"></i>+628511-201-955</a>
            <a href="#about"><i data-feather="map-pin" style="margin-right:5px"></i>Menara 165 Lantai 21 Unit B, T.B. Simatumpang
            Jakarta, Indonesia 12560</a>
            <a href="#sig"><i data-feather="mail" style="margin-right:5px"></i>sejahterainsangemilang@gmail.com</a>
            <a href="#contact">Term Of Service</a>
        </div>
        <div class="credit">
            <p>Created By <a href="">SIG</a>. | &copy:2023</p>
        </div>
    </footer>
    {{-- footer end --}}

    <!-- Pastikan untuk menyertakan file jQuery dan Owl Carousel -->
    <!-- my js -->
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.js"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/waypoints.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/slick.min.js')}}"></script>
    <script src="{{asset('assets/js/magnific-popup.js')}}"></script>
    <script src="{{asset('assets/js/purecounter.js')}}"></script>
    <script src="{{asset('assets/js/countdown.js')}}"></script>
    <script src="{{asset('assets/js/wow.js')}}"></script>
    <script src="{{asset('assets/js/nice-select.js')}}"></script>
    <script src="{{asset('assets/js/swiper-bundle.js')}}"></script>
    <script src="{{asset('assets/js/isotope-pkgd.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded-pkgd.js')}}"></script>
    <script src="{{asset('assets/js/ajax-form.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>


    <!-- icon js -->
    <script>
    feather.replace();
    </script>
    <script>
      window.onload = function() {
            var cardTexts = document.querySelectorAll(".card-text");
            cardTexts.forEach(function(cardText) {
                var words = cardText.textContent.split(' ');
                if (words.length > 95) {
                    cardText.textContent = words.slice(0, 70).join(' ') + '...';
                }
            });
        }
        window.onresize = function() {
            var cardTexts = document.querySelectorAll(".card-text");
            cardTexts.forEach(function(cardText) {
                var words = cardText.textContent.split(' ');
                if (words.length > 40) {
                    cardText.textContent = words.slice(0, 40).join(' ') + '...';
                }
            });
        }
    </script>
    <script>
  window.onscroll = function() {scrollFunction()};
  function scrollFunction() {
  var navbar = document.getElementById("navbar");
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
}
    </script>
</body>

</html>