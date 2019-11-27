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
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/images/brand/favicon.ico" />

		<!-- Title -->
		<title>Spaner - Simple light Bootstrap Nice Admin Panel Dashboard Design Responsive HTML5 Template</title>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css">

        <!--Font Awesome-->
		<link href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.css" rel="stylesheet">

		<!-- Dashboard Css -->
		<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/color-styles.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/skin-modes.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="<?php echo base_url();?>assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!--Sidemenu css-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/side-menu/side-menu.css">

		<!--Sidemenu-responsive-tabs  css -->
		<link href="<?php echo base_url();?>assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css" rel="stylesheet">

		<!-- P-scroll css -->
		<link href="<?php echo base_url();?>assets/plugins/p-scroll/p-scroll.css" rel="stylesheet" type="text/css">

		<!-- Morris.js Charts Plugin -->
		<link href="<?php echo base_url();?>assets/plugins/morris/morris.css" rel="stylesheet" />

		<!---Font icons-->
		<link href="<?php echo base_url();?>assets/plugins/iconfonts/plugin.css" rel="stylesheet" />

		<!-- Sidebar css -->
		<link href="<?php echo base_url();?>assets/plugins/sidebar/sidebar.css" rel="stylesheet">

	</head>

	<body class="app">

		<!-- Global Loader-->
		<div id="global-loader"><img src="<?php echo base_url();?>assets/images/svgs/loader.svg" alt="loader"></div>

		<div class="page">
			<div class="page-main">

				<!-- Navbar-->
				<header class="app-header header">
					<!-- Navbar Right Menu-->
					<div class="container-fluid">
						<div class="d-flex">
							<a class="header-brand" href="index.html">
								<img alt="logo" class="header-brand-img main-logo" src="<?php echo base_url();?>assets/images/brand/logo1.png">
								<img alt="logo" class="header-brand-img mobile-logo" src="<?php echo base_url();?>assets/images/brand/icon.png">
							</a>
							<!-- Sidebar toggle button-->
							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
							<div class="dropdown d-sm-flex d-none">
								<a href="#" class="nav-link icon" data-toggle="dropdown">
									<i class="fe fe-search"></i>
								</a>
								<div class="dropdown-menu header-search dropdown-menu-left dropdown-menu-arrow">
									<div class="input-group w-100 p-2">
										<input type="text" class="form-control " placeholder="Search....">
										<div class="input-group-append ">
											<button type="button" class="btn btn-primary ">
												<i class="fas fa-search" aria-hidden="true"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="dropdown d-sm-flex d-none header-message">
								<a class="nav-link icon" data-toggle="dropdown">
									<i class="fe fe-grid mr-2"></i><span class="lay-outstyle">Menus styles</span>
									<span class="pulse2 bg-warning" aria-hidden="true"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<a class="dropdown-item d-flex pb-3" href="left-menu.html">Icon Menu</a>
									<a class="dropdown-item d-flex pb-3" href="sidemenu.html">Icon Closed Menu</a>
									<a class="dropdown-item d-flex pb-3" href="overlay2.html">Icon Overlay Menu</a>
									<a class="dropdown-item d-flex pb-3" href="overlay.html">Closed Overlay Menu</a>
									<a class="dropdown-item d-flex pb-3" href="horizontal.html">Horizontal Menu</a>

								</div>
							</div>
							<div class="d-flex order-lg-2 ml-auto">
								<div class="d-sm-flex d-none">
									<a href="#" class="nav-link icon full-screen-link">
										<i class="fe fe-minimize fullscreen-button"></i>
									</a>
								</div>
								<div class="dropdown d-none d-md-flex">
									<a href="#" class="d-flex nav-link pr-0 country-flag" data-toggle="dropdown">
										<span class="avatar country-Flag mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/svgs/flags/french_flag.jpg"></span>
										<div>
											<span class="text-white mr-3 mt-0">English</span>
										</div>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<a href="#" class="dropdown-item d-flex pb-3">
											<span class="avatar country-Flag mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/svgs/flags/french_flag.jpg"></span>
											<div class="d-flex">
												<span class="">French</span>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex pb-3">
											<span class="avatar country-Flag mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/svgs/flags/germany_flag.jpg"></span>
											<div class="d-flex">
												<span class="">Germany</span>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex pb-3">
											<span class="avatar country-Flag mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/svgs/flags/italy_flag.jpg"></span>
											<div class="d-flex">
												<span class="">Italy</span>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex pb-3">
											<span class="avatar country-Flag  mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/svgs/flags/russia_flag.jpg"></span>
											<div class="d-flex">
												<span class="">Russia</span>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex pb-3">
											<span class="avatar country-Flag mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/svgs/flags/spain_flag.jpg"></span>
											<div class="d-flex">
												<span class="">spain</span>
											</div>
										</a>
									</div>
								</div><!-- flag -->
								<div class="dropdown d-sm-flex d-none header-message">
									<a class="nav-link icon" data-toggle="dropdown">
										<i class="fe fe-mail"></i>
										<span class=" nav-unread badge badge-danger badge-pill">4</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<a class="dropdown-item text-center" href="#">2 New Messages</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item d-flex pb-3" href="#">
											<span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/users/7.jpg"></span>
											<div>
												<strong>Madeleine</strong> Hey! there I' am available....
												<div class="small text-muted">
													3 hours ago
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-3" href="#"><span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/users/3.jpg"></span>
											<div>
												<strong>Anthony</strong> New product Launching...
												<div class="small text-muted">
													5 hour ago
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-3" href="#"><span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/users/8.jpg"></span>
											<div>
												<strong>Olivia</strong> New Schedule Realease......
												<div class="small text-muted">
													45 mintues ago
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-3" href="#"><span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/users/9.jpg"></span>
											<div>
												<strong>Sanderson</strong> New Schedule Realease......
												<div class="small text-muted">
													2 days ago
												</div>
											</div>
										</a>
										<div class="dropdown-divider"></div>
										<div class="text-center dropdown-btn pb-3">
											<div class="btn-list">
												<a href="#" class="btn btn-primary btn-sm"><i class="fe fe-plus mr-1"></i>Add New</a>
												<a href="#" class=" btn btn-secondary btn-sm"><i class="fe fe-eye mr-1"></i>View All</a>
											</div>
										</div>
									</div>
								</div>
								<div class="dropdown d-sm-flex d-none header-message">
									<a class="nav-link icon" data-toggle="dropdown">
										<i class="fe fe-bell"></i>
										<span class=" nav-unread badge badge-warning  badge-pill">3</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<a class="dropdown-item text-center" href="#">Notifications</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item d-flex pb-4" href="#">
											<span class="avatar brround mr-3 align-self-center avatar-md cover-image bg-primary"><i class="fe fe-mail fs-12"></i></span>
											<div>
												<span class="font-weight-bold"> commented on your post </span>
												<div class="small text-muted d-flex">
													3 hours ago
													<div class="ml-auto">
													<span class="badge badge-primary">New</span>
													</div>
												</div>
												<div class="progress progress-xs mt-1">
													<div class="progress-bar bg-primary w-30"></div>
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-4" href="#">
											<span class="avatar avatar-md brround mr-3 align-self-center cover-image bg-secondary"><i class="fe fe-download"></i>
											</span>
											<div>
												<span class="font-weight-bold"> New file has been Uploaded </span>
												<div class="small text-muted d-flex">
													5 hour ago
													<div class="ml-auto">
													<span class="badge badge-secondary">New</span>
													</div>
												</div>
												<div class="progress progress-xs mt-1">
													<div class="progress-bar bg-secondary w-50"></div>
												</div>
											</div>
										</a>
										<a class="dropdown-item d-flex pb-4" href="#">
											<span class="avatar avatar-md brround mr-3 align-self-center cover-image bg-warning"><i class="fe fe-user"></i>
											</span>
											<div>
												<span class="font-weight-bold"> User account has Updated</span>
												<div class="small text-muted d-flex">
													5 hour ago
													<div class="ml-auto">
													<span class="badge badge-warning">New</span>
													</div>
												</div>
												<div class="progress progress-xs mt-1">
													<div class="progress-bar bg-warning w-70"></div>
												</div>
											</div>
										</a>
										<div class="dropdown-divider"></div>
										<div class="text-center dropdown-btn pb-3">
											<div class="btn-list">
												<a href="#" class="btn btn-primary btn-sm"><i class="fe fe-plus mr-1"></i>Add New</a>
												<a href="#" class=" btn btn-secondary btn-sm"><i class="fe fe-eye mr-1"></i>View All</a>
											</div>
										</div>
									</div>
								</div>
								<button class="navbar-toggler navresponsive-toggler d-sm-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
									aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon fe fe-more-vertical text-white"></span>
								</button>
								<!--Navbar -->
								<div class="dropdown">
									<a class="nav-link pr-0 leading-none d-flex" data-toggle="dropdown" href="#">
										<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo base_url();?>assets/images/users/5.jpg"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<div class="drop-heading">
											<div class="text-center">
												<h5 class="text-dark mb-1">Vanessa Dyer</h5>
												<small class="text-muted">Web Developer</small>
											</div>
										</div>
										<div class="dropdown-divider m-0"></div>
										<a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-user"></i>Profile</a>
										<a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-edit"></i>Schedule</a>
										<a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-mail"></i> Inbox</a>
										<a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-unlock"></i> Look Screen</a>
										<a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-power"></i> Log Out</a>
										<div class="dropdown-divider"></div>
										<div class="text-center dropdown-btn pb-3">
											<div class="btn-list">
												<a href="#" class="btn btn-icon btn-facebook btn-sm"><i class="si si-social-facebook"></i></a>
												<a href="#" class="btn btn-icon btn-twitter btn-sm"><i class="si si-social-twitter"></i></a>
												<a href="#" class="btn btn-icon btn-instagram btn-sm"><i class="si si-social-instagram"></i></a>
											</div>
										</div>
									</div>
								</div>
								<div class="dropdown d-md-flex header-settings">
									<a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
										<i class="fe fe-align-right"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</header>
				<div class="mb-1 navbar navbar-expand-lg  responsive-navbar navbar-dark d-sm-none bg-white">
					<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
						<div class="d-flex order-lg-2 ml-auto">
							<div class="dropdown d-md-flex">
								<a href="#" class="nav-link icon" data-toggle="dropdown">
									<i class="fe fe-search"></i>
								</a>
								<div class="dropdown-menu  dropdown-menu-right dropdown-menu-arrow">
									<div class="input-group w-100 p-2">
										<input type="text" class="form-control " placeholder="Search....">
										<div class="input-group-append ">
											<button type="button" class="btn btn-primary ">
												<i class="fas fa-search" aria-hidden="true"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="d-md-flex">
								<a href="#" class="nav-link icon full-screen-link text-dark">
									<i class="fe fe-minimize fullscreen-button"></i>
								</a>
							</div>
							<div class="dropdown  d-md-flex header-contact">
								<a class="nav-link icon text-dark" data-toggle="dropdown">
									<i class="fe fe-flag"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<a href="#" class="dropdown-item d-flex pb-3">
										<span class="avatar country-Flag mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/svgs/flags/french_flag.jpg"></span>
										<div class="d-flex">
											<span class="">French</span>
										</div>
									</a>
									<a href="#" class="dropdown-item d-flex pb-3">
										<span class="avatar country-Flag mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/svgs/flags/germany_flag.jpg"></span>
										<div class="d-flex">
											<span class="">Germany</span>
										</div>
									</a>
									<a href="#" class="dropdown-item d-flex pb-3">
										<span class="avatar country-Flag mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/svgs/flags/italy_flag.jpg"></span>
										<div class="d-flex">
											<span class="">Italy</span>
										</div>
									</a>
									<a href="#" class="dropdown-item d-flex pb-3">
										<span class="avatar country-Flag  mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/svgs/flags/russia_flag.jpg"></span>
										<div class="d-flex">
											<span class="">Russia</span>
										</div>
									</a>
									<a href="#" class="dropdown-item d-flex pb-3">
										<span class="avatar country-Flag mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/svgs/flags/spain_flag.jpg"></span>
										<div class="d-flex">
											<span class="">spain</span>
										</div>
									</a>
								</div>
							</div>
							<div class="dropdown  d-md-flex header-contact">
								<a class="nav-link icon text-dark" data-toggle="dropdown">
									<i class="fe fe-mail"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<a class="dropdown-item text-center" href="#">2 New Messages</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item d-flex pb-3" href="#">
										<span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/users/7.jpg"></span>
										<div>
											<strong>Madeleine</strong> Hey! there I' am available....
											<div class="small text-muted">
												3 hours ago
											</div>
										</div>
									</a>
									<a class="dropdown-item d-flex pb-3" href="#"><span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/users/3.jpg"></span>
										<div>
											<strong>Anthony</strong> New product Launching...
											<div class="small text-muted">
												5 hour ago
											</div>
										</div>
									</a>
									<a class="dropdown-item d-flex pb-3" href="#"><span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/users/8.jpg"></span>
										<div>
											<strong>Olivia</strong> New Schedule Realease......
											<div class="small text-muted">
												45 mintues ago
											</div>
										</div>
									</a>
									<a class="dropdown-item d-flex pb-3" href="#"><span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="<?php echo base_url();?>assets/images/users/9.jpg"></span>
										<div>
											<strong>Sanderson</strong> New Schedule Realease......
											<div class="small text-muted">
												2 days ago
											</div>
										</div>
									</a>
									<div class="dropdown-divider"></div>
									<div class="text-center dropdown-btn pb-3">
										<div class="btn-list">
											<a href="#" class="btn btn-primary btn-sm"><i class="fe fe-plus mr-1"></i>Add New</a>
											<a href="#" class=" btn btn-secondary btn-sm"><i class="fe fe-eye mr-1"></i>View All</a>
										</div>
									</div>
								</div>
							</div>
							<div class="dropdown d-md-flex header-message">
								<a class="nav-link icon text-dark" data-toggle="dropdown">
									<i class="fe fe-bell"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<a class="dropdown-item text-center" href="#">Notifications</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item d-flex pb-4" href="#">
										<span class="avatar brround mr-3 align-self-center avatar-md cover-image bg-primary"><i class="fe fe-mail fs-12"></i></span>
										<div>
											<span class="font-weight-bold"> commented on your post </span>
											<div class="small text-muted d-flex">
												3 hours ago
												<div class="ml-auto">
												<span class="badge badge-primary">New</span>
												</div>
											</div>
											<div class="progress progress-xs mt-1">
												<div class="progress-bar bg-primary w-30"></div>
											</div>
										</div>
									</a>
									<a class="dropdown-item d-flex pb-4" href="#">
										<span class="avatar avatar-md brround mr-3 align-self-center cover-image bg-secondary"><i class="fe fe-download"></i>
										</span>
										<div>
											<span class="font-weight-bold"> New file has been Uploaded </span>
											<div class="small text-muted d-flex">
												5 hour ago
												<div class="ml-auto">
												<span class="badge badge-secondary">New</span>
												</div>
											</div>
											<div class="progress progress-xs mt-1">
												<div class="progress-bar bg-secondary w-50"></div>
											</div>
										</div>
									</a>
									<a class="dropdown-item d-flex pb-4" href="#">
										<span class="avatar avatar-md brround mr-3 align-self-center cover-image bg-warning"><i class="fe fe-user"></i>
										</span>
										<div>
											<span class="font-weight-bold"> User account has Updated</span>
											<div class="small text-muted d-flex">
												5 hour ago
												<div class="ml-auto">
												<span class="badge badge-warning">New</span>
												</div>
											</div>
											<div class="progress progress-xs mt-1">
												<div class="progress-bar bg-warning w-70"></div>
											</div>
										</div>
									</a>
									<div class="dropdown-divider"></div>
									<div class="text-center dropdown-btn pb-3">
										<div class="btn-list">
											<a href="#" class="btn btn-primary btn-sm"><i class="fe fe-plus mr-1"></i>Add New</a>
											<a href="#" class=" btn btn-secondary btn-sm"><i class="fe fe-eye mr-1"></i>View All</a>
										</div>
									</div>
								</div>
							</div>
							<div class="dropdown d-md-flex header-message">
								<a class="nav-link icon" data-toggle="dropdown">
									<i class="fe fe-grid"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<a class="dropdown-item d-flex pb-3" href="left-menu.html">Icon Menu</a>
									<a class="dropdown-item d-flex pb-3" href="sidemenu.html">Icon Closed Menu</a>
									<a class="dropdown-item d-flex pb-3" href="overlay2.html">Icon Overlay Menu</a>
									<a class="dropdown-item d-flex pb-3" href="overlay.html">Closed Overlay Menu</a>
									<a class="dropdown-item d-flex pb-3" href="horizontal.html">Horizontal Menu</a>

								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/.Navbar -->

				<!-- Sidebar menu-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar">
					<div class="side-tab-body p-0 border-0" id="sidemenu-Tab">
						<div class="first-sidemenu">
							<ul class="resp-tabs-list hor_1">
								<li class="resp-tab-active active" data-toggle="tooltip" data-placement="right" title="Home">
									<div class="side-menutext"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span><span class="badge badge-primary nav-badge badge-pill">5</span></div>
								</li>
								<li data-toggle="tooltip" data-placement="right" title="widgets">
									<div class="side-menutext"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Widgets</span></div>
								</li>
								<li data-toggle="tooltip" data-placement="right" title="Components">
									<div class="side-menutext"><i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Components</span></div>
								</li>
								<li data-toggle="tooltip" data-placement="right" title="Charts">
									<div class="side-menutext"><i class="side-menu__icon fe fe-pie-chart"></i><span class="side-menu__label">Charts</span><span class="badge badge-info nav-badge badge-pill">7</span></div>
								</li>
								<li data-toggle="tooltip" data-placement="right" title="Elements">
									<div class="side-menutext"><i class="side-menu__icon fe fe-package"></i><span class="side-menu__label">Elements</span></div>
								</li>
								<li data-toggle="tooltip" data-placement="right" title="Pages">
									<div class="side-menutext"><i class="side-menu__icon fe fe-life-buoy"></i><span class="side-menu__label">Pages</span></div>
								</li>
								<li data-toggle="tooltip" data-placement="right" title="Icons">
									<div class="side-menutext"><i class="side-menu__icon fe fe-stop-circle"></i><span class="side-menu__label">Icons</span></div>
								</li>
								<li data-toggle="tooltip" data-placement="right" title="Forms">
									<div class="side-menutext"><i class="side-menu__icon fe fe-file-text"></i><span class="side-menu__label">Forms</span><span class="badge badge-warning nav-badge badge-pill">3</span></div>
								</li>
								<li data-toggle="tooltip" data-placement="right" title="E-commerce">
									<div class="side-menutext"><i class="side-menu__icon fe fe-shopping-cart"></i><span class="side-menu__label">E-commerce</span><span class="badge badge-danger nav-badge badge-pill">3</span></div>
								</li>
								<li data-toggle="tooltip" data-placement="right" title="Custom">
									<div class="side-menutext"><i class="side-menu__icon fe fe-info"></i><span class="side-menu__label">Custom</span></div>
								</li>
							</ul>
						</div>
						<div class="second-sidemenu">
							<div class="resp-tabs-container hor_1">
								<div class="resp-tab-content-active">
									<div class="row">
										<div class="col-md-12">
											<h5 class="mt-3 mb-4">Dashboard</h5>
											<a class="slide-item" href="index.html"> Dashboard 01</a>
											<a class="slide-item" href="index2.html"> Dashboard 02 </a>
											<a class="slide-item" href="index3.html"> Dashboard 03</a>
											<a class="slide-item" href="index4.html"> Dashboard 04</a>
											<a class="slide-item" href="index5.html"> Dashboard 05</a>
											<h5 class="mt-5 mb-4">Tags</h5>
											<ul class="inbox-nav">
												<li> <a href="#"> <i class=" fa fa-stop text-primary"></i> Work </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-secondary"></i> Design </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-danger"></i> Projects </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-warning"></i> Presentation </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-info"></i> Office </a></li>
											</ul>
											<h5 class="mt-5 mb-4">Optional Submenus</h5>
											<div class="side-menu p-0">
												<div class="slide submenu">
													<a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label"> Multilevl menu</span><i class="angle fa fa-angle-down"></i></a>
													<ul class="slide-menu submenu-list">
														<li>
															<a href="#" class="slide-item">Level 1</a>
														</li>
														<li>
															<a href="#" class="slide-item">Level 2</a>
														</li>
														<li>
															<a href="#" class="slide-item">Level 3</a>
														</li>
													</ul>
												</div>
												<div class="slide submenu">
													<a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label"> Submenu1</span><i class="angle fa fa-angle-down"></i></a>
													<ul class="slide-menu submenu-list">
														<li>
															<a href="#" class="slide-item">Submenu1.1</a>
														</li>
														<li>
															<a href="#" class="slide-item">Submenu1.2</a>
														</li>
														<li>
															<a href="#" class="slide-item">Submenu1.3</a>
														</li>
														<li>
															<a href="#" class="slide-item">Submenu1.4</a>
														</li>
														<li>
															<a href="#" class="slide-item">Submenu1.5</a>
														</li>
													</ul>
												</div>
												<div class="slide submenu">
													<a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label"> Submenu2</span><i class="angle fa fa-angle-down"></i></a>
													<ul class="slide-menu submenu-list">
														<li>
															<a href="#" class="slide-item">Submenu2.1</a>
														</li>
														<li>
															<a href="#" class="slide-item">Submenu2.2</a>
														</li>
														<li>
															<a href="#" class="slide-item">Submenu2.3</a>
														</li>
														<li>
															<a href="#" class="slide-item">Submenu2.4</a>
														</li>
														<li>
															<a href="#" class="slide-item">Submenu2.5</a>
														</li>
													</ul>
												</div>
											</div>
											<h5 class="mt-5 mb-4">Settings</h5>
											<div class="">
												<div class="d-flex pb-3">
													<span class="avatar brround mr-3 align-self-center avatar-md cover-image bg-primary">
														<i class="fe fe-settings"></i>
													</span>
													<div class="mt-3">
														<a href="#" class="h6">General Settings</a>
													</div>
												</div>
												<div class="d-flex pb-3">
													<span class="avatar brround mr-3 align-self-center avatar-md cover-image bg-secondary">
														<i class="fe fe-headphones"></i>
													</span>
													<div class="mt-3">
														<a href="#" class="h6">Support Settings</a>
													</div>
												</div>
												<div class="d-flex pb-3">
													<span class="avatar brround mr-3 align-self-center avatar-md cover-image bg-warning">
														<i class="fe fe-map-pin"></i>
													</span>
													<div class="mt-3">
														<a href="#" class="h6">Map Settings</a>
													</div>
												</div>
												<div class="d-flex pb-3">
													<span class="avatar brround mr-3 align-self-center avatar-md cover-image bg-info">
														<i class="fe fe-credit-card"></i>
													</span>
													<div class="mt-3">
														<a href="#" class="h6">Payment Settings</a>
													</div>
												</div>
												<div class="d-flex pb-3">
													<span class="avatar brround mr-3 align-self-center avatar-md cover-image bg-success">
														<i class="fe fe-bell"></i>
													</span>
													<div class="mt-3">
														<a href="#" class="h6">Notification Settings</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-12">
											<h5 class="mt-3 mb-4">Widgets</h5>
											<a href="widgets.html" class="slide-item">Widget</a>
											<div class="side-menu p-0">
												<div class="slide submenu">
													<a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Mail</span><i class="angle fa fa-angle-down"></i></a>
													<ul class="slide-menu submenu-list">
														<li>
															<a href="email.html" class="slide-item">Mail-Compose</a>
														</li>
														<li>
															<a href="emailservices.html" class="slide-item">Mail-inbox</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="side-menu p-0">
												<div class="slide submenu">
													<a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Calendar</span><i class="angle fa fa-angle-down"></i></a>
													<ul class="slide-menu submenu-list">
														<li>
															<a href="calendar.html" class="slide-item">Default calendar</a>
														</li>
														<li>
															<a href="calendar2.html" class="slide-item">Full calendar</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="side-menu p-0">
												<div class="slide submenu">
													<a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Table</span><i class="angle fa fa-angle-down"></i></a>
													<ul class="slide-menu submenu-list">
														<li>
															<a href="tables.html" class="slide-item">Default table</a>
														</li>
														<li>
															<a href="datatable.html" class="slide-item">Data Table</a>
														</li>
													</ul>
												</div>
											</div>
											<a href="maps.html" class="slide-item">Maps</a>
											<h5 class="mt-5 mb-4">Tags</h5>
											<ul class="inbox-nav">
												<li> <a href="#"> <i class=" fa fa-stop text-primary"></i> Work </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-secondary"></i> Design </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-danger"></i> Projects </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-warning"></i> Presentation </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-info"></i> Office </a></li>
											</ul>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-12">
											<h5 class="mt-3 mb-4">Components</h5>
											<a href="chat.html" class="slide-item">Chat</a>
											<a href="rangeslider.html" class="slide-item">Range slider</a>
											<a href="notify.html" class="slide-item">Notifications</a>
											<a href="sweetalert.html" class="slide-item">Sweet alerts</a>
											<a href="scroll.html" class="slide-item">Content Scroll bar</a>
											<a href="counters.html" class="slide-item">Counters</a>
											<a href="loaders.html" class="slide-item">Loaders</a>
											<a href="rating.html" class="slide-item">Rating</a>
											<a href="time-line.html" class="slide-item">Time Line</a>
											<a href="modal.html" class="slide-item">Modal</a>
											<a href="tooltipandpopover.html" class="slide-item">Tooltip and popover</a>
											<a href="progress.html" class="slide-item">Progress</a>
											<a href="carousel.html" class="slide-item">Carousels</a>
											<a href="accordion.html" class="slide-item">Accordions</a>
											<a href="tabs.html" class="slide-item">Tabs</a>
											<a href="headers.html" class="slide-item">Headers</a>
											<a href="footers.html" class="slide-item">Footers</a>
											<a href="crypto-currencies.html" class="slide-item">Crypto-currencies</a>
											<a href="users-list.html" class="slide-item">User List</a>
											<a href="search.html" class="slide-item">Search page</a>
											<h5 class="mt-5 mb-4">Tags</h5>
											<ul class="inbox-nav">
												<li> <a href="#"> <i class=" fa fa-stop text-primary"></i> Work </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-secondary"></i> Design </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-danger"></i> Projects </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-warning"></i> Presentation </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-info"></i> Office </a></li>
											</ul>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-12">
											<h5 class="mt-3 mb-4">Charts</h5>
											<a href="chart-morris.html" class="slide-item">Morris Chart</a>
											<a href="chart-echart.html" class="slide-item">Echarts</a>
											<a href="charts-peity.html" class="slide-item">Peity Charts</a>
											<a href="chart-chartist.html" class="slide-item">Chartist Charts</a>
											<a href="chart-hightchart.html" class="slide-item">High Charts</a>
											<a href="chartjs.html" class="slide-item">Chart js</a>
											<a href="chart-flot.html" class="slide-item">Chart flot</a>
											<h5 class="mt-5 mb-4">Tags</h5>
											<ul class="inbox-nav">
												<li> <a href="#"> <i class=" fa fa-stop text-primary"></i> Work </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-secondary"></i> Design </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-danger"></i> Projects </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-warning"></i> Presentation </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-info"></i> Office </a></li>
											</ul>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-12">
											<h5 class="mt-3 mb-4">Elements</h5>
											<a href="alerts.html" class="slide-item"> Alerts</a>
											<a href="cards.html" class="slide-item"> Cards</a>
											<a href="buttons.html" class="slide-item">Buttons</a>
											<a href="colors.html" class="slide-item">Colors</a>
											<a href="avatars.html" class="slide-item">Avatars</a>
											<a href="dropdown.html" class="slide-item">Drop downs</a>
											<a href="thumbnails.html" class="slide-item">Thumbnails</a>
											<a href="mediaobject.html" class="slide-item">Media Object</a>
											<a href="list.html" class="slide-item">List</a>
											<a href="tags.html" class="slide-item">Tags</a>
											<a href="pagination.html" class="slide-item">Pagination</a>
											<a href="navigation.html" class="slide-item">Navigation</a>
											<a href="typography.html" class="slide-item">Typography</a>
											<a href="breadcrumbs.html" class="slide-item">Breadcrumbs</a>
											<a href="badge.html" class="slide-item">Badges</a>
											<a href="jumbotron.html" class="slide-item">Jumbotron</a>
											<a href="panels.html" class="slide-item">Panels</a>
											<h5 class="mt-5 mb-4">Tags</h5>
											<ul class="inbox-nav">
												<li> <a href="#"> <i class=" fa fa-stop text-primary"></i> Work </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-secondary"></i> Design </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-danger"></i> Projects </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-warning"></i> Presentation </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-info"></i> Office </a></li>
											</ul>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-12">
											<h5 class="mt-3 mb-4">Pages</h5>
											<a href="profile.html" class="slide-item">Profile</a>
											<a href="editprofile.html" class="slide-item">Edit Profile</a>
											<a href="empty.html" class="slide-item">Empty Page</a>
											<a href="gallery.html" class="slide-item">Gallery</a>
											<a href="about.html" class="slide-item">About Company</a>
											<a href="services.html" class="slide-item">Services</a>
											<a href="faq.html" class="slide-item">FAQS</a>
											<a href="terms.html" class="slide-item">Terms</a>
											<a href="invoice.html" class="slide-item">Invoice</a>
											<a href="pricing.html" class="slide-item">Pricing Tables</a>
											<a href="blog.html" class="slide-item">Blog</a>
											<h5 class="mt-5 mb-4">Tags</h5>
											<ul class="inbox-nav">
												<li> <a href="#"> <i class=" fa fa-stop text-primary"></i> Work </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-secondary"></i> Design </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-danger"></i> Projects </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-warning"></i> Presentation </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-info"></i> Office </a></li>
											</ul>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-12">
											<h5 class="mt-3 mb-4">Icons</h5>
											<a href="icons.html" class="slide-item">Font Awesome</a>
											<a href="icons2.html" class="slide-item">Material Design</a>
											<a href="icons3.html" class="slide-item">Simple line</a>
											<a href="icons4.html" class="slide-item">Feather Icons</a>
											<a href="icons5.html" class="slide-item">Ionic Icons</a>
											<a href="icons6.html" class="slide-item">Flag Icons</a>
											<h5 class="mt-5 mb-4">Tags</h5>
											<ul class="inbox-nav">
												<li> <a href="#"> <i class=" fa fa-stop text-primary"></i> Work </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-secondary"></i> Design </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-danger"></i> Projects </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-warning"></i> Presentation </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-info"></i> Office </a></li>
											</ul>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-12">
											<h5 class="mt-3 mb-4">Forms</h5>
											<a href="form-elements.html" class="slide-item">Form Elements</a>
											<a href="form-wizard.html" class="slide-item">Form Wizard</a>
											<a href="form-edior.html" class="slide-item">Form Editor</a>
											<h5 class="mt-5 mb-4">Tags</h5>
											<ul class="inbox-nav">
												<li> <a href="#"> <i class=" fa fa-stop text-primary"></i> Work </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-secondary"></i> Design </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-danger"></i> Projects </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-warning"></i> Presentation </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-info"></i> Office </a></li>
											</ul>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-12">
											<h5 class="mt-3 mb-4">E-commerce</h5>
											<a href="shop.html" class="slide-item">Products</a>
											<a href="shop-des.html" class="slide-item">Product Details</a>
											<a href="cart.html" class="slide-item">Cart</a>
											<h5 class="mt-5 mb-4">Tags</h5>
											<ul class="inbox-nav">
												<li> <a href="#"> <i class=" fa fa-stop text-primary"></i> Work </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-secondary"></i> Design </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-danger"></i> Projects </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-warning"></i> Presentation </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-info"></i> Office </a></li>
											</ul>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-12">
											<h5 class="mt-3 mb-4">Custom Pages</h5>
											<a href="register.html" class="slide-item">Register</a>
											<a href="login.html" class="slide-item">Login</a>
											<a href="forgot-password.html" class="slide-item">Forgot Password</a>
											<a href="lockscreen.html" class="slide-item">Lock screen</a>
											<a href="construction.html" class="slide-item">Under Construction</a>
											<a href="400.html" class="slide-item">400</a>
											<a href="401.html" class="slide-item">401</a>
											<a href="500.html" class="slide-item">500</a>
											<a href="503.html" class="slide-item">503</a>
											<h5 class="mt-5 mb-4">Tags</h5>
											<ul class="inbox-nav">
												<li> <a href="#"> <i class=" fa fa-stop text-primary"></i> Work </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-secondary"></i> Design </a> </li>
												<li> <a href="#"> <i class=" fa fa-stop text-danger"></i> Projects </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-warning"></i> Presentation </a></li>
												<li> <a href="#"> <i class=" fa fa-stop text-info"></i> Office </a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</aside>
				<!--sidemenu end-->

				<div class=" app-content">
					<div class="side-app">

						<!--Page Header-->
						<div class="page-header">
							<h4 class="page-title"><i class="fe fe-home mr-1"></i> Dashboard 02</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard 02</li>
							</ol>
						</div>
						<!--page header-->

						<div class="row">
							<div class="col-md-12">
								<div class="card welcome-image">
									<div class="card-body text-center overflow-hidden">
										<span class="avatar avatar-xl brround text-center cover-image mb-3" data-image-src="<?php echo base_url();?>assets/images/users/5.jpg"></span>
										<h3 class="text-white mb-1">Congratulations! Vanessa Dyer</h3>
										<p class="text-white mt-2 mb-4">You Have Done More Profit Today ....Check Your Profit Details</p>
										<a Href="#" class="btn btn-pink">View Profile</a>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xl-4 col-lg-4 col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row mb-3">
											<div class="col">
												<h6 class="text-muted mb-0 mt-1">Total Orders</h6>
											</div>
											<div class="col col-auto">
												<a class="btn btn-sm btn-white border">View Details</a>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div class="dash-2">
													<h2 class="mb-2"><span class="counter font-weight-extrabold num-font">89,385</span></h2>
													<span class="text-muted"><span class="font-weight-bold "><i class="fas fa-arrow-circle-up text-success"></i> 10%</span>  Orders Incresed </span>
												</div>
											</div>
											<div class="col col-auto">
												<span class="sparkline_bar1"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row mb-3">
											<div class="col">
												<h6 class="text-muted mb-0 mt-1">Total Income</h6>
											</div>
											<div class="col col-auto">
												<a class="btn btn-sm btn-white border">View Details</a>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div class="dash-2">
													<h2 class="mb-2">$<span class="counter font-weight-extrabold num-font">92,254</span></h2>
													<span class="text-muted"><span class="font-weight-bold"><i class="fas fa-arrow-circle-down text-danger"></i> 15%</span>  Income Incresed</span>
												</div>
											</div>
											<div class="col col-auto">
												<span class="sparkline_bar2"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row mb-3">
											<div class="col">
												<h6 class="text-muted mb-0 mt-1">Total Expenses</h6>
											</div>
											<div class="col col-auto">
												<a class="btn btn-sm btn-white border">View Details</a>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div class="dash-2">
													<h2 class="mb-2">$<span class="counter font-weight-extrabold num-font">83,547</span></h2>
													<span class="text-muted"><span class="font-weight-bold"><i class="fas fa-arrow-circle-up text-success"></i> 5%</span>  Expences Decresed</span>
												</div>
											</div>
											<div class="col col-auto">
												<span class="sparkline_bar3"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="card overflow-hidden">
									<div class="card-header">
										<h3 class="card-title">Website Activities</h3>
										<div class="card-options d-none d-sm-block">
											<div class="btn-group btn-sm">
												<button type="button" class="btn btn-light btn-sm">
													<span class="">Day</span>
												</button>
												<button type="button" class="btn btn-light btn-sm">
													<span class="">Month</span>
												</button>
												<button type="button" class="btn btn-light btn-sm">
													<span class="">Year</span>
												</button>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-12">
												<div class="card-body overflow-hidden">
													<canvas id="lineChart" class="chart-dropshadow h-350 overflow-hidden"></canvas>
												</div>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="row website-section">
											<div class="col-xl-3 text-center mb-5 mb-lg-0">
												<p class="mb-1 text-muted">Daily Visitors</p>
												<h2 class=" mb-3 font-weight-extrabold num-font">6,254</h2>
												<div class="progress progress-md h-1">
													<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-70"></div>
												</div>
											</div>
											<div class="col-xl-3 text-center mb-5 mb-lg-0">
												<p class="mb-1 text-muted">Returning Visitors</p>
												<h2 class=" mb-3 font-weight-extrabold num-font">1254</h2>
												<div class="progress progress-md h-1">
													<div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary w-70"></div>
												</div>
											</div>
											<div class="col-xl-3 text-center mb-5 mb-lg-0">
												<p class="mb-1 text-muted">Page Views</p>
												<h2 class="mb-3 font-weight-extrabold num-font">24,325</h2>
												<div class="progress progress-md h-1">
													<div class="progress-bar progress-bar-striped progress-bar-animated bg-pink w-70"></div>
												</div>
											</div>
											<div class="col-xl-3 text-center ">
												<p class="mb-1 text-muted">Today Subscribers</p>
												<h2 class="mb-3 font-weight-extrabold num-font">357</h2>
												<div class="progress progress-md h-1">
													<div class="progress-bar progress-bar-striped progress-bar-animated bg-warning w-70"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xl-4 col-lg-4 col-md-12">
								<div class="card overflow-hidden">
									<div class="card-header">
										<h3 class="card-title">Web Traffic</h3>
										<div class="card-options">
											<span class="dropdown-toggle fs-16" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="fe fe-more-vertical " ></i></span>
											<ul class="dropdown-menu dropdown-menu-right" role="menu">
												<li><a href="#"><i class="si si-plus mr-2"></i>Add</a></li>
												<li><a href="#"><i class="si si-trash mr-2"></i>Remove</a></li>
												<li><a href="#"><i class="si si-eye mr-2"></i>View</a></li>
												<li><a href="#"><i class="si si-settings mr-2"></i>More</a></li>
											</ul>
										</div>
									</div>
									<div class="card-body">
										<canvas id="pieChart" class="donutShadow overflow-hidden"></canvas>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-12">
								<div class="card overflow-hidden">
									<div class="card-header">
										<h3 class="card-title">Yearly Earnings</h3>
										<div class="card-options">
											<span class="dropdown-toggle fs-16" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="fe fe-more-vertical " ></i></span>
											<ul class="dropdown-menu dropdown-menu-right" role="menu">
												<li><a href="#"><i class="si si-plus mr-2"></i>Add</a></li>
												<li><a href="#"><i class="si si-trash mr-2"></i>Remove</a></li>
												<li><a href="#"><i class="si si-eye mr-2"></i>View</a></li>
												<li><a href="#"><i class="si si-settings mr-2"></i>More</a></li>
											</ul>
										</div>
									</div>
									<div class="card-body">
										<div id="graph5" class="chart-dropshadow chartwidget"></div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Product Sales</h3>
										<div class="card-options">
											<a class="btn btn-white border btn-sm btn-icon mr-2" href="#"><i class="fas fa-chevron-left"></i></a>
											<a class="btn btn-white border btn-sm btn-icon" href="#"><i class="fas fa-chevron-right"></i></a>
										</div>
									</div>
									<div class="card-body">
										<h2 class="mb-1 num-font">$1,87,595</h2>
										<span class="text-muted">15% Higher Of Previous Month</span>
										<div class="row mt-5">
											<div class="col-sm-12">
												<div class="mb-0">
													<h4 class="mb-2 d-block">
														<span class="fs-16">Total Expences</span>
														<span class="float-right num-font">$1587</span>
													</h4>
													<div class="progress progress-md h-1 mb-1">
														<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-30"></div>
													</div>
													<span>12% of your Goals</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-body">
										<div class="row mb-3">
											<div class="col">
												<h6 class="text-muted mb-0 mt-1">Total Net Profit</h6>
											</div>
											<div class="col col-auto">
												<a class="btn btn-sm btn-white border">View Details</a>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div class="dash-2">
													<h2 class="mb-2">$<span class="counter font-weight-extrabold num-font">99,425</span></h2>
													<span class="text-muted"><span class="font-weight-bold"><i class="fas fa-arrow-circle-down text-danger"></i> 13%</span>  Net Profit Incresed </span>
												</div>
											</div>
											<div class="col col-auto">
												<span class="sparkline_bar4"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Invoice List</h3>
										<div class="card-options d-none d-sm-block">
											<div class="btn-group btn-sm">
												<button type="button" class="btn btn-light btn-sm">
													<span class="">Day</span>
												</button>
												<button type="button" class="btn btn-light btn-sm">
													<span class="">Month</span>
												</button>
												<button type="button" class="btn btn-light btn-sm">
													<span class="">Year</span>
												</button>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive border-top mb-0">
											<table class="table table-bordered table-hover mb-0 text-nowrap">
												<thead>
													<tr>
														<th>Invoice ID</th>
														<th>Category</th>
														<th>Purchase Date</th>
														<th>Price</th>
														<th>Due Date</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>#INV-<span class="num-font">348</span></td>
														<td>Resturant</td>
														<td class="num-font">07-12-2019</td>
														<td class="font-weight-semibold fs-16 num-font">$89</td>
														<td class="num-font">17-12-2019</td>
														<td>
															<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fas fa-eye"></i></a>
															<a class="btn btn-secondary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="far fa-trash-alt"></i></a><br>
														</td>
													</tr>
													<tr>
														<td>#INV-<span class="num-font">186</span></td>
														<td>Rela Estate</td>
														<td class="num-font">02-12-2019</td>
														<td class="font-weight-semibold fs-16 num-font">$14,276</td>
														<td class="num-font">14-12-2019</td>
														<td>
															<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fas fa-eye"></i></a>
															<a class="btn btn-secondary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="far fa-trash-alt"></i></a><br>
														</td>
													</tr>
													<tr>
														<td>#INV-<span class="num-font">831</span></td>
														<td>Jobs</td>
														<td class="num-font">30-11-2019</td>
														<td class="font-weight-semibold fs-16 num-font">$25,000</td>
														<td class="num-font">04-12-2019</td>
														<td>
															<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fas fa-eye"></i></a>
															<a class="btn btn-secondary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="far fa-trash-alt"></i></a><br>
														</td>
													</tr>
													<tr>
														<td>#INV-<span class="num-font">672</span></td>
														<td>Education</td>
														<td class="num-font">25-18-2019</td>
														<td class="font-weight-semibold fs-16 num-font">$50.00</td>
														<td class="num-font">07-12-2019</td>
														<td>
															<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fas fa-eye"></i></a>
															<a class="btn btn-secondary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="far fa-trash-alt"></i></a><br>
														</td>
													</tr>
													<tr>
														<td>#INV-<span class="num-font">428</span></td>
														<td>Electornics</td>
														<td class="num-font">24-11-2019</td>
														<td class="font-weight-semibold fs-16 num-font">$99.99</td>
														<td class="num-font">11-12-2019</td>
														<td>
															<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fas fa-eye"></i></a>
															<a class="btn btn-secondary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="far fa-trash-alt"></i></a><br>
														</td>
													</tr>
													<tr>
														<td>#INV-<span class="num-font">543</span></td>
														<td>Vechicle</td>
														<td class="num-font">22-11-2019</td>
														<td class="font-weight-semibold fs-16 num-font">$145</td>
														<td class="num-font">12-12-2019</td>
														<td>
															<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fas fa-eye"></i></a>
															<a class="btn btn-secondary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="far fa-trash-alt"></i></a><br>
														</td>
													</tr>
													<tr>
														<td>#INV-<span class="num-font">986</span></td>
														<td>Pet &amp; Animals</td>
														<td class="num-font">18-11-2019</td>
														<td class="font-weight-semibold fs-16 num-font">$378</td>
														<td class="num-font">07-12-2019</td>
														<td>
															<a class="btn btn-primary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="View"><i class="fas fa-eye"></i></a>
															<a class="btn btn-secondary btn-sm text-white mb-1" data-toggle="tooltip" data-original-title="Delete"><i class="far fa-trash-alt"></i></a><br>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!--Sidebar-right-->
					<div class="sidebar sidebar-right sidebar-animate">
						<div class="p-2 mb-4">
							<a href="#" class="text-right float-right" data-toggle="sidebar-right" data-target=".sidebar-right"><i class="fe fe-x"></i></a>
						</div>
						<div class="panel panel-primary">
							<div class="tab-menu-heading border-0">
								<div class="tabs-menu ">
									<!-- Tabs -->
									<ul class="nav panel-tabs">
										<li class=""><a href="#side1" class="active" data-toggle="tab"><i class="fas fa-bell"></i> Notifications</a></li>
										<li><a href="#side2" data-toggle="tab"><i class="fas fa-comments"></i> Chat</a></li>
										<li><a href="#side3" data-toggle="tab"><i class="fas fa-user-friends"></i> Friends</a></li>
									</ul>
								</div>
							</div>
							<div class="panel-body tabs-menu-body p-0 border-0">
								<div class="tab-content">
									<div class="tab-pane active " id="side1">
										<div class="list-group list-group-flush ">
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-3">
													<span class="avatar avatar-lg brround cover-image" data-image-src="<?php echo base_url();?>assets/images/users/5.jpg"><span class="avatar-status bg-green"></span></span>
												</div>
												<div>
													<strong>Madeleine</strong> Hey! there I' am available....
													<div class="small text-muted">
														3 hours ago
													</div>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-3">
													<span class="avatar avatar-lg brround cover-image" data-image-src="<?php echo base_url();?>assets/images/users/4.jpg"></span>
												</div>
												<div>
													<strong>Anthony</strong> New product Launching...
													<div class="small text-muted">
														5 hour ago
													</div>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-3">
													<span class="avatar avatar-lg brround cover-image" data-image-src="<?php echo base_url();?>assets/images/users/3.jpg"><span class="avatar-status bg-green"></span></span>
												</div>
												<div>
													<strong>Olivia</strong> New Schedule Realease......
													<div class="small text-muted">
														45 mintues ago
													</div>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-3">
													<span class="avatar avatar-lg brround cover-image" data-image-src="<?php echo base_url();?>assets/images/users/2.jpg"><span class="avatar-status bg-green"></span></span>
												</div>
												<div>
													<strong>Madeleine</strong> Hey! there I' am available....
													<div class="small text-muted">
														3 hours ago
													</div>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-3">
													<span class="avatar avatar-lg brround cover-image" data-image-src="<?php echo base_url();?>assets/images/users/1.jpg"></span>
												</div>
												<div>
													<strong>Anthony</strong> New product Launching...
													<div class="small text-muted">
														5 hour ago
													</div>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-3">
													<span class="avatar avatar-lg brround cover-image" data-image-src="<?php echo base_url();?>assets/images/users/9.jpg"><span class="avatar-status bg-green"></span></span>
												</div>
												<div>
													<strong>Olivia</strong> New Schedule Realease......
													<div class="small text-muted">
														45 mintues ago
													</div>
												</div>
											</div>
											<div class="pt-4 text-center">
												<a href="#" class="btn btn-primary">View more</a>
											</div>
										</div>
									</div>
									<div class="tab-pane  " id="side2">
										<div class="list d-flex align-items-center border-bottom p-4">
											<div class="">
												<span class="avatar bg-primary brround avatar-md">CH</span>
											</div>
											<div class="wrapper w-100 ml-3">
												<p class="mb-0 d-flex">
													<b>New Websites is Created</b>
												</p>
												<div class="d-flex justify-content-between align-items-center">
													<div class="d-flex align-items-center">
														<i class="mdi mdi-clock text-muted mr-1"></i>
														<small class="text-muted ml-auto">30 mins ago</small>
														<p class="mb-0"></p>
													</div>
												</div>
											</div>
										</div>
										<div class="list d-flex align-items-center border-bottom p-4">
											<div class="">
												<span class="avatar bg-danger brround avatar-md">N</span>
											</div>
											<div class="wrapper w-100 ml-3">
												<p class="mb-0 d-flex">
													<b>Prepare For the Next Project</b>
												</p>
												<div class="d-flex justify-content-between align-items-center">
													<div class="d-flex align-items-center">
														<i class="mdi mdi-clock text-muted mr-1"></i>
														<small class="text-muted ml-auto">2 hours ago</small>
														<p class="mb-0"></p>
													</div>
												</div>
											</div>
										</div>
										<div class="list d-flex align-items-center border-bottom p-4">
											<div class="">
												<span class="avatar bg-info brround avatar-md">S</span>
											</div>
											<div class="wrapper w-100 ml-3">
												<p class="mb-0 d-flex">
													<b>Decide the live Discussion</b>
												</p>
												<div class="d-flex justify-content-between align-items-center">
													<div class="d-flex align-items-center">
														<i class="mdi mdi-clock text-muted mr-1"></i>
														<small class="text-muted ml-auto">3 hours ago</small>
														<p class="mb-0"></p>
													</div>
												</div>
											</div>
										</div>
										<div class="list d-flex align-items-center border-bottom p-4">
											<div class="">
												<span class="avatar bg-warning brround avatar-md">K</span>
											</div>
											<div class="wrapper w-100 ml-3">
												<p class="mb-0 d-flex">
													<b>Meeting at 3:00 pm</b>
												</p>
												<div class="d-flex justify-content-between align-items-center">
													<div class="d-flex align-items-center">
														<i class="mdi mdi-clock text-muted mr-1"></i>
														<small class="text-muted ml-auto">4 hours ago</small>
														<p class="mb-0"></p>
													</div>
												</div>
											</div>
										</div>
										<div class="list d-flex align-items-center border-bottom p-4">
											<div class="">
												<span class="avatar bg-success brround avatar-md">R</span>
											</div>
											<div class="wrapper w-100 ml-3">
												<p class="mb-0 d-flex">
													<b>Prepare for Presentation</b>
												</p>
												<div class="d-flex justify-content-between align-items-center">
													<div class="d-flex align-items-center">
														<i class="mdi mdi-clock text-muted mr-1"></i>
														<small class="text-muted ml-auto">1 days ago</small>
														<p class="mb-0"></p>
													</div>
												</div>
											</div>
										</div>
										<div class="list d-flex align-items-center border-bottom p-4">
											<div class="">
												<span class="avatar bg-pink brround avatar-md">MS</span>
											</div>
											<div class="wrapper w-100 ml-3">
												<p class="mb-0 d-flex">
													<b>Prepare for Presentation</b>
												</p>
												<div class="d-flex justify-content-between align-items-center">
													<div class="d-flex align-items-center">
														<i class="mdi mdi-clock text-muted mr-1"></i>
														<small class="text-muted ml-auto">1 days ago</small>
														<p class="mb-0"></p>
													</div>
												</div>
											</div>
										</div>
										<div class="list d-flex align-items-center border-bottom p-4">
											<div class="">
												<span class="avatar bg-purple brround avatar-md">L</span>
											</div>
											<div class="wrapper w-100 ml-3">
												<p class="mb-0 d-flex">
													<b>Prepare for Presentation</b>
												</p>
												<div class="d-flex justify-content-between align-items-center">
													<div class="d-flex align-items-center">
														<i class="mdi mdi-clock text-muted mr-1"></i>
														<small class="text-muted ml-auto">45 mintues ago</small>
														<p class="mb-0"></p>
													</div>
												</div>
											</div>
										</div>
										<div class="list d-flex align-items-center p-4">
											<div class="">
												<span class="avatar bg-blue brround avatar-md">U</span>
											</div>
											<div class="wrapper w-100 ml-3">
												<p class="mb-0 d-flex">
													<b>Prepare for Presentation</b>
												</p>
												<div class="d-flex justify-content-between align-items-center">
													<div class="d-flex align-items-center">
														<i class="mdi mdi-clock text-muted mr-1"></i>
														<small class="text-muted ml-auto">2 days ago</small>
														<p class="mb-0"></p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane  " id="side3">
										<div class="list-group list-group-flush ">
											<form class="form-inline p-4">
												<div class="search-element">
													<input class="form-control header-search" type="search" placeholder="Search..." aria-label="Search">
												</div>
											</form>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo base_url();?>assets/images/users/2.jpg"><span class="avatar-status bg-green"></span></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Mozelle Belt</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo base_url();?>assets/images/users/1.jpg"></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Florinda Carasco</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo base_url();?>assets/images/users/9.jpg"><span class="avatar-status bg-green"></span></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Alina Bernier</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo base_url();?>assets/images/users/3.jpg"><span class="avatar-status bg-green"></span></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Zula Mclaughin</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo base_url();?>assets/images/users/4.jpg"></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Isidro Heide</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo base_url();?>assets/images/users/5.jpg"><span class="avatar-status bg-green"></span></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Mozelle Belt</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo base_url();?>assets/images/users/6.jpg"></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Florinda Carasco</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo base_url();?>assets/images/users/8.jpg"></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Alina Bernier</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
											<div class="list-group-item d-flex  align-items-center">
												<div class="mr-2">
													<span class="avatar avatar-md brround cover-image" data-image-src="<?php echo base_url();?>assets/images/users/7.jpg"></span>
												</div>
												<div class="">
													<div class="font-weight-semibold">Isidro Heide</div>
												</div>
												<div class="ml-auto">
													<a href="#" class="btn btn-sm btn-light"><i class="fab fa-facebook-messenger"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/Sidebar-right-->

					<!--footer-->
					<footer class="footer">
						<div class="container">
							<div class="row align-items-center flex-row-reverse">
								<div class="col-md-12 col-sm-12 text-center">
									Copyright © 2019 <a href="#">Spaner</a>. Designed by <a href="https://spruko.com/">Spruko Technologies Pvt.Ltd</a> All rights reserved.
								</div>
							</div>
						</div>
					</footer>
					<!-- End Footer-->

				</div>
			</div>
		</div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fas fa-angle-up "></i></a>

		<!--Jquery js -->
		<script src="<?php echo base_url();?>assets/js/vendors/jquery-3.2.1.min.js"></script>

		<!--Jquery.Sparkline js -->
		<script src="<?php echo base_url();?>assets/js/vendors/jquery.sparkline.min.js"></script>

		<!--Circle-Progress js -->
		<script src="<?php echo base_url();?>assets/js/vendors/circle-progress.min.js"></script>

		<!--Jquery.rating js -->
		<script src="<?php echo base_url();?>assets/plugins/jquery.rating/jquery.rating-stars.js"></script>

		<!--Bootstrap.min js-->
		<script src="<?php echo base_url();?>assets/plugins/bootstrap/popper.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Sidemenu js-->
		<script src="<?php echo base_url();?>assets/plugins/side-menu/side-menu.js"></script>

		<!-- Sidemenu-responsive-tabs js-->
		<script src="<?php echo base_url();?>assets/plugins/sidemenu-responsive-tabs/js/sidemenu-responsive-tabs.js"></script>
		<script src="<?php echo base_url();?>assets/js/left-menu.js"></script>

		<!-- P-scroll js -->
		<script src="<?php echo base_url();?>assets/plugins/p-scroll/p-scroll.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/p-scroll/p-scroll-leftmenu.js"></script>

		<!-- Custom scroll bar js-->
		<script src="<?php echo base_url();?>assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- Input Mask js -->
		<script src="<?php echo base_url();?>assets/plugins/jquery.mask/jquery.mask.min.js"></script>

		<!--Morris Charts js-->
		<script src="<?php echo base_url();?>assets/plugins/morris/morris.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/morris/raphael.min.js"></script>

		<!-- Peitychart js-->
		<script src="<?php echo base_url();?>assets/plugins/peitychart/jquery.peity.min.js"></script>

		<!--  Chart js -->
		<script src="<?php echo base_url();?>assets/plugins/chart/chart.bundle.js"></script>

		<!--Counters js-->
		<script src="<?php echo base_url();?>assets/plugins/counters/counterup.min.js"></script>
		<script src="<?php echo base_url();?>assets/plugins/counters/waypoints.min.js"></script>

		<!-- Sidebar js -->
		<script src="<?php echo base_url();?>assets/plugins/sidebar/sidebar.js"></script>

		<!-- index2 js -->
		<script src="<?php echo base_url();?>assets/js/index2.js"></script>

		<!-- Custom js -->
		<script src="<?php echo base_url();?>assets/js/custom.js"></script>
	</body>
</html>