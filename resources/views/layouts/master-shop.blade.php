<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{asset('shop-assets/img/fav.png')}}">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	
	<!-- Site Title -->
	<title>@yield('title')</title>
	
	<!-- CSS  -->
	<link rel="stylesheet" href="/shop-assets/css/app.css">
	<link rel="stylesheet" href="/shop-assets/css/linearicons.css">
	<link rel="stylesheet" href="/shop-assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="/shop-assets/css/themify-icons.css">
	<link rel="stylesheet" href="/shop-assets/css/bootstrap.css">
	<link rel="stylesheet" href="/shop-assets/css/owl.carousel.css">
	<link rel="stylesheet" href="/shop-assets/css/nice-select.css">
	<link rel="stylesheet" href="/shop-assets/css/nouislider.min.css">
	<link rel="stylesheet" href="/shop-assets/css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="/shop-assets/css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="/shop-assets/css/magnific-popup.css">
	<link rel="stylesheet" href="/shop-assets/css/main.css">
	<link rel="stylesheet" href="/shop-assets/css/city.css">
	<!-- <link rel="stylesheet" href="/css/bootstrap.css"> -->

	<!-- JS -->
	<script type="text/javascript" src="/shop-assets/js/city.js"></script>

</head>

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="home"><img src="{{asset('shop-assets/img/logo.png')}}" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="home">Home</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Shop</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="category">Shop Category</a></li>
									<li class="nav-item"><a class="nav-link" href="single-product">Product Details</a></li>
									<li class="nav-item"><a class="nav-link" href="checkout">Product Checkout</a></li>
									<li class="nav-item"><a class="nav-link" href="cart">Shopping Cart</a></li>
									<li class="nav-item"><a class="nav-link" href="confirmation">Confirmation</a></li>
								</ul>
							</li>
							
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="contact">Contact</a></li>
									<li class="nav-item"><a class="nav-link" href="tracking">Tracking</a></li>
									<li class="nav-item"><a class="nav-link" href="elements">Elements</a></li>
								</ul>
							</li>
							
							@if (Route::has('login'))
							@auth
								<li class="nav-item submenu dropdown">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								aria-expanded="false" href="#">{{$user->name}}<i class="fa fa-caret-down fa-fw"></i></a>
									<ul class="dropdown-menu">
										{{-- <li class="nav-item"><a class="nav-link" href="{{route('user.show')}}">Edit Account</a></li> --}}
										<li class="nav-item"><a class="nav-link" href="{{route('user.logout')}}">Logout</a></li>
									</ul>
								</li>
							@else
								<li class="nav-item">	<a class="nav-link" href="{{route('login')}}">Login</a></li>
							
							@endauth
						@endif
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->

	@yield('content')

	<!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>About Us</h6>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
							magna aliqua.
						</p>
					</div>
				</div>
				<div class="col-lg-6  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Newsletter</h6>
						<p>Stay update with our latest</p>
						<div class="" id="mc_embed_signup">

							<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get" class="form-inline">

								<div class="d-flex flex-row">

									<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
									 required="" type="email">


									<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
									<div style="position: absolute; left: -5000px;">
										<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
									</div>

									<!-- <div class="col-lg-4 col-md-4">
												<button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
											</div>  -->
								</div>
								<div class="info"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Follow Us</h6>
						<p>Let us be social</p>
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->

	@yield('contact')
	<script src="/shop-assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="/shop-assets/js/vendor/bootstrap.min.js"></script>
	<script src="/shop-assets/js/jquery.ajaxchimp.min.js"></script>
	<script src="/shop-assets/js/jquery.nice-select.min.js"></script>
	<script src="/shop-assets/js/jquery.sticky.js"></script>
	<script src="/shop-assets/js/nouislider.min.js"></script>
	<script src="/shop-assets/js/countdown.js"></script>
	<script src="/shop-assets/js/jquery.magnific-popup.min.js"></script>
	<script src="/shop-assets/js/owl.carousel.min.js"></script>

	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="/shop-assets/js/gmaps.min.js"></script>
	<script src="/shop-assets/js/main.js"></script>
</body>

</html>