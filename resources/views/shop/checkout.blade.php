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
                        <div class="col-lg-4">
                            <div class="order_box">
                                <h2>Your Order</h2>
                                <ul class="list">
                                    <li><a href="#">Product <span>Total</span></a></li>
                                    <li><a href="#">Fresh Blackberry <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>
                                    <li><a href="#">Fresh Tomatoes <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>
                                    <li><a href="#">Fresh Brocoli <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>
                                </ul>
                                <ul class="list list_2">
                                    <li><a href="#">Subtotal <span>$2160.00</span></a></li>
                                    <li><a href="#">Shipping <span>Flat rate: $50.00</span></a></li>
                                    <li><a href="#">Total <span>$2210.00</span></a></li>
                                </ul>
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option4" name="selector">
                                    <label for="f-option4">I’ve read and accept the </label>
                                    <a href="#">terms & conditions*</a>
                                </div>
                                <a class="primary-btn" href="#">Proceed to Paypal</a>
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