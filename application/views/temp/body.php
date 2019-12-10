	<body class="app  sidebar-mini">

		<!-- Global Loader-->
		<div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
		<div class="page">
			<div class="page-main">
				<div class=" app-content mt-7">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"></a></li>
								<li class="breadcrumb-item active" aria-current="page">Summary Traffic Channel</li>
							</ol>
							<div class="card-options d-none d-sm-block">
								<div class="btn-group btn-sm">
									<a href="#" class="btn btn-light btn-sm" id="btn-day">
										<span class="">Day</a></span>
									<a href="#" class="btn btn-light btn-sm" id="btn-month">
										<span class="">Month</a></span>
									<a href="#" class="btn btn-light btn-sm" id="btn-year">
										<span class="">Year</a></span>
								</div>
							</div>
						</div>
						<!--Page Header-->
					</div>
					<!----Baris Pertama----!-->
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-12">
							<div class="card overflow-hidden">
								<div class="card-header">
									<h3 class="card-title">Summary Traffic Channel</h3>
								</div>
								<div class="card-body">
									<div class="canvas-con">
										<div class="canvas-con-inner" id="canvas-pie">
											<canvas id="pieChart" height="250px"
												class="donutShadow overflow-hidden"></canvas>
										</div>
										<div id="legend" class="legend-con"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-12">
							<div class="card overflow-hidden">
								<div class="card-body">
									<div class="row mt-6">
										<div class="col-md-6 text-center">
											<div class="card-custom">
												<div class="card-header bg-red">
													<h5 class="text-white card-body">Total Interaction</h5>
												</div>
												<div class="card-body">
													<h2 class="mb-4 mt-3 num-font" id="total-interaction"></h2>
													<span class="text-muted mb-5">Interaction</span>
												</div>
											</div>
										</div>
										<div class="col-md-6 text-center">
											<div class="card-custom">
												<div class="card-header bg-red">
													<h5 class="text-white card-body">Unique Customer</h5>
												</div>
												<div class="card-body">
													<h2 class="mb-4 mt-3 num-font" id="unique-customer"></h2>
													<span class="text-muted mb-5">Interaction</span>
												</div>
											</div>
										</div>
									</div>
									<div class="row mt-7 mb-6">
										<div class="col-md-6 text-center">
											<div class="card-custom">
												<div class="card-header bg-red">
													<h5 class="card-body text-white">Case In</h5>
												</div>
												<div class="card-body">
													<h2 class="mb-4 mt-3 num-font" id="avg-customer"></h2>
													<span class="text-muted mb-5">Interaction</span>
												</div>
											</div>
										</div>
										<div class="col-md-6 text-center">
											<div class="card-custom">
												<div class="card-header bg-red">
													<h5 class="card-body text-white">Case Out</h5>
												</div>
												<div class="card-body">
													<h2 class="mb-4 mt-3 num-font" id="total-session">4000</h2>
													<span class="text-muted mb-5">Session</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<!---! Kolom Channel--->
						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="card overflow-hidden">
								<div class="card-body">
									<div class="row">
										<div class="col-xl-4 col-lg-6 col-md-12">
											<div class="mini-stat clearfix bg-blue rounded">
												<span class="mini-stat-icon"><i class="fab fa-facebook text-blue"></i>

													<h6 class="text-white">Facebook</h6>
												</span>
												<div class="mini-stat-info text-white text-right">
													<h6 class="text-white">Unique Customer : 9000</h6>
													<h6 class="text-white">Total Interaction : 8000</h6>
													<h6 class="text-white">Case In : 7000</h6>
													<h6 class="text-white">Case Out : 7000</h6>
												</div>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6 col-md-12">
											<div class="mini-stat clearfix bg-info rounded">
												<span class="mini-stat-icon"><i class="fab fa-twitter text-info"></i>
													<h6 class="text-white">Twitter</h6>
												</span>
												<div class="mini-stat-info text-white text-right">
													<h6 class="text-white">Unique Customer : 9000</h6>
													<h6 class="text-white">Total Interaction : 8000</h6>
													<h6 class="text-white">Case In : 7000</h6>
													<h6 class="text-white">Case Out : 7000</h6>
												</div>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6 col-md-12">
											<div class="mini-stat clearfix bg-pink rounded">
												<span class="mini-stat-icon"><i class="fab fa-instagram text-pink"></i>
													<h6 class="text-white">Instagram</h6>
												</span>
												<div class="mini-stat-info text-white text-right">
													<h6 class="text-white">Unique Customer : 9000</h6>
													<h6 class="text-white">Total Interaction : 8000</h6>
													<h6 class="text-white">Case In : 7000</h6>
													<h6 class="text-white">Case Out : 7000</h6>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xl-4 col-lg-6 col-md-12">
											<div class="mini-stat clearfix bg-danger rounded">
												<span class="mini-stat-icon"><i class="fa fa-envelope text-danger"></i>

													<h6 class="text-white">Email</h6>
												</span>
												<div class="mini-stat-info text-white text-right">
													<h6 class="text-white">Unique Customer : 9000</h6>
													<h6 class="text-white">Total Interaction : 8000</h6>
													<h6 class="text-white">Case In : 7000</h6>
													<h6 class="text-white">Case Out : 7000</h6>
												</div>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6 col-md-12">
											<div class="mini-stat clearfix bg-primary rounded">
												<span class="mini-stat-icon"><i class="fab fa-whatsapp text-primary"></i>
													<h6 class="text-white">Whatsapp</h6>
												</span>
												<div class="mini-stat-info text-white text-right">
													<h6 class="text-white">Unique Customer : 9000</h6>
													<h6 class="text-white">Total Interaction : 8000</h6>
													<h6 class="text-white">Case In : 7000</h6>
													<h6 class="text-white">Case Out : 7000</h6>
												</div>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6 col-md-12">
											<div class="mini-stat clearfix bg-dark rounded">
												<span class="mini-stat-icon"><i class="fab fa-telegram text-dark"></i>
													<h6 class="text-white">Telegram</h6>
												</span>
												<div class="mini-stat-info text-white text-right">
													<h6 class="text-white">Unique Customer : 9000</h6>
													<h6 class="text-white">Total Interaction : 8000</h6>
													<h6 class="text-white">Case In : 7000</h6>
													<h6 class="text-white">Case Out : 7000</h6>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xl-4 col-lg-6 col-md-12">
											<div class="mini-stat clearfix bg-warning rounded">
												<span class="mini-stat-icon"><i class="fa fa-microphone text-warning"></i>

													<h6 class="text-white">Voice</h6>
												</span>
												<div class="mini-stat-info text-white text-right">
													<h6 class="text-white">Unique Customer : 9000</h6>
													<h6 class="text-white">Total Interaction : 8000</h6>
													<h6 class="text-white">Case In : 7000</h6>
													<h6 class="text-white">Case Out : 7000</h6>
												</div>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6 col-md-12">
											<div class="mini-stat clearfix bg-blue-dark rounded">
												<span class="mini-stat-icon"><i class="fab fa-facebook-messenger text-blue"></i>
													<h6 class="text-white">Messenger</h6>
												</span>
												<div class="mini-stat-info text-white text-right">
													<h6 class="text-white">Unique Customer : 9000</h6>
													<h6 class="text-white">Total Interaction : 8000</h6>
													<h6 class="text-white">Case In : 7000</h6>
													<h6 class="text-white">Case Out : 7000</h6>
												</div>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6 col-md-12">
											<div class="mini-stat clearfix bg-indigo rounded">
												<span class="mini-stat-icon"><i class="fa fa-mail-bulk text-indigo"></i>
													<h6 class="text-white">Twitter DM</h6>
												</span>
												<div class="mini-stat-info text-white text-right">
													<h6 class="text-white">Unique Customer : 9000</h6>
													<h6 class="text-white">Total Interaction : 8000</h6>
													<h6 class="text-white">Case In : 7000</h6>
													<h6 class="text-white">Case Out : 7000</h6>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xl-4 col-lg-6 col-md-12">
											<div class="mini-stat clearfix bg-success rounded">
												<span class="mini-stat-icon"><i class="fab fa-line text-success"></i>

													<h6 class="text-white">Line</h6>
												</span>
												<div class="mini-stat-info text-white text-right">
													<h6 class="text-white">Unique Customer : 9000</h6>
													<h6 class="text-white">Total Interaction : 8000</h6>
													<h6 class="text-white">Case In : 7000</h6>
													<h6 class="text-white">Case Out : 7000</h6>
												</div>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6 col-md-12">
											<div class="mini-stat clearfix bg-gray1 rounded">
												<span class="mini-stat-icon"><i class="fa fa-comments text-gray1"></i>
													<h6 class="text-white">Live Chat</h6>
												</span>
												<div class="mini-stat-info text-white text-right">
													<h6 class="text-white">Unique Customer : 9000</h6>
													<h6 class="text-white">Total Interaction : 8000</h6>
													<h6 class="text-white">Case In : 7000</h6>
													<h6 class="text-white">Case Out : 7000</h6>
												</div>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6 col-md-12">
											<div class="mini-stat clearfix bg-blue-teal rounded">
												<span class="mini-stat-icon"><i class="fa fa-envelope-open text-blue-teal"></i>
													<h6 class="text-white">SMS</h6>
												</span>
												<div class="mini-stat-info text-white text-right">
													<h6 class="text-white">Unique Customer : 9000</h6>
													<h6 class="text-white">Total Interaction : 8000</h6>
													<h6 class="text-white">Case In : 7000</h6>
													<h6 class="text-white">Case Out : 7000</h6>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!---Baris Kedua!-->
					<!--
					<div class="row">
						<div class="col-md-12">
							<div class="card box-widget widget-user">
								<div class="card-header bg-red">
									<h3 class="card-title text-white">Unique Customer per Channel</h3>
								</div>
								<div class="box-footer">
									<div class="row">
										<div class="col-md-12" id="card-unique-customer-per-channel">
											<div class="row" id="retres-unique">

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>-->
					<?php $this->load->view('temp/footer');?>
					<!-- <script src="<?= base_url()?>assets/public/js/app/api.js"></script> -->
					<script src="<?= base_url()?>assets/public/js/app/app-summary-traffic.js"></script>