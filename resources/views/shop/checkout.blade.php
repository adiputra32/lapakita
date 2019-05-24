@extends('layouts.master-shop')

@section ('title', 'Toko Sneakers - Category')
    

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    @if (Route::has('login'))
    @auth
        <!--================Checkout Area =================-->
        <section class="checkout_area section_gap">
            <div class="container">
                <div class="billing_details">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="order_box">
                                <h2>Your Order</h2>
                                <ul class="list">
                                    <li><a>Product <span>Price</span></a></li>
                                    <?php $tot_price = 0; ?>
                                    @foreach($cart as $crt)
                                        @foreach($product as $prd)
                                            <?php if($prd->id == $crt->product_id){ ?>
                                                <?php $tmp_price = $prd->price; $tmp_qty = $crt->qty; $tot_price = $tot_price + ($tmp_qty * $tmp_price); ?>
                                                <li><a>{{$prd->product_name}} <span class="middle">x {{$tmp_qty}}</span> <span class="last">Rp {{$tmp_price = $tmp_price * $tmp_qty }}</span></a></li>
                                            <?php } ?>
                                        @endforeach
                                    @endforeach
                                </ul>
                                <ul class="list list_2">
                                    <form action="confirmation" method="post" enctype="multipart/form-data">
                                        @csrf  
                                    <li><a>Subtotal <span>Rp {{$tot_price}}</span></a></li>
                                    <li><a>Shipping <span>Rp {{ $array_result = $array_result3['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'] }}</span></a></li>
                                    <?php $price = $tot_price + $array_result; ?>
                                    <li><a>Total <span>Rp {{ $price }}</span></a></li>
                                    <input type="hidden" name="id_courier" value="{{$id_courier}}">
                                    <input type="hidden" name="province" value="{{$province}}">
                                    <input type="hidden" name="city" value="{{$city}}"> 
                                    <input type="hidden" name="address" value="{{$address}}">
                                    <input type="hidden" name="subtotal" value="{{$tot_price}}">
                                    <input type="hidden" name="shipping" value="{{$array_result}}">
                                    <input type="hidden" name="total_price" value="{{$price}}">
                                </ul>
                                <div class="creat_account">
                                </div>
                                <button type="submit" style="all: unset; width: 100%;">
                                    <a class="primary-btn">KONFIRMASI PESANAN</a>
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Checkout Area =================-->
    @else
        <section class="checkout_area section_gap">
            <div class="container">
                <div class="returning_customer">
                    <div class="check_title">
                        <h2>Returning Customer? <a href="login">Click here to login</a></h2>
                    </div>
                </div>
            </div>
        </section>
    @endauth
    @endif
    
@endsection