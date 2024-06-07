@extends('layouts.frontapp')
@section('content')
<div class="it-breadcrumb-area it-breadcrumb-bg" data-background="assets/img/breadcrumb/breadcrumb.jpg">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="it-breadcrumb-content z-index-3 text-center">
                    <div class="it-breadcrumb-title-box">
                        <h3 class="it-breadcrumb-title">invoice</h3>
                    </div>
                    <div class="it-breadcrumb-list-wrap">
                        <div class="it-breadcrumb-list">
                            <span><a href="{{route('home')}}">home</a></span>
                            <span class="dvdr">//</span>
                            <span>Invoice</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="checkout-area pb-70 mt-20">
    <div class="container">
                <div class="col-lg-12">
                    <div class="your-order mb-30 ">
                        <h3>Your Invoice</h3>
                        <div class="your-order-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-name">Nama Lengkap</th>
                                        <th class="product-name">No Telpon</th>
                                        <th class="product-name">Email</th>
                                        <th class="product-name">Status</th>
                                        <th class="product-name">Tipe Pembayaran</th>
                                        @if($order->bank == "")
                                        @else
                                        <th class="product-name">Bank</th>
                                        @endif
                                        @if($order->va_number == "")
                                        @else
                                        <th class="product-name">VA Number</th>
                                        @endif
                                        <th class="product-name">Product</th>
                                        <th class="product-total">Diskon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{$order->user->name}}
                                        </td>
                                        <td class="product-name">
                                            {{$order->user->phone}}
                                        </td>
                                        <td class="product-name">
                                            {{$order->user->email}}
                                        </td>
                                        @if($order->status == "Paid")
                                        <td class="product-name">
                                            <Label class="status" style="font-style:italic;font-weight:700">
                                            Sudah Bayar
                                            </label><i class="fa-solid fa-check" style="margin-left:10px"></i>
                                        </td>
                                        @elseif($order->status == "Pending" || $order->status == "pending")
                                        <td class="product-name">
                                            <Label class="status" style="font-style:italic;font-weight:700">
                                            Pending
                                            </label><i class="fa-solid fa-triangle-exclamation" style="margin-left:5px"></i>
                                        </td>
                                         @elseif($order->status == "Unpaid")
                                         <td class="product-name">
                                            <Label class="status" style="font-style:italic;font-weight:700">
                                            Belum Bayar
                                            </label><i class="fa-solid fa-triangle-exclamation" style="margin-left:5px"></i>
                                        </td>
                                        @elseif($order->status == "Ditolak")
                                         <td class="product-name">
                                            <Label class="status" style="font-style:italic;font-weight:700">
                                            Pembayaran Gagal
                                            </label><i class="fa-solid fa-square-xmark" style="margin-left:5px"></i>
                                        </td>
                                        @elseif($order->status == "Kadaluarsa")
                                         <td class="product-name">
                                            <Label class="status" style="font-style:italic;font-weight:700">
                                            Kadaluarsa
                                            </label><i class="fa-solid fa-square-xmark" style="margin-left:5px"></i>
                                        </td>
                                        @endif
                                         <td class="product-name">
                                             <Label class="status" style="font-style:italic;font-weight:700;text-transform:uppercase;">
                                            {{$order->payment_type}}
                                            </label>
                                        </td>
                                        @if($order->bank == "")
                                        @else
                                         <td class="product-name">
                                             <Label class="status" style="font-style:italic;font-weight:700;text-transform:uppercase;">
                                            {{$order->bank}}
                                            </label>
                                        </td>
                                        @endif
                                        @if($order->va_number == "")
                                        @else
                                         <td class="product-name">
                                             <Label class="status" style="font-style:italic;font-weight:700">
                                            {{$order->va_number}}
                                            </label>
                                        </td>
                                        @endif
                                        <td class="product-name">
                                            {{$order->product->product_name}}
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">Rp.{{number_format($order->product->harga, 0, ',', '.')}}</span>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td><strong><span class="amount">Rp. {{number_format($order->product->harga, 0, ',', '.')}} </span></strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        @if($order->product->product_name == "Special Class")
                            @if($order->status == "Paid")
                            <a href="https://chat.whatsapp.com/JeQox4IEwSK5PdQGz7GLgu" class="it-btn">Langsung Masuk Whatsapp Grup</a>
                            @elseif($order->status == "")
                            <a href="{{route('invoice',$order->id)}}" class="it-btn">Cek Status</a>
                             @elseif($order->status == "Unpaid")
                            <a href="{{route('siginstitute')}}" class="it-btn">Lanjutkan Belanja</a>
                             @elseif($order->status == "Kadaluarsa")
                            <a href="{{route('siginstitute')}}" class="it-btn">Lanjutkan Belanja</a>
                             @elseif($order->status == "Pending")
                            <a href="{{route('invoice',$order->id)}}" class="it-btn">Cek Pembayaran</a>
                            @endif
                            @else
                            @if($order->status == "Paid")
                           <a href="https://chat.whatsapp.com/CzLFvdKNftN8kvPnZggbDt" class="it-btn">Langsung Masuk Whatsapp Grup</a>
                            @elseif($order->status == "")
                            <a href="{{route('invoice',$order->id)}}" class="it-btn">Cek Status</a>
                            @elseif($order->status == "Unpaid")
                            <a href="{{route('siginstitute')}}" class="it-btn">Lanjutkan Belanja</a>
                            @elseif($order->status == "Kadaluarsa")
                            <a href="{{route('siginstitute')}}" class="it-btn">Lanjutkan Belanja</a>
                            @elseif($order->status == "Pending")
                            <a href="{{route('invoice',$order->id)}}" class="it-btn">Cek Pembayaran</a>
                            @endif
                          @endif
                         </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>