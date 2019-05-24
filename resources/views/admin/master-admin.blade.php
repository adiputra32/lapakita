<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' /> 
	<link rel="icon" href="{!! asset('admin-assets/img/icon.ico')!!} type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{!! asset('admin-assets/js/plugin/webfont/webfont.min.js')!!}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../admin-assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{!! asset('admin-assets/css/bootstrap.min.css')!!}">
	<link rel="stylesheet" href="{!! asset('admin-assets/css/atlantis.min.css')!!}">

	<!-- CSS Just for demo purpose, don't include it in your project -->

</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<h4 class="text-white fw-bold">Kelompok 15</h4>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>

					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../admin-assets/img/admin.png" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{$admin->name}}
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href={{route('admin.logout')}}>
											<span class="link-collapse">Log Out</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
						<a  href="{{route('admin.home')}}" >
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Products</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('admin.product')}}">
											<span class="sub-item">Product List</span>
										</a>
									</li>
									<li>
										<a href="{{route('admin.category')}}">
											<span class="sub-item">Product Categories</span>
										</a>
									</li>
									<li>
										<a href="components/gridsystem.html">
											<span class="sub-item">Product Review</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-th-list"></i>
								<p>Transactions</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									
									<li>
											<a href="{{route('admin.transaction')}}">
											<span class="sub-item">Transactions List</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Courier</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
									<a href="{{route('admin.courier')}}">
											<span class="sub-item">Courier List</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Users</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
									<a href="{{route('admin.user')}}">
											<span class="sub-item">User List</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
							@yield('heading')
					</div>
				</div>
				<div class="page-inner mt-5">
					@yield('content')
				</div>
			</div>
		</div>
					
		
		<!-- Custom template | don't include it in your project! -->
		
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="{!! asset('admin-assets/js/core/jquery.3.2.1.min.js')!!}"></script>  
	<script src="{!! asset('admin-assets/js/core/popper.min.js')!!}"></script> 
	<script src="{!! asset('admin-assets/js/core/bootstrap.min.js')!!}"></script> 

	<!-- jQuery UI -->
	<script src="{!! asset('admin-assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')!!}"></script>
	<script src="{!! asset('admin-assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')!!}"></script> 

	<!-- jQuery Scrollbar -->
	<script src= "{!! asset('admin-assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')!!}"></script>


	<!-- Chart JS -->
	<script src="{!! asset('admin-assets/js/plugin/chart.js/chart.min.js')!!}"></script>  

	<!-- jQuery Sparkline -->
	<script src="{!! asset('admin-assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')!!}"></script> 

	<!-- Chart Circle -->
	<script src="{!! asset('admin-assets/js/plugin/chart-circle/circles.min.js')!!}"></script> 

	<!-- Datatables -->
	<script src="{!! asset('admin-assets/js/plugin/datatables/datatables.min.js')!!}"></script> 

	<!-- Bootstrap Notify -->
	<script src="{!! asset('admin-assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')!!}""../"></script> 

	<!-- jQuery Vector Maps -->
	<script src="{!! asset('admin-assets/js/plugin/jqvmap/jquery.vmap.min.js')!!}"></script> 
	<script src="{!! asset('admin-assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')!!}"></script> 

	<!-- Sweet Alert -->
	<script src= "{!! asset('admin-assets/js/plugin/sweetalert/sweetalert.min.js')!!}"></script> 

	<!-- Atlantis JS -->
	<script src="{!! asset('admin-assets/js/atlantis.min.js"')!!}"></script>  
	<script type="text/javascript">
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});
	
			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);
	
							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );
	
						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});
	
			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});
	
			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';
	
			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');
	
			});
		});

		//detail MODAL Transactions
		$('#transUpdate').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget)
					var id = button.data('idtransaction')
					var timeout = button.data('timeout')
					var subtotal = button.data('subtotal')
					var shipping = button.data('shipping')
					var total = button.data('total')
					var address = button.data('address')
					var regency = button.data('regency')
					var province = button.data('province')
					var user = button.data('user')
					var status = button.data('status')
					var payment = button.data('payment')
					var courier = button.data('courier')
					// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					var modal = $(this)
					modal.find('.modal-body #idtransaction').val(id)
					modal.find('.modal-body #timeout').val(timeout)
					modal.find('.modal-body #subtotal').val(subtotal)
					modal.find('.modal-body #shipping').val(shipping)
					modal.find('.modal-body #total').val(total)
					modal.find('.modal-body #address').val(address)
					modal.find('.modal-body #regency').val(regency)
					modal.find('.modal-body #province').val(province)
					modal.find('.modal-body #user').val(user)
					modal.find('.modal-body #status').val(status)
					modal.find('.modal-body #payment').val(payment)
					modal.find('.modal-body #courier').val(courier)
				})


		//delete MODAL Category
		$('#categoryDelete').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget)
					var id = button.data('idcategory')
					// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					var modal = $(this)
					modal.find('.modal-body #idcategory').val(id)
				})

				
		//delete MODAL Category
		$('#categoryUpdate').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget)
					var id = button.data('idcategory')
					var category = button.data('mycategory')
					// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					var modal = $(this)
					modal.find('.modal-body #idcategory').val(id)
					modal.find('.modal-body #mycategory').val(category)
				})

		//delete MODAL COURIER
		$('#courierDelete').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget)
					var id = button.data('idcourier')
					// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					var modal = $(this)
					modal.find('.modal-body #idcourier').val(id)
				})

		//update MODAL COURIER		
		$('#courierUpdate').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget)
					var courier = button.data('mycourier')
					var id = button.data('idcourier')
					// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					var modal = $(this)
					modal.find('.modal-body #courier').val(courier)
					modal.find('.modal-body #idcourier').val(id)
				})

		//delete MODAL PRODUCT
		$('#productDelete').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget)
					var id = button.data('idproduct')
					// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					var modal = $(this)
					modal.find('.modal-body #idproduct').val(id)
				})

		$('#productUpdate').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget)
					var id = button.data('idproduct')
					var product_name = button.data('name_p')
					var price = button.data('price_p')
					var desc = button.data('description_p')
					var rate = button.data('rate_p')
					var stock= button.data('stock_p')
					var weight= button.data('weight_p')
					var percentage = button.data('percentage')
					var start= button.data('start')
					var end= button.data('end')
					// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
					// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
					var modal = $(this)
					modal.find('.modal-body #idproduct').val(id)
					modal.find('.modal-body #product_name').val(product_name)
					modal.find('.modal-body #price').val(price)
					modal.find('.modal-body #description').val(desc)
					modal.find('.modal-body #stock').val(stock)
					modal.find('.modal-body #weight').val(weight)
					modal.find('.modal-body #rate').val(rate)
					modal.find('.modal-body #percentage').val(percentage)
					modal.find('.modal-body #start').val(start)
					modal.find('.modal-body #end').val(end)
				})
	</script>

</body>
</html>