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
    <!-- my style -->
    <link rel="stylesheet" href="{{asset('assets/css/primary.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- my icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <nav class="navbar">
        <a href="#" class="navbar-logo">Sig <span>Institute</span></a>
        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#sig">Kelas</a>
            <a href="#contact">Kontak</a>
        </div>
        <div class="navbar-extra">
            <a href=""><i data-feather="search"></i></a>
            <a href=""><i data-feather="shopping-cart"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>

    <!-- hero section start-->
    <section class="hero" id="home">
        <main class="content">
            <h1>Rencanakan karirmu di Industri Keuangan 
            bersama SIG Institute
            </h1>
            <h2>Untuk menjadi tenaga ahli yang profesional,
            Intelektual dan integritas  di pasar modal
            </h2>
            <div class="tombol-utama">
                <a href="#sig" class="cta">Daftar Sekarang</a>
                <a href="/" class="cta">Baca Selengkapnya</a>
            </div>
        </main>
    </section>
    <!-- hero section end-->
     <section id="dokumentasi" class="dokumentasi">
        <main class="content">
            <h2>Dokumentasi Pelatihan</h2>
            <div class="slider">
                <img src="{{asset('assets/img/landing/IMG_2747.jpg')}}">
                <img src="{{asset('assets/img/landing/dokumentasi2.jpg')}}">
                <img src="{{asset('assets/img/landing/dokumentasi3.jpg')}}">
            </div>
        </main>
    </section>

    {{-- about section end --}}

    {{-- menu section start --}}
    <section id="sig" class="menu">
        <h2><span>Produk</span> Kami</h2>
        <p>Saat Ini Tersedia Batch 2</p>
            <div class="product">
                <div class="container">
                    <div class="row">
                        @foreach($products as $item)
                        <div class="col">
                            <div class="content">
                                <div class="product-text">
                                    <label class="product-title"
                                        style="margin-bottom:20px;">{{$item -> product_name}} </label>
                                    <p align="center">{!! $item
                                        -> product_desc !!} </p>
                                </div>
                                <div class="harga">
                                    <p>Harga : Rp. {{number_format($item->harga, 0, ',', '.')}}</p>
                                </div>
                                <div class="button">
                                <form action="{{route('add_cart',$item->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <input type="hidden" name="product_name" value="{{$item->product_name}}">
                                    <input type="hidden" name="qty" value="">
                                    <input type="hidden" name="harga" value="{{$item->product_name}}">
                                    <button type="submit" class="it-btn" style="margin-top:40px;"><span>Pilih
                                            Kelas</span></button>
                                </form>
                              </div>
                            </div>
                        </div>
                        @endforeach
                </section>
    {{-- menu section end --}}

    <!-- session alur -->
    <section id="#" class="alur">
        <h2>Proses dan Alur Pelatihan</h2>
        <div class="tabel-proses">
            <img src="{{asset('assets/img/landing/table1.jpg')}}">
        </div>
        <div class="syarat">
            <p>Persyaratan Dasar Pemohon Sertifikasi</p>
            <li>Pendidikan formal minimal SMA/SMK dan berpengalaman kerja
            pada Lembaga Jasa Keuangan terutama industri pasar modal pada bidang yang relevan minimal 4 tahun 
            </li>
            <li class="number">Pendidikan formal minimal D-3 dibidang Keuangan atau sederajat dan berpengalaman kerja pada Lembaga Jasa Keuangan terutama industri pasar modal pada bidang yang relevan minimal 1 tahun  
            </li>
            <li>Pendidikan formal minimal D-4 atau S-1 dibidang Keuangan atau Ekonomi</li>
        </div>
    </section>

    <section id="#" class="pelatihan">
        <h2>Pelatihan Ini <span>Cocok Untuk</span></h2>
        <div class="pelatihan-desc">
            <p>Kamu yang tertarik berkarir di industri pasar modal dan keuangan/perbankan.</p>
            <li>BROKERAGE</li>
            <li>ADVISOR</li>
            <li>BANKING OFFICER</li>
            <li>MANAJER INVESTASI</li>
            <li>RESEARCH ANALYST</li>
            <li>INVESTMENT BANKER</li>
            <li>TRADER ATAU INVESTOR</li>
            <li>FUND MANAGER</li>
            <li>Dan Profesi lainnya yang berhubungan dengan produk investasi keuangan</li>
        </div>
    </section>

    <section id="#" class="termurah">
        <h2>-- Harga <span>Termurah</span> --</h2>
        <h3>Untuk dapat sertifikasi kompetensi di pasar modal </h3>
        <div class="daftar">
            <a href="#" class="it-btn">Daftar Sekarang</a>
        </div>
    </section>

    <section id="#" class="faq">
        <h2>Frequently Ask Questions</h2>
    </section>
    {{-- contact section start --}}
    <section id="contact" class="contact">
        <h2><span>Kontak</span> Kami</h2>
        <div class="alamat">
        <p>Menara 165 Lantai 21 Unit B, T.B. Simatumpang
        Jakarta, Indonesia 12560 </p>
        <p>
        +62 811-201-955</p>
        <p>
        sejahterainsangemilang@gmail.com
        </p>
        </div>
        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.789140425579!2d106.80681457597397!3d-6.291421061580436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8b9588a5c329bd73%3A0x4e4528ccae1ebd19!2sSIG%20Institute!5e0!3m2!1sid!2sid!4v1705056563140!5m2!1sid!2sid"
                 class="map"></iframe>

            <form action="">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" name="name" placeholder="Nama">
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="email" name="email" placeholder="email">
                </div>
                <div class="input-group">
                    <i data-feather="message-square"></i>
                    <input type="text" name="desc" placeholder="Pesan Anda">
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
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#sig">SIG</a>
            <a href="#contact">Contact</a>
        </div>

        <div class="credit">
            <p>Created By <a href="">Fachrifrzl</a>. | &copy:2023</p>
        </div>
    </footer>
    {{-- footer end --}}

    <!-- icon js -->
    <script>
    feather.replace();
    </script>

    <!-- my js -->
    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>