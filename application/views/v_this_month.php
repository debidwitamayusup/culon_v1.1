<!-- Global Loader-->
<div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
<div class="page">
	<div class="page-main">
		<div class=" app-content mt-6">
			<div class="side-app">
				<div class="page-header d-flex p-2 bd-highlight">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active" aria-current="page">
							<h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
						</li>
						<li class="breadcrumb-item active mt-2" aria-current="page">Traffic Interval Monthly</li>
					</ol>
				</div>
				<!--Page Header-->
			</div>
			<!----First Page----!-->
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header-small">
							<h5 class="card-title-small card-pt10">Graphic Interval Monthly</h5>
						</div>
						<div class="card-body">
							<div class="d-flex flex-row bd-highlight mb-2">
								<div class="p-2 bd-highlight h6 mt-3">Channel</div>
								<div class="p-2 bd-highlight">
									<div class="form-group row">
										<select class="form-control" id="channel_name">
											<option value="ShowAll">Show All</option>
											<option value="Whatsapp">Whatsapp</option>
											<option value="Twitter">Twitter</option>
											<option value="Facebook">Facebook</option>
											<option value="Email">Email</option>
											<option value="Telegram">Telegram</option>
											<option value="Line">Line</option>
											<option value="Voice">Voice</option>
											<option value="Instagram">Instagram</option>
											<option value="Messenger">Messenger</option>
											<option value="Twitter DM">Twitter DM</option>
											<option value="Live Chat">Live Chat</option>
											<option value="SMS">SMS</option>
										</select>
									</div>
								</div>
								<div class="p-2 bd-highlight h6 mt-3 ml-5">Month</div>
								<div class="p-2 bd-highlight">
									<div class="wd-200 mb-3">
										<div class="input-group">
											<div class="input-group-prepend">
												<select class="form-control" id="month">
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
										</div>
									</div>
								</div>
								<div class="p-2 bd-highlight h6 mt-3 ml-5">Year</div>
								<div class="p-2 bd-highlight">
									<div class="wd-200 mb-3">
										<div class="input-group">
											<div class="input-group-prepend">
												<!-- <input type="text" class="form-control select2" id="dropdownYear"/>	 -->
												<select class="form-control select2" id="dropdownYear">
													<!-- <option value="1">2019</option>
															<option value="2">2020</option> -->
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="p-2 bd-highlight">
									<span class="col-auto">
										<button class="btn btn-dark" type="button">Go</button>
									</span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-body" id="customerChartMonth">
											<div id="echart1" class="chartsh overflow-hidden"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-lg-6">
					<div class="card">
						<div class="card-header-small">
							<h5 class="card-title-small card-pt10">Summary Session All Channel</h5>
						</div>
						<div class="card-body" id="chartPercentage">
							<canvas id="echartVerticalMonth" style="0px 20px 0px 20px"></canvas>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-6">
					<div class="card">
						<div class="card-header-small">
							<h5 class="card-title-small card-pt10">Summary Service All Channel</h5>
						</div>
						<div class="table-responsive table-bordered table-pt10">
							<table class="table card-table table-striped table-vcenter table-hover"
								id="tabel_average_month">
								<thead class="text-center text-white bg-gray1">
									<tr>
										<th>No</th>
										<th>Channel</th>
										<th>SCR</th>
										<th>ART</th>
										<th>AHT</th>
										<th>AST</th>
									</tr>
								</thead>
								<tbody style="font-size:12px !important;" id="mytbody_month">
								</tbody>
							</table>
						</div>
						<!-- table-responsive -->
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('temp/footer');?>
		<!--Chart Plugin -->
		<script src="<?=base_url()?>assets/plugins/echart/echart.js"></script>
		<script src="<?=base_url()?>assets/public/js/chart/lineChart.js"></script>
		<!-- <script src="<?=base_url()?>assets/public/js/chart/VerticalChart.js"></script> -->
		<script src="<?=base_url()?>assets/public/js/app/app-traffic-month.js"></script>