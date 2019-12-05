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
						<div class="col-xl-5 col-lg-5 col-md-12">
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
						<!---! Kolom Channel--->
						<div class="col-xl-7 col-lg-7 col-md-12">
							<div class="card overflow-hidden">
								<div class="card-header">
									<h3 class="card-title">Interaction</h3>
								</div>
								<div class="card-body" id="card-interaction-channel">
									<div id="retres" class="row"></div>
								</div>
							</div>
						</div>
					</div>

					<!---Baris Kedua!-->
					<div class="row">
						<div class="col-md-12 col-xl-4 col-lg-6 text-center">
							<div class="card">
								<div class="card-header bg-red">
									<h3 class="card-title text-white">Total Interaction</h3>
								</div>
								<div class="card-body">
									<h2 class="mb-1 num-font" id="total-interaction"></h2>
									<span class="text-muted">15% Higher Of Previous Month</span>
									<div class="row mt-5">
										<div class="col-sm-12">
											<div class="mb-0">
												<h4 class="mb-2 d-block">
													<span class="fs-16">Total Expences</span>
													<span class="float-right num-font">$1587</span>
												</h4>
												<div class="progress progress-md h-1 mb-1">
													<div
														class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-30">
													</div>
												</div>
												<span>12% of your Goals</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-4 col-lg-6 text-center">
							<div class="card">
								<div class="card-header bg-red">
									<h3 class="text-white card-title">Unique Customer</h3>
								</div>
								<div class="card-body">
									<h2 class="mb-1 num-font" id="unique-customer"></h2>
									<span class="text-muted">15% Higher Of Previous Month</span>
									<div class="row mt-5">
										<div class="col-sm-12">
											<div class="mb-0">
												<h4 class="mb-2 d-block">
													<span class="fs-16">Total Expences</span>
													<span class="float-right num-font">$1587</span>
												</h4>
												<div class="progress progress-md h-1 mb-1">
													<div
														class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-30">
													</div>
												</div>
												<span>12% of your Goals</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-4 col-lg-6 text-center">
							<div class="card">
								<div class="card-header bg-red">
									<h3 class="card-title text-white">Average Customer</h3>
								</div>
								<div class="card-body">
									<h2 class="mb-1 num-font" id="avg-customer"></h2>
									<span class="text-muted">15% Higher Of Previous Month</span>
									<div class="row mt-5">
										<div class="col-sm-12">
											<div class="mb-0">
												<h4 class="mb-2 d-block">
													<span class="fs-16">Total Expences</span>
													<span class="float-right num-font">$1587</span>
												</h4>
												<div class="progress progress-md h-1 mb-1">
													<div
														class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-30">
													</div>
												</div>
												<span>12% of your Goals</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
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
				</div>

				<?php $this->load->view('temp/footer');?>
				<!-- <script src="<?= base_url()?>assets/public/js/app/api.js"></script> -->
				<script src="<?= base_url()?>assets/public/js/app/app-summary-traffic.js"></script>