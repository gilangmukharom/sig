@extends('layouts.frontapp')
@section('content')
<div class="it-breadcrumb-area it-breadcrumb-bg" data-background="assets/img/breadcrumb/breadcrumb.jpg">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="it-breadcrumb-content z-index-3 text-center">
                    <div class="it-breadcrumb-title-box">
                        <h3 class="it-breadcrumb-title">Pesanan Saya</h3>
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
                    @if($orders -> isEmpty())
                    <h1>Tidak Ada Pesanan !</h1>
                    @else    
                    <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">ID</th>
                                    <th class="product-thumbnail">Nama</th>
                                    <th class="product-thumbnail">Email</th>
                                    <th class="product-thumbnail">No Telepon</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="product-price">Harga</th>
                                    <th class="product-remove">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order -> id}}</td> 
                                    <td>{{$order -> user -> name}}</td>
                                    <td>{{$order -> user -> email}}</td>
                                    <td>{{$order -> user -> phone}}</td>
                                    <td>{{$order -> product -> product_name}}</td>
                                    <td>{{$order -> product -> harga}}</td>
                                    <td><a href="{{route('invoice',$order->id)}}" class="it-btn">Lihat Invoice</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                </div>
            </div>
        </div>


@endsection