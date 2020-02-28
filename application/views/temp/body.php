<div class=" app-content">
	<div class="side-app">
		<!-- <div class="col-md-12 col-xl-12 mt-1 mb-3">
			<div id="carousel-indicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel-indicators" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-indicators" data-slide-to="1" class="">
					</li>
					<li data-target="#carousel-indicators" data-slide-to="2" class="">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100 h-100" alt="" src="<?=base_url()?>assets/images/brand/banner_1.jpg"
							data-holder-rendered="true">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100 h-100" alt="" src="<?=base_url()?>assets/images/brand/banner_2.jpg"
							data-holder-rendered="true">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100 h-100" alt="" src="<?=base_url()?>assets/images/brand/banner_3.jpg"
							data-holder-rendered="true">
					</div>
				</div>
			</div>
		</div> -->
		
		<div class="page-header d-flex bd-highlight">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">
					<h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
				</li>
				<li class="breadcrumb-item active mt-2" aria-current="page">Traffic by Channel</li>
			</ol>
			<div class="d-flex align-items-end flex-column bd-highlight">
				<div class="bd-highlight">
					<div class="card-options d-none d-sm-block">
						<div class="btn-group text-center btn-sm">
							<a href="#" class="btn btn-light btn-sm" id="btn-day">
								<span class="">Day</a></span>
							<a href="#" class="btn btn-light btn-sm" id="btn-month">
								<span class="">Month</a></span>
							<a href="#" class="btn btn-light btn-sm" id="btn-year">
								<span class="">Year</a></span>
						</div>
					</div>
				</div>
				<div class="bd-highlight">
					<!-- daily -->
					<div id="filter-date" class="mt-1 mr-0">
						<input id="input-date-filter" class="w-55 ml-auto form-control form-control-sm fc-datepicker"
							placeholder="MM/DD/YYYY" type="text">
					</div>

					<!-- monthly -->
					<div id="filter-month" class="row mt-1 mr-0">
						<div class="col-md-auto">
							<select name="select-month" id="select-month" class="form-control form-control-sm">
								<option value="1">January</option>
								<option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">June</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
						</div>
						<!-- Monthly -->
						<div>
							<select name="select-year-on-month" id="select-year-on-month"
								class="form-control form-control-sm">
							</select>
						</div>
						<!-- Monthly -->
						<div>
							<span class="col-auto">
								<button class="btn btn-sm btn-dark" type="button" style="height:29px" id="btn-go"><i
										class="fe fe-arrow-right text-white"></i></button>
							</span>
						</div>
					</div>

					<!-- yearly -->
					<div id="filter-year" class="mt-1 mr-0">
						<select name="select-year-only" id="select-year-only" class="form-control form-control-sm">
						</select>
					</div>
					<!-- yearly -->
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="row mt-2">
					<div class="col-md-3 text-center">
						<div class="card-custom overflow-hidden">
							<div class="card-header bg-light-3">
								<h6 class="card-body fontPoppins font-weight-extrabold">Unique Customer</h6>
							</div>
							<div class="card-body dash2">
								<div class="chart-circle chart-circle-sm float-left mt-2" data-value="0.67"
									data-thickness="10" data-color="#d9dbdc99">
									<div class="chart-circle-value fs">
										<img src="<?=base_url()?>assets/images/ICON/img_user.png">
									</div>
								</div>
								<span class="count-numbers num-font" id="unique-customer"></span>
								<span class="count-name">Customer</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="card-custom overflow-hidden">
							<div class="card-header bg-light-3">
								<h6 class="card-body fontPoppins font-weight-extrabold">Total Session</h6>
							</div>
							<div class="card-body dash2">
								<div class="chart-circle chart-circle-sm float-left mt-2" data-value="0.67"
									data-thickness="10" data-color="#d9dbdc99">
									<div class="chart-circle-value fs">
										<img src="<?=base_url()?>assets/images/ICON/img_clock.png">
									</div>
								</div>
								<span class="count-numbers num-font" id="total-interaction"></span>
								<span class="count-name">Session</span>
							</div>
						</div>
					</div>


					<div class="col-md-3 text-center">
						<div class="card-custom overflow-hidden">
							<div class="card-header bg-light-3">
								<h6 class="card-body fontPoppins font-weight-extrabold">Message In</h6>
							</div>
							<div class="card-body dash2">
								<div class="chart-circle chart-circle-sm float-left mt-2" data-value="0.67"
									data-thickness="10" data-color="#d9dbdc99">
									<div class="chart-circle-value fs">
										<img src="<?=base_url()?>assets/images/ICON/img_envelope2.png">
									</div>
								</div>
								<span class="count-numbers num-font" id="msg-in"></span>
								<span class="count-name">Interaction</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="card-custom overflow-hidden">
							<div class="card-header bg-light-3">
								<h6 class="card-body fontPoppins font-weight-extrabold">Message Out</h6>
							</div>
							<div class="card-body dash2">
								<div class="chart-circle chart-circle-sm float-left mt-2" data-value="0.67"
									data-thickness="10" data-color="#d9dbdc99">
									<div class="chart-circle-value fs">
										<img src="<?=base_url()?>assets/images/ICON/img_envelope.png">
									</div>
								</div>
								<span class="count-numbers num-font" id="msg-out"></span>
								<span class="count-name">Interaction</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-12">
				<div class="card overflow-hidden">
					<div class="card-header-small">
						<h5 class="card-title-small card-pt10 font-weight-extrabold">Summary Traffic</h5>
					</div>
					<div class="card-pie">
						<div class="canvas-con">
							<div id="legend" class="legend-con mb-3 mt-3"></div>
							<div class="canvas-con-inner mb-6" id="canvas-pie">
								<canvas id="pieSummary" class="donutShadow overflow-hidden"></canvas>
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
	<script src="<?= base_url()?>assets/public/js/app/app-summary-traffic.js"></script>