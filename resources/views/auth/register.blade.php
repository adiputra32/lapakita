@extends('master-shop')

@section ('title', 'Toko Sneakers - User Register')
    

@section('content')


<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Login/Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="/shop-assets/img/login.jpg" alt="">
						<div class="hover">
							<h4>Have an account?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                        <a class="primary-btn" href="{{route('user.login')}}">Log In</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Register to enter</h3>
                        <form class="row login_form" action="{{ route('user.regis.submit') }}" method="POST" id="contactForm"   novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'">
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            </div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            </div>
                            <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="confirm" name='password_confirmation' placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
							</div>
                            <div class="col-md-9 mb-3">
                                <div class="file-field">
                                        <div class="btn btn-outline-white waves-effect btn-sm float-left">
                                      
                                            <input type="file" name="foto">
                                        </div>
                                </div>
                            </div>
							<div class="col-md-12 form-group">
								<button type="submit" class="primary-btn">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
    </section>    
@endsection