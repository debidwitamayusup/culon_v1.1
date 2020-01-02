
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