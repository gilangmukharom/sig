@extends('layouts.frontapp')
@section('content')
<div class="it-breadcrumb-area it-breadcrumb-bg" data-background="assets/img/breadcrumb/library.jpg">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="it-breadcrumb-content z-index-3 text-center">
                    <div class="it-breadcrumb-title-box">
                        <h3 class="it-breadcrumb-title">SIG Institute</h3>
                    </div>
                    <div class="it-breadcrumb-list-wrap">
                        <div class="it-breadcrumb-list">
                            <span><a href="/">home</a></span>
                            <span class="dvdr">//</span>
                            <span>SIG Institute</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="d-flex justify-content-center">
            <img src="{{asset('assets/img/logo.webp')}}" />
        </div>
        <div class="justify-content-center">
            <p>SIG Institute Merupakan Lembaga Penyedia Jasa Pelatihan Sertifikasi Kompetensi Keuangan. Fokus Pada
                Industri Pasar Modal Untuk
                Menciptakan Praktisi yang Etika, Profesional dan Kompeten
            </p>
        </div>
        <div class="d-flex mt-4 justify-content-center">
            <p>SIG Institute Memiliki Tenaga Ahli yang Tersertifikasi BNSP dan Berpengalaman pada Bidang Keuangan, dan
                Metode Pelatihan yang Seru, Mudah dipahami dan Menciptakan
                Lulusan Profesional.
            </p>
        </div>
    </div>
</div>
<div class="mt-4 mb-4 justify-content-center">
    <div class="container">
        <div class="row">
            @foreach($products as $item)
            <div class="col">
                <div class="it-category-item text-center">
                    <div class="it-category-icon">
                        <span>
                            <i class="flaticon-ux-design"></i>
                        </span>
                    </div>
                    <div class="it-category-text" style="width:auto;height:300px;">
                        <label class="it-category-title" style="margin-bottom:20px;">{{$item -> product_name}} </label>
                        <p align="center" style="color:#010101;font-size:0.8rem;margin-top:20px">{!! $item -> product_desc !!} </p>
                    </div>
                    <div class="mt2">
                    <label>Harga</label>
                    <label class="harga">Rp. {{number_format($item->harga, 0, ',', '.')}}</label>
                    </div>
                    <!-- <div class="mt-7" style="margin-top:40px;">
                        <a href="#" class="btn btn-warning">Beli Sekarang</a>
                    </div> -->
                    <form action="{{route('add_cart',$item->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <input type="hidden" name="product_name" value="{{$item->product_name}}">
                    <input type="hidden" name="qty" value="">
                    <input type="hidden" name="harga" value="{{$item->product_name}}">
                    <button type="submit" class="btn btn-warning" style="margin-top:40px;"><span>Pilih Kelas</span></button>
                    </form>
                </div>
            </div>
        @endforeach
            

        <section class="accordion" style="margin-top:7rem;margin-bottom:7rem">
        <div class="justify-content-center">
            <h1 align="center" style="font-size:3rem;margin-bottom:3rem;">Frequently Asked Questions</h1>
        </div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Bagaimana Alur Pelaksanaan Ujian Sertifikasi ? 
            </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body"><label style="font-size:30px;">Alur Pelaksanaan Ujian Sertifikasi</label>
            <div class="d-flex justify-content-center">
                <img src="{{asset('assets/img/flowchart/alur.png')}}" style="margin-top:70px;margin-bottom:70px;"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Apa Saja yang Tersedia di SIG ? 
            </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Wakil Perantara Perdagangan Efek(WPPE) </div>
            <div class="accordion-body">Wakil Perantara Perdagangan Efek Pemasaran(WPPE-P) </div>
        </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Berapa Biaya Masing Masing Kelas di SIG ?
            </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body" style="justify-content:space-between">
                <span class="item">WPPE</span> 
                <span class="separator">=</span>
                <span class="price">Rp.4.900.000</span></div>
            <div class="accordion-body">WPPE-P = Rp.2.900.000</div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                Mekanisme Pendaftaran Kelas & Pembayaran 
            </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body"><ul>
                                        <li>Langkah Pertama Asesi Melakukan Registrasi Akun di siggroup.id</li>
                                        <li>Jika sudah melakukan registrasi maka akan mendapatkan pesan masuk ke email dari SIG untuk verifikasi akun dan konfirmasi</li>
                                        <li>Kemudian Klik kelas yang tersedia</li>
                                        <li>Kemudian isi form detail pembayaran dan lakukan pembayaran</li>
                                        <li>silahkan pilih metode pembayaran yang sudah di sediakan</li>
                                        <li>Menerima konfirmasi pembayaran melalui email</li>
                                        <li>Menerima email Konfirmasi pelaksanaan pelatihan</li></ul></div>
            </div>
            </div>
        </section>
            

        @endsection