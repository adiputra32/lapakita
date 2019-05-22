@extends('layouts.master-shop')

@section ('title', 'Edit Profile')
    
@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Edit Profile</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">{{$user->name}}<span class="lnr lnr-arrow-right"></span></a>
						<a href="single-product.html">Edit</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<br>
	<div class="container">
		@foreach($showuser as $se)
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="{{ asset('user/user/'.$se->profile_image) }}" alt="">
						
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Edit Your Profile</h3>
						
                        <form class="row login_form" action="{{ route('user.update', $se->id) }}" method="POST" id="contactForm"   novalidate="novalidate" enctype="multipart/form-data">
						{{ csrf_field() }}
            			{{ method_field('PUT') }}
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$se->name}}" >
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" value ="{{$se->email}}">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="oldpassword" placeholder="Old Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            </div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="newpassword" placeholder="New Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            </div>
							<div class="col-md-12 form-group">
								<button type="submit" class="primary-btn">Update Profile</button>
							</div>
						</form>
						
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<br>
	<!-- End Banner Area -->

	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	
@endsection

