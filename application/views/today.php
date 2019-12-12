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
									<a href="<?=base_url()?>main/this_day" class="btn btn-danger btn-sm">
										<span class="">Day</a></span>
									<a href="<?=base_url()?>main/this_month" class="btn btn-light btn-sm">
										<span class="">Month</a></span>
									<a href="<?=base_url()?>main/this_year" class="btn btn-light btn-sm">
										<span class="">Year</a></span>
								</div>
							</div>
						</div>
						<!--Page Header-->
					</div>

					<!----First Rows--->
					<div class="row">
						<div class="col-md-12">
							<div class="card overflow-hidden">
								<div class="card-header">
									<h3 class="card-title">Graphic Interval</h3>
								</div>
								<div class="card-body">
									<div class="d-flex order-lg-2 ml-auto float-right">
										<div class="wd-200 mb-3">
											<div class="input-group">
												<div class="input-group-prepend">
													<div class="input-group-text">
														<i class="fas fa-calendar tx-16 lh-0 op-6"></i>
													</div>
												</div><input id="input-date" class="form-control fc-datepicker"
													placeholder="MM/DD/YYYY" type="text">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-2">
											<div class="form-group m-0">
												<div class="custom-controls-stacked">
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input all-checklist" id="check-all-channel" name="check-all" value="All" >
														<span class="custom-control-label">Show All</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel" id="list-channel[]" name="example-checkbox2" value="Whatsapp">
														<span class="custom-control-label">Whatsapp</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel" id="list-channel[]" name="example-checkbox2" value="Twitter">
														<span class="custom-control-label">Twitter</span>
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group m-0">
												<div class="custom-controls-stacked">
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel" id="list-channel[]" name="example-checkbox2" value="Facebook" >
														<span class="custom-control-label">Facebook</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel" id="list-channel[]" name="example-checkbox2" value="Email">
														<span class="custom-control-label">Email</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel" id="list-channel[]" name="example-checkbox2" value="Telegram">
														<span class="custom-control-label">Telegram</span>
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group m-0">
												<div class="custom-controls-stacked">
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel" id="list-channel[]" name="example-checkbox2" value="Line">
														<span class="custom-control-label">Line</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel" id="list-channel[]" name="example-checkbox2" value="Voice">
														<span class="custom-control-label">Voice</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel" id="list-channel[]" name="example-checkbox2" value="Instagram">
														<span class="custom-control-label">Instagram</span>
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group m-0">
												<div class="custom-controls-stacked">
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel" id="list-channel[]" name="example-checkbox2" value="Facebook Messenger">
														<span class="custom-control-label">Messenger</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel" id="list-channel[]" name="example-checkbox2" value="Twitter DM">
														<span class="custom-control-label">Twitter DM</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel" id="list-channel[]" name="example-checkbox2" value="Live Chat">
														<span class="custom-control-label">Live Chat</span>
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group m-0">
												<div class="custom-controls-stacked">
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel" id="list-channel[]" name="example-checkbox2" value="SMS">
														<span class="custom-control-label">SMS</span>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="card-body" id="chart-interval">
									<canvas id="customerChartToday" class="h-400"></canvas>
								</div>
							</div>
						</div>
					</div>

					<!---Next Rows---->
					<div class="row">
						<div class="col-md-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Summary Interval Today</h4>
								</div>
								<div class="card-body" id="chart-percentage">
									<!-- <canvas id="echartVerticalDay"></canvas> -->
									<canvas id="echartPercentageToday"></canvas>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Average Interval</h3>
								</div>
								<div class="table-responsive">
									<table class="table card-table table-vcenter table-hover" id="table-avg-interval">
										<thead>
											<tr>
												<th>No</th>
												<th>Channel</th>
												<th>SLA</th>
												<th>ART</th>
												<th>AHT</th>
												<th>AST</th>
											</tr>
										</thead>
										<tbody id="mytbody">
										</tbody>
									</table>
								</div>
								<!-- table-responsive -->
							</div>
						</div>
					</div>
				</div>
				<?php $this->load->view('temp/footer');?>

				<!--Plugin -->
				<script src="<?=base_url()?>assets/js/apexcharts.js"></script>
				<script src="<?=base_url()?>assets/plugins/echart/echart.js"></script>
				<!--Highcharts Plugin -->

				<!-- <script src="<?=base_url()?>public/js/app/barChart.js"></script> -->
				<!-- <script src="<?=base_url()?>public/js/app/VerticalChart.js"></script> -->
				<script src="<?=base_url()?>assets/public/js/app/app-traffic-today.js"></script>

