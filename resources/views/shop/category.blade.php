@extends('layouts.master-shop')

@section ('title', 'Toko Sneakers - Category')
    

@section('content')
    <!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Shop Category page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Fashon Category</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
    <br><br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Browse Categories</div>
					<ul class="main-categories">
						<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable"><span
								 class="lnr lnr-arrow-right"></span>Sepatu Pria</a>
							<ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false" aria-controls="fruitsVegetable">
								<li class="main-nav-list child"><a href="#">Sneakers</a></li>
								<li class="main-nav-list child"><a href="#">Loafers</a></li>
								<li class="main-nav-list child"><a href="#">Boots</a></li>
								<li class="main-nav-list child"><a href="#">Pantofel</a></li>
								<li class="main-nav-list child"><a href="#">Sepatu Sandal</a></li>
								<li class="main-nav-list child"><a href="#">Slip On</a></li>
							</ul>
						</li>

						<li class="main-nav-list"><a data-toggle="collapse" href="#meatFish" aria-expanded="false" aria-controls="meatFish"><span
								 class="lnr lnr-arrow-right"></span>Sepatu Wanita</a>
							<ul class="collapse" id="meatFish" data-toggle="collapse" aria-expanded="false" aria-controls="meatFish">
								<li class="main-nav-list child"><a href="#">Sneakers</a></li>
								<li class="main-nav-list child"><a href="#">Pantofel</a></li>
								<li class="main-nav-list child"><a href="#">Espadrilles</a></li>
								<li class="main-nav-list child"><a href="#">Sepatu Sandal</a></li>
								<li class="main-nav-list child"><a href="#">Loafers</a></li>
								<li class="main-nav-list child"><a href="#">Boots</a></li>
								<li class="main-nav-list child"><a href="#">Flat Shoes</a></li>
								<li class="main-nav-list child"><a href="#">Wedges</a></li>
								<li class="main-nav-list child"><a href="#">Sepatu Heels</a></li>
								<li class="main-nav-list child"><a href="#"> Slip On</a></li>
							</ul>
						</li>
					</ul>
				</div>
				
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="pagination">
						<a href="{{$products->previousPageUrl()}}" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
						<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
						<a href="{{$products->nextPageUrl()}}" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<!-- single product -->
						@foreach($products as $product)
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="{{  asset('/storage/product_image/'.$product->product_image->first()->image_name) }}" alt="abc" style="width: 210px; height: 210px;" >

								<div class="product-details">
									<h6>{{$product->product_name}}</h6>
									<div class="price">
										<h6>{{$product->price}}</h6>
										<!-- <h6 class="l-through">$210.00</h6> -->
									</div>
									<div class="prd-bottom">
										<form action="category" method="post" enctype="multipart/form-data">
											@csrf  
											<input type="hidden" name="id_product" value="{{$product->id}}">
											<button type="submit" style="all: unset; float: left;">
												<a href="#" class="social-info" >
													<span class="ti-bag"></span>
													<p class="hover-text">add to cart</p>
												</a>
											</button>
										</form>
										<form action="single-product" method="post" enctype="multipart/form-data">
											@csrf  
											<input type="hidden" name="id_product" value="{{$product->id}}">
											<button type="submit" style="all: unset;">
												<a href="#" class="social-info">
													<span class="lnr lnr-move"></span>
													<p class="hover-text">view more</p>
												</a>
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						
					</div>
				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="pagination">
							<a href="{{$products->previousPageUrl()}}" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
							<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
							<a href="{{$products->nextPageUrl()}}" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>
				<!-- End Filter Bar -->
			</div>
		</div>
    </div>
    <br><br><br><br>
@endsection