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
						<a class="header-brand" href="#">
							<img alt="logo" class="header-brand-img main-logo"
								src="<?=base_url()?>assets/images/brand/white-logo.png">
						</a>
						<div class="d-flex order-lg-2 ml-auto">
							<div class="d-sm-flex d-none">
								<a href="#" class="nav-link icon full-screen-link">
									<i class="fe fe-minimize fullscreen-button"></i>
								</a>
							</div>

							<!-- <div class="dropdown d-md-flex header-settings">
								<a href="#" class="nav-link icon" data-toggle="sidebar-right"
									data-target=".sidebar-right">
									<i class="fe fe-align-right"></i>
								</a>
							</div> -->
							<div class="dropdown">
								<a class="nav-link pr-0 leading-none d-flex" data-toggle="dropdown" href="#">
									<span class="avatar avatar-md brround cover-image"
										data-image-src="<?=base_url()?>public/user/unknown-avatar.jpg"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<div class="drop-heading">
										<div class="text-left">
											<h5 class="text-dark mb-1" id="NICKNAME_NAV"></h5>
											<small class="text-muted" id="PREVILAGE_NAV"></small>
										</div>
									</div>
									<div class="dropdown-divider m-0"></div>
									<!-- <a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-user"></i>Profile</a>
						<a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-settings"></i>Setting</a> -->
									<button class="dropdown-item" id="btn-logout"><i
											class="dropdown-icon fe fe-power"></i>Log Out</button>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</header>
			<!--/.Navbar -->
			<div id="filter-loader" style="display:none"><img src="<?= base_url()?>assets/images/svgs/loader.svg"
					alt="loader">
			</div>