<!doctype html>
<html lang="en" dir="ltr">
  <head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="Spaner - Simple light Bootstrap Nice Admin Panel Dashboard Design Responsive HTML5 Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="bootstrap panel, bootstrap admin template, dashboard template, bootstrap dashboard, dashboard design, best dashboard, html css admin template, html admin template, admin panel template, admin dashbaord template, bootstrap dashbaord template, it dashbaord, hr dashbaord, marketing dashbaord, sales dashbaord, dashboard ui, admin portal, bootstrap 4 admin template, bootstrap 4 admin"/>

		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/images/brand/infomedia_icon96.ico" />

		<!-- Title -->
		<title>Log In - Dashboard</title>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css">

		<!-- Custom scroll bar css-->
		<link href="<?php echo base_url();?>assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/color-styles.css" rel="stylesheet" />

		<!-- Dashboard css -->
		<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />

		<!--Font Awesome css-->
		<link href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.css" rel="stylesheet">

		<!---Font icons css-->
		<link href="<?php echo base_url();?>assets/plugins/iconfonts/plugin.css" rel="stylesheet" />

	</head>
	<body>
		<input type="hidden" id="base_url" name="base_url" value="<?php echo base_url()?>">
		<!-- Global Loader-->
		<div id="global-loader"><img src="<?php echo base_url();?>assets/images/svgs/loader.svg" alt="loader"></div>

		<div class="page">
			<div class="container">
				<div class="row">
					<div class="col  mx-auto">
						<div class="text-center mb-6">
							<img src="<?php echo base_url();?>assets/images/brand/infomedia_icon96.ico" class="" alt="">
						</div>
						<div class="row justify-content-center">
							<div class="col-md-8">
								<div class="card-group mb-0">
									<div class="card p-4">
										<div class="card-body">
											<p>Please Enter the Email address registered on your account</p>
											<div class="form-group">
												<label class="form-label text-left" for="exampleInputEmail1">Email address</label>
												<input type="email" class="form-control" id="exampleInputEmail1"  placeholder="Enter email">
											</div>
											<div class="form-group">
												<label for="inputPassword3" class="text-left form-label">Password</label>
												<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
											</div>
											<div class="form-group ">
												<label class="form-label" >Tenant</label>
												<select class="form-control select2 custom-select" id="select-tenant-id" >
													<option value="oct_pegadaian">oct_pegadaian</option>
													<option value="oct_posindo">oct_posindo</option>
												</select>
											</div>
											<div class="checkbox text-left mb-2">
												<div class="custom-checkbox custom-control">
													<input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
													<label for="checkbox-2" class="custom-control-label">Check me Out</label>
												</div>
											</div>
											<div class="text-left">
												<button type="submit" class="btn btn-primary" id="btn-login">Sign in</button>
												<button type="submit" class="btn btn-secondary">Cancel</button>
											</div>
											<div class="text-left text-muted mt-3">
												Don't have account yet? <a href="register.html">Sign up</a>
											</div>
										</div>
									</div>
									<div class="card  py-5 d-md-down-none">
										<div class="card-body align-items-center">
											<div>
												<h2 class="text-center">Login to your Account</h2>
												<p class="text-muted text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, consectetur adipiscing elit consectetur adipiscing elit luctus dui. Mauris magna metus.</p>
												<div class="social-icons text-white">
													<ul class="mb-0">
														<li><a class="btn  btn-social btn-block facebook-bg"><i class="fab fa-facebook"></i> Sign up with Facebook</a></li>
														<li class="mt-3"><a class="btn  btn-social btn-block google-bg"><i class="fab fa-google"></i> Sign up with Google</a></li>
														<li class="mt-3"><a class="btn  btn-social btn-block twitter-bg"><i class="fab fa-twitter"></i> Sign up with Twitter</a></li>
														<li class="mt-3"><a class="btn  btn-social btn-block dribbble-bg"><i class="fab fa-dribbble"></i> Sign up with Dribble</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Dashboard js -->
		<script src="<?php echo base_url();?>assets/js/vendors/jquery-3.2.1.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/vendors/jquery.sparkline.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/vendors/selectize.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/vendors/jquery.tablesorter.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/vendors/circle-progress.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/jquery.rating/jquery.rating-stars.js"></script>

		<!--Bootstrap.min js-->
		<script src="<?php echo base_url();?>assets/plugins/bootstrap/popper.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Custom scroll bar js-->
		<script src="<?php echo base_url();?>assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--Peitychart js-->
		<script src="<?php echo base_url();?>assets/plugins/peitychart/jquery.peity.min.js"></script>

		<!--Counters js-->
		<script src="<?php echo base_url();?>assets/plugins/counters/counterup.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/counters/waypoints.min.js"></script>

		<!-- Custom js -->
		<script src="<?php echo base_url();?>assets/js/custom.js"></script>

		<!-- app js -->
		<script src="<?=base_url()?>assets/public/js/app/app-main.js"></script>
	</body>
</html>
