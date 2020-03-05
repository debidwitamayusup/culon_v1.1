<div class=" app-content">
	<div class="side-app">
		<div class="page-header d-flex bd-highlight">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">
					<h4 class="page-title"><i class="fe fe-grid mr-1"></i>Dashboard</h4>
				</li>
				<li class="breadcrumb-item active mt-2" aria-current="page">Summary Traffic</li>
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
								<div class="col-md-5">
									<div id="legend" class="legend-con"></div>
								</div>
								<div class="col-md-7 mt-6">
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
				<div id="chartjs-tooltip"></div>
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
						<div id="chartjs-tooltip" class="center">
							<table>
							</table>
						</div>
						<canvas id="barEnterpriseGroup" class="h-200"></canvas>
					</div>
				</div>
				<!-- <div id="chartjs-tooltip"></div> -->
			</div>
		</div>
	</div>
	<?php $this->load->view('temp/footer');?>
	<!-- <script src="<?= base_url()?>assets/public/js/app/api.js"></script> -->
	<script src="<?= base_url()?>assets/public/js/app/app-dash-summary-traffic.js"></script>
	<!-- <style>
		.charts {
		width: 800px;
		position: relative;
		}

		.mtd {
		display: inline-block;
		margin: 10px 20px;
		}

		#doughnut {
		width: 100%;
		height: 100%;
		}

		ul.doughnut-legend {
		margin-left: 0;
		height: 40px;
		}

		.chart-legend {
		margin-top: 40px;
		}

		.chart-legend li {
		display: inline-block;
		font-size: 20px;
		text-transform: uppercase;
		margin-right: 20px;
		}

		.chart-legend li span {
		display: inline-block;
		position: relative;
		width: 26px;
		height: 22px;
		top: 4px;
		margin-right: 8px;
		}

		#chartjs-tooltip {
		opacity: 1;
		position: absolute;
		background: rgba(255, 255, 255, .8) transparent;
		color: #00000;
		font-size: 40px;
		padding: 3px;
		}

		#chartjs-tooltip.below {
		-webkit-transform: translate(-50%, 0);
		transform: translate(-50%, 0);
		}

		#chartjs-tooltip.below:before {
		border: solid;
		border-color: #111 transparent;
		border-color: rgba(255, 255, 255, .8) transparent;
		border-width: 0 8px 8px 8px;
		bottom: 1em;
		content: "";
		display: block;
		left: 50%;
		position: absolute;
		z-index: 99;
		-webkit-transform: translate(-50%, -100%);
		transform: translate(-50%, -100%);
		}

		#chartjs-tooltip.above {
		-webkit-transform: translate(-50%, -100%);
		transform: translate(-50%, -100%);
		}

		#chartjs-tooltip.above:before {
		border: solid;
		border-color: #111 transparent;
		border-color: rgba(255, 255, 255, .8) transparent;
		border-width: 8px 8px 0 8px;
		bottom: 1em;
		content: "";
		display: block;
		left: 50%;
		top: 100%;
		position: absolute;
		z-index: 99;
		-webkit-transform: translate(-50%, 0);
		transform: translate(-50%, 0);
		}
	</style> -->