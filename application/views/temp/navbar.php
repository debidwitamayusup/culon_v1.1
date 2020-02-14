<!-- Navbar-->
<header class="app-header header">
	<!-- Navbar Right Menu-->
	<div class="container-fluid">
		<div class="d-flex">
			
			<a class="header-brand">
				<img alt="logo" class="header-brand-img main-logo float-left"
					src="<?= base_url()?>assets/images/brand/white-logo.png">
			</a>
			<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar"
				href="#"></a>
			<!-- Sidebar toggle button-->
			<div class="d-flex order-lg-2 ml-auto">
				<div class="d-sm-flex d-none">
					<a class="nav-link icon full-screen-link">
						<i href="#" class="fe fe-minimize fullscreen-button"></i>
					</a>
				</div>
				<div class="dropdown">
					<a class="nav-link pr-0 leading-none d-flex" data-toggle="dropdown" href="#">
						<span class="avatar avatar-md brround cover-image"
							data-image-src="<?= base_url()?>assets/images/brand/user.jpg"></span>
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
						<button class="dropdown-item" id="btn-logout" ><i class="dropdown-icon fe fe-power"></i>Log Out</button>
					</div>
				</div>

			</div>
			<div class="dropdown d-sm-flex d-none header-message">
			</div>

			<div class="dropdown d-md-flex header-settings">

			</div>
		</div>
	</div>
	</div>
</header>
<div class="mb-1 navbar navbar-expand-lg  responsive-navbar navbar-dark d-sm-none bg-white">
</div>
</div>
<!--/.Navbar -->
<!-- filter loarder -->
<div id="filter-loader" style="display:none"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader">
</div>