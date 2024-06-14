@extends('layouts.frontapp')
@section('content')
<div class="it-breadcrumb-area it-breadcrumb-bg" data-background="assets/img/breadcrumb/breadcrumb.jpg">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="it-breadcrumb-content z-index-3 text-center">
                    <div class="it-breadcrumb-title-box">
                        <h3 class="it-breadcrumb-title">Checkout</h3>
                    </div>
                    <div class="it-breadcrumb-list-wrap">
                        <div class="it-breadcrumb-list">
                            <span><a href="{{route('home')}}">home</a></span>
                            <span class="dvdr">//</span>
                            <span>Checkout</span>
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
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-name">Nama Lengkap</th>
                                        <th class="product-name">Alamat</th>
                                        <th class="product-name">No Telpon</th>
                                        <th class="product-name">Email</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-name">Diskon</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{$orders -> user -> name}}
                                        </td>
                                        <td class="product-name">
                                            {{$orders -> user -> alamat}}
                                        </td>
                                        <td class="product-name">
                                            {{$orders -> user -> phone}}
                                        </td>
                                        <td class="product-name">
                                            {{$orders -> user -> email}}
                                        </td>
                                        <td class="product-name">
                                            {{$orders->product->product_name}}
                                        </td>
                                        <td class="product-name">
                                            {{$orders->diskon}}
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">Rp. {{number_format($orders->total_harga, 0, ',', '.')}}</span>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td><strong><span class="amount">Rp. {{number_format($orders->total_harga, 0, ',', '.')}}</span></strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <button type="submit" id="pay-button" class="btn btn-warning">Place order</button>
                         </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
{{-- / --}}
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('<?php echo $snap_token?>', {
                    // Optional
                    onSuccess: function(result){
                       window.location.href="invoice/{{$orders->id}}"
                       console.log(result);
                    },
                    // Optional
                    onPending: function(result){
                        window.location.href="invoice/{{$orders->id}}"
                        console.log(result)
                    },
                    // Optional
                    onError: function(result){
                        /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            };
        </script>
</main>
@endsection