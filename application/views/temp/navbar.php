<body class="app">

	<!-- Global Loader-->
	<div id="global-loader"><img src="<?=base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>

	<div class="page">
		<div class="page-main">
			<!-- Navbar-->
			<header class="app-header header">
				<!-- Navbar Right Menu-->
				<div class="container-fluid">
					<div class="d-flex">
						<a class="header-brand" href="<?=base_url()?>main/index">
							<img alt="logo" class="header-brand-img main-logo"
								src="<?=base_url()?>assets/images/brand/chingluh_logo.png">
						</a>
						<h1>Victory Ching Luh Indonesia</h1>
						<div class="d-flex order-lg-2 ml-auto">
							<!-- <div class="d-flex bd-highlight mr-4">
								<div class="p-2 bd-highlight" id="layanan_name_parent">
									<select class="form-control-sm" style="border:0px; background:#f7efef;" id="layanan_name"> -->
							<!-- <option value="#">All Tenant</option>
										<option value="#">All Tenant</option>
										<option value="#">All Tenant</option> -->
							<!-- </select>
								</div>
							</div> -->
							<div class="d-sm-flex d-none">
								<a href="javascript:remove_hash_from_url()" class="nav-link icon full-screen-link">
									<i class="fe fe-minimize fullscreen-button"></i>
								</a>

								<div class="dropdown">
									<a class="nav-link pr-0 leading-none d-flex" data-toggle="dropdown" href="#">
										<span  class="avatar avatar-md brround cover-image"
											><img id="thumb-avatar" src="<?=base_url()?>public/user/unknown-avatar.jpg" class="avatar avatar-md brround cover-image"></span>

									</a>
									<div id="dropdown-menu" class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<div class="drop-heading">
											<div class="text-left">
												<h5 class="text-dark mb-1" id="NICKNAME_NAV"></h5>
												<small class="text-muted" id="PREVILAGE_NAV"></small>
											</div>
										</div>
										<div class="dropdown-divider m-0"></div>
										<a class="dropdown-item" href="<?=base_url()?>main/v_edit_profil"><i
												class="dropdown-icon fe fe-user"></i>Change Profile</a>
										<a class="dropdown-item" href="<?=base_url()?>main/v_ubah_password"><i
												class="dropdown-icon fe fe-settings"></i>Change
											Password</a>
										<button class="dropdown-item" id="btn-logout"><i
												class="dropdown-icon fe fe-power"></i>Log Out</button>
									</div>
								</div>

								<div class="text-left ml-1 mr-2 mt-3">
									<h6 class="text-white" id="NICKNAME_NAV2" style="margin-bottom:0px"></h6>
									<small class="text-white" id="PREVILAGE_NAV2"></small>
								</div>

							</div>

							<!-- <div class="dropdown d-md-flex header-settings">
								<a href="#" class="nav-link icon" data-toggle="sidebar-right"
									data-target=".sidebar-right">
									<i class="fe fe-align-right"></i>
								</a>
							</div> -->


						</div>
					</div>
				</div>
			</header>
			<!--/.Navbar -->
			<div id="filter-loader" style="display:none"><img src="<?= base_url()?>assets/images/svgs/loader.svg"
					alt="loader">
			</div>