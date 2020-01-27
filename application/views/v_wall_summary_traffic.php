		<!-- Global Loader-->
		<div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
		<div class="page">
			<div class="page-main">
				<div class=" app-content mt-6">
					<div class="side-app">
						<div class="page-header d-flex bd-highlight">
							<div class="flex-grow-1 bd-highlight">
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">
										<h4 class="page-title"><i class="fe fe-grid mr-1"></i>Wallboard</h4>
									</li>
									<li class="breadcrumb-item active mt-2" aria-current="page">Summary Traffic
									</li>
								</ol>
							</div>
						</div>
						<!--Page Header-->
						<!-- </div> -->
						<!----Baris Pertama----!-->
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-12">
								<div class="card overflow-hidden">
									<div class="card-header-small">
										<h5 class="card-title-small card-pt10">Summary by Channel</h5>
									</div>
									<div class="card-pie">
										<div class="canvas-con">
											<div id="legend" class="legend-con"></div>
											<div class="canvas-con-inner" id="canvas-pie">
												<canvas id="pieWallSummaryTraffic"
													class="donutShadow overflow-hidden"></canvas>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-12">
								<div class="card overflow-hidden">
									<div class="card-header-small">
										<h5 class="card-title-small card-pt10">Traffic by Services OPS</h5>
									</div>
									<div class="card-body">
										<div id="echartWallSummaryTraffic" class="chartsh-traffic-ops overflow-hidden"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<!---! Kolom Channel--->
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card overflow-hidden">
									<div class="card-header-small">
										<h5 class="card-title-small card-pt10">Interval Today (Hours)</h5>
									</div>
									<div class="card-body" id="lineWallSummaryTrafficDiv">
										<canvas id="lineWallSummaryTraffic" class="h-400"></canvas>
									</div>
								</div>
							</div>
						</div>
						<?php $this->load->view('temp/footer');?>
						<script src="<?= base_url()?>assets/public/js/app/app-wall-summary-traffic.js"></script>