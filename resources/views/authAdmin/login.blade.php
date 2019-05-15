<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>@yield('Login Admin')</title>
	<!--
		CSS
		============================================= -->
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
</head>

<body>

	<!-- Start Header Area -->
    <section class="login_box_area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login_box_img">
                            <img class="img-fluid" src="/shop-assets/img/login.jpg" alt="">
                            <div class="hover">
                                <h4>Welcome Admin</h4>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login_form_inner">
                            <h3>Log in to enter</h3>
                            <form class="row login_form" action="{{ route('admin.login.submit') }}" method="POST" id="contactForm" novalidate="novalidate">
                                @csrf
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="user" name="userName" placeholder="User Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'User Name'">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" class="primary-btn">Log In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	<!-- End related-product Area -->

	<!-- start footer Area -->

	<!-- End footer Area -->

	<script src="/shop-assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
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





