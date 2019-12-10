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
						<div class="col-xl-8 col-lg-8 col-md-12">
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
						<div class="col-xl-4 col-lg-4 col-md-12">
							<div class="card overflow-hidden">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 text-center">
											<div class="card">
												<div class="card-header bg-red">
													<h4 class="text-white card-body">Total Interaction</h4>
												</div>
												<div class="card-body">
													<h2 class="mb-1 num-font" id="total-interaction"></h2>
													<span class="text-muted mb-5">Total Interaction</span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 text-center">
											<div class="card">
												<div class="card-header bg-red">
													<h4 class="text-white card-body">Unique Customer</h4>
												</div>
												<div class="card-body">
													<h2 class="mb-1 num-font" id="unique-customer"></h2>
													<span class="text-muted mb-5">Unique Customer</span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 text-center">
											<div class="card">
												<div class="card-header bg-red">
													<h4 class="card-body text-white">Average Interaction</h4>
												</div>
												<div class="card-body">
													<h2 class="mb-1 num-font" id="avg-customer"></h2>
													<span class="text-muted mb-5">Interaction</span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 text-center">
											<div class="card">
												<div class="card-header bg-red">
													<h4 class="card-body text-white">Total Session</h4>
												</div>
												<div class="card-body">
													<h2 class="mb-1 num-font" id="total-session">4000</h2>
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