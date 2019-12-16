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
								<div class="card-header bg-red">
									<h3 class="card-title text-white">Summary Traffic Channel</h3>
								</div>
								<div class="card-pie">
									<div class="canvas-con">
										<div class="canvas-con-inner" id="canvas-pie">
											<canvas id="pieSummary" height="250px"
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
									<div class="row mt-5">
										<div class="col-md-6 text-center">
											<div class="card-custom">
												<div class="card-header bg-red">
													<h6 class="text-white card-body">Total Interaction</h6>
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
													<h6 class="text-white card-body">Unique Customer</h6>
												</div>
												<div class="card-body">

													<h2 class="mb-4 mt-3 num-font" id="unique-customer"></h2>
													<span class="text-muted mb-5">Customer</span>
												</div>
											</div>
										</div>
									</div>
									<div class="row mt-5 mb-6">
										<div class="col-md-6 text-center">
											<div class="card-custom">
												<div class="card-header bg-red">
													<h6 class="card-body text-white">Case In</h6>
												</div>
												<div class="card-body">
													<h2 class="mb-4 mt-3 num-font" id="">4xxx</h2>
													<span class="text-muted mb-5">Interaction</span>
												</div>
											</div>
										</div>
										<div class="col-md-6 text-center">
											<div class="card-custom">
												<div class="card-header bg-red">
													<h6 class="card-body text-white">Case Out</h6>
												</div>
												<div class="card-body">
													<h2 class="mb-4 mt-3 num-font" id="">4xx</h2>
													<span class="text-muted mb-5">Interaction</span>
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
								<div class="card-body" style="padding:20px;" id="card-baru">
									<div class="row" id="row-baru">
										
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