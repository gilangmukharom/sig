@extends('layouts.frontapp')
@section('content')
<div class="it-breadcrumb-area it-breadcrumb-bg" data-background="assets/img/breadcrumb/library.jpg">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="it-breadcrumb-content z-index-3 text-center">
                    <div class="it-breadcrumb-title-box">
                        <h3 class="it-breadcrumb-title">Cart</h3>
                    </div>
                    <div class="it-breadcrumb-list-wrap">
                        <div class="it-breadcrumb-list">
                            <span><a href="{{route('home')}}">home</a></span>
                            <span class="dvdr">//</span>
                            <span>Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="cart-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-content table-responsive wow tpfadeUp" data-wow-duration=".9s"
                    data-wow-delay=".3s"
                    style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.3s; animation-name: tpfadeUp;">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-success">
                        {{session('error')}}
                    </div>
                    @endif
                    @if(session('cart'))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">ID</th>
                                    <th class="product-thumbnail">Nama</th>
                                    <th class="product-thumbnail">Email</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="product-price">Harga</th>
                                    <th class="product-remove">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach(session('cart') as $item)
                                <tr data-id="{{$item['id']}}">
                                    <td>1</td> 
                                    <td>{{$item['user_name']}}</td>
                                    <td>{{$item['user_email']}}</td>
                                    <td>{{$item['product_name']}}</td>
                                    <td>Rp. {{number_format($item['harga_awal'], 0, ',', '.')}}</td>
                                    <td><button class="cart_remove"><i data-feather="x-circle"></i></button></td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        @else
                        <h1>Tidak Ada Item di Cart !</h1>
                        @endif
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-lg-6">
                    @foreach(session('cart') as $item)
                        @if($item['harga_awal'] != $item['harga_diskon'])
                            @else
                <div class="col">
                    <div class="checkout-form-list">
                        <form method="post" action="{{ route('promo') }}">
                            @csrf
                            <label for="promo_code">Kode Promo:</label>
                            <input type="text" name="promo_code" id="promo_code">
                            <button type="submit" class="it-btn-yellow mt-10">Terapkan Kode Promo</button>
                        </form>                        
                    </div>
                </div>
            @endif
                @endforeach
                    <div class="cart-page-total">
                        <div class="row">
                            <form action="{{route('detail')}}" method="POST">
                                @csrf
                            @auth
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" required>
                            @endauth
                        </div>
                    </div>
                </div>
                 @foreach(session('cart') as $item)
            <div class="col-md-5 mt-20 ml-20">
                <div class="col">
                    <div class="cart-page-total">
                        <h2>Cart totals</h2>
                        <ul class="mb-20">
                            @if($item['harga_awal'] == $item['harga_diskon'])
                                <li>Diskon <span>-</span></li>
                                <input type="hidden" name="diskon" value="0" required>
                                <input type="hidden" name="total_harga" value="{{ $item['harga_awal'] }}" required>
                            @else
                                <input type="hidden" name="diskon" value="{{$item['harga_awal'] - $item['harga_diskon']}}" required>
                                <li>Diskon <span>Rp. {{ number_format($item['harga_awal'] - $item['harga_diskon'], 0, ',', '.') }}</span></li>
                                <input type="hidden" name="total_harga" value="{{ $item['harga_diskon'] }}" required>
                            @endif
                            <li>Total <span>Rp. {{ number_format($item['harga_diskon'], 0, ',', '.') }}</span></li>
                        </ul>
                        <button class="it-btn">Checkout</button>
                    </div>
                </div>
            </div>
        @endforeach
     </form>
    </div>
</section>
@endsection
@section('scripts')
<script type="text/javascript">
  $(".cart_remove").click(function(e){
    e.preventDefault();
    var ele = $(this);
    if(confirm('Apakah ingin Menghapus ?')){
        $.ajax({
            url:'{{route('remove')}}',
            method:"DELETE",
            data:{
                _token:'{{csrf_token()}}',
                id:ele.parents("tr").attr("data-id")
            },
            success:function(response){
                window.location.reload();
            }
        })
    }
  })
</script>

@endsection