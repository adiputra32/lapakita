@extends('layouts.master-shop')

@section ('title', 'Toko Sneakers - Category')
    
@section('content')
    <!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
            <div class="container">
                <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                    <div class="col-first">
                        <h1>Confirmation</h1>
                        <nav class="d-flex align-items-center">
                            <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                            <a href="category.html">Confirmation</a>
                        </nav>
                    </div>
                </div>
            </div>
    </section>
    <!-- End Banner Area -->

    <!--================Order Details Area =================-->
    <section class="order_details section_gap">
        <div class="container">
            <h3 class="title_confirmation">Thank you. Your order has been received.</h3>
            <form action="checkout" method="post" enctype="multipart/form-data">
                @csrf  
                <h5>Input buti pembayaran</h5>
                <input type="file" name="bukti" required>
                <button type="submit" class="primary-btn">KIRIM</button>
            </form>
        </div>
    </section>
    <!--================End Order Details Area =================-->
@endsection