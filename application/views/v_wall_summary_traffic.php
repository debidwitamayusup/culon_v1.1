<div class=" app-content">
	<div class="side-app">
		<div class="page-header d-flex bd-highlight">
			<div class="mr-auto bd-highlight">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">
						<h4 class="page-title"><i class="fe fe-monitor mr-1"></i>Wallboard</h4>
					</li>
					<li class="breadcrumb-item active mt-2" aria-current="page">Summary Traffic Today</li>
				</ol>
			</div>
			<div class="bd-highlight" id="layanan_name_parent">
				<select class="form-control-sm select-tenant" style="border-color:#efecec" id="layanan_name">

				</select>
			</div>
		</div>
		<div class="row margin0-4">
			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="row margin0-4">
					<div class="col-md-3 text-center">
						<div class="card-custom overflow-hidden">
							<div class="card-header-small bg-light-3">
								<h6 class="card-body fontPoppins font-weight-extrabold">Unique Customer</h6>
							</div>
							<div class="card-body dash2">
								<div class="chart-circle chart-circle-sm float-left mt-2" data-value="0.67"
									data-thickness="10" data-color="#d9dbdc99">
									<div class="chart-circle-value fs">
										<img src="<?=base_url()?>assets/images/ICON/img_user.png">
									</div>
								</div>
								<span class="count-numbers num-font font-weight-extrabold" id="unique-customer"></span>
								<span class="count-name">Customer</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="card-custom overflow-hidden">
							<div class="card-header-small bg-light-3">
								<h6 class="card-body fontPoppins font-weight-extrabold">Total Session</h6>
							</div>
							<div class="card-body dash2">
								<div class="chart-circle chart-circle-sm float-left mt-2" data-value="0.67"
									data-thickness="10" data-color="#d9dbdc99">
									<div class="chart-circle-value fs">
										<img src="<?=base_url()?>assets/images/ICON/img_clock.png">
									</div>
								</div>
								<span class="count-numbers num-font font-weight-extrabold" id="total-interaction"></span>
								<span class="count-name">Session</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="card-custom overflow-hidden">
							<div class="card-header-small bg-light-3">
								<h6 class="card-body fontPoppins font-weight-extrabold">Message In</h6>
							</div>
							<div class="card-body dash2">
								<div class="chart-circle chart-circle-sm float-left mt-2" data-value="0.67"
									data-thickness="10" data-color="#d9dbdc99">
									<div class="chart-circle-value fs">
										<img src="<?=base_url()?>assets/images/ICON/img_envelope2.png">
									</div>
								</div>
								<span class="count-numbers num-font font-weight-extrabold" id="msg-in"></span>
								<span class="count-name">interaction</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="card-custom overflow-hidden">
							<div class="card-header-small bg-light-3">
								<h6 class="card-body fontPoppins font-weight-extrabold">Message Out</h6>
							</div>
							<div class="card-body dash2">
								<div class="chart-circle chart-circle-sm float-left mt-2" data-value="0.67"
									data-thickness="10" data-color="#d9dbdc99">
									<div class="chart-circle-value fs">
										<img src="<?=base_url()?>assets/images/ICON/img_envelope.png">
									</div>
								</div>
								<span class="count-numbers num-font font-weight-extrabold" id="msg-out"></span>
								<span class="count-name">interaction</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row margin0-4">
			<div class="col-xl-4 col-lg-4 col-md-12">
				<div class="card overflow-hidden">
					<div class="card-header-small">
						<h5 class="card-title-small card-pt10 font-weight-extrabold">Summary Traffic</h5>
					</div>
					<div class="card-pie">
						<div class="canvas-con">
							<div id="legend" class="legend-con" style="margin-top:12px; margin-left:5px"></div>
							<div class="canvas-con-inner" id="canvas-pie">
								<canvas id="pieWallSummaryTraffic"
									class="donutShadow overflow-hidden mb-5 mt-4"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-8 col-lg-8 col-md-12">
				<div class="card overflow-hidden">
					<div class="card-body" id="card-baru" style="padding:5px;">
						<div class="row" id="row-baru">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('temp/footer');?>
	<!-- <script src="<?= base_url()?>assets/public/js/app/api.js"></script> -->
	<script src="<?= base_url()?>assets/public/js/app/app-wall-summary-traffic.js"></script>