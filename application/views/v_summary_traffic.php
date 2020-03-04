<div class=" app-content">
	<div class="side-app">
		<div class="page-header d-flex bd-highlight">
			<div class="mr-auto bd-highlight">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">
						<h4 class="page-title"><i class="fe fe-grid mr-1"></i>Dashboard</h4>
					</li>
					<li class="breadcrumb-item active mt-2" aria-current="page">Summary Traffic</li>
				</ol>
			</div>
			<!-- <div class="bd-highlight" style="margin-bottom:30px;">
				<select class="form-control-sm" style="border-color:#efecec" id="layanan_name">
					<option value="#">All Layanan</option>
					<option value="#">All Layanan</option>
					<option value="#">All Layanan</option>
				</select>
			</div> -->
			<div class="bd-highlight">
				<div class="bd-highlight" style="margin-left:5px;">
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
	</div>
	<div class="row" style="margin-right:0px; margin-left:-1px;">
		<div class="col-md-6">
			<div class="card overflow-hidden">
				<div class="card-header-small">
					<h5 class="card-title-small card-pt10 font-weight-extrabold">Summary Traffic</h5>
				</div>
				<div class="card-pie">
					<div class="canvas-con">
						<!-- <div id="legend" class="legend-con"></div>
						<div class="canvas-con-inner" id="canvas-pie">
							<canvas id="pieDashSummaryTraffic" class="donutShadow overflow-hidden"></canvas>
						</div> -->
						<div class="row">
							<div class="col-md-3">
								<div id="legend" class="legend-con"></div>
							</div>
							<div class="col-md-9 mt-6">
								<div class="canvas-con-inner" id="canvas-pie">
									<canvas id="pieDashSummaryTraffic" class="donutShadow overflow-hidden"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card overflow-hidden">
				<div class="card-header-small">
					<h5 class="card-title-small card-pt10 font-weight-extrabold">Top 5 Traffic</h5>
				</div>
				<div class="card-body">
					<canvas id="barTop5Traffic" style="height:343px"></canvas>
				</div>
			</div>

		</div>
	</div>
	<div class="row" style="margin-right:0px; margin-left:-1px;">
		<div class="col-md-6">
			<div class="card overflow-hidden">
				<div class="card-header-small">
					<h5 class="card-title-small card-pt10 font-weight-extrabold">Telkom Group</h5>
				</div>
				<div class="card-body">
					<canvas id="barTelkomGroup" class="h-200"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card overflow-hidden">
				<div class="card-header-small">
					<h5 class="card-title-small card-pt10 font-weight-extrabold">Goverment Group</h5>
				</div>
				<div class="card-body">
					<canvas id="barGovermentGroup" class="h-200"></canvas>
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="margin-right:0px; margin-left:-1px;">
		<div class="col-md-6">
			<div class="card overflow-hidden">
				<div class="card-header-small">
					<h5 class="card-title-small card-pt10 font-weight-extrabold">BFSI Group</h5>
				</div>
				<div class="card-body">
					<canvas id="barBFSIGroup" class="h-200"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card overflow-hidden">
				<div class="card-header-small">
					<h5 class="card-title-small card-pt10 font-weight-extrabold">Enterprise Group</h5>
				</div>
				<div class="card-body">
					<canvas id="barEnterpriseGroup" class="h-200"></canvas>
				</div>
				<div id="chartjs-tooltip" class="center"></div>
				<!-- <div id="chartjs-tooltip"></div> -->
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('temp/footer');?>
<!-- <script src="<?= base_url()?>assets/public/js/app/api.js"></script> -->
<script src="<?= base_url()?>assets/public/js/app/app-dash-summary-traffic.js"></script>
<style>
		canvas{
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
		}
		#chartjs-tooltip {
			opacity: 1;
			position: absolute;
			background: rgba(0, 0, 0, .7);
			color: white;
			border-radius: 3px;
			-webkit-transition: all .1s ease;
			transition: all .1s ease;
			pointer-events: none;
			-webkit-transform: translate(-50%, 0);
			transform: translate(-50%, 0);
		}

		.chartjs-tooltip-key {
			display: inline-block;
			width: 10px;
			height: 10px;
			margin-right: 10px;
		}
	</style>