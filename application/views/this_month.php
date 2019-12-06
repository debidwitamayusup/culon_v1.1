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
									<a href="<?=base_url()?>main/this_day" class="btn btn-light btn-sm">
										<span class="">Day</a></span>
									<a href="<?=base_url()?>main/this_month" class="btn btn-red btn-sm">
										<span class="">Month</a></span>
									<a href="<?=base_url()?>main/this_year" class="btn btn-light btn-sm">
										<span class="">Year</a></span>
								</div>
							</div>
						</div>
						<!--Page Header-->
					</div>
					<!----First Page----!-->
					<div class="row">
						<div class="col-md-12">
							<div class="card overflow-hidden">
								<div class="card-header">
									<h3 class="card-title">Graphic Interval</h3>
								</div>
								<div class="card-body">
									<div class="row">
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
										<div class="d-flex order-lg-2 ml-auto float-right">
											<div class="wd-200 mb-3">
												<div class="input-group">
													<div class="input-group-prepend">
														<select class="form-control" id="month">
															<option value="1">Januari</option>
															<option value="2">Februari</option>
															<option value="3">Maret</option>
															<option value="4">April</option>
															<option value="5">Mei</option>
															<option value="6">Juni</option>
															<option value="7">Juli</option>
															<option value="8">Agustus</option>
															<option value="9">September</option>
															<option value="10">Oktober</option>
															<option value="11">November</option>
															<option value="12">Desember</option>
														</select>
													</div>
												</div>
											</div>
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
								<div class="card-header">
									<h4 class="card-title">Summary Interval Month</h4>
								</div>
								<div class="card-body" id="chartPercentage">
									<canvas id="echartVerticalMonth"></canvas>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Average Interval</h3>
								</div>
								<div class="table-responsive">
									<table class="table card-table table-vcenter table-hover" id="tabel_average_month">
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
										<tbody id="mytbody_month">
										<!--	<tr>
												<th scope="row">1</th>
												<td>Whatsapp</td>
												<td>70%</td>
												<td>10:00:00</td>
												<td>10:50:19</td>
												<td>09:10:10</td>
											</tr>
											<tr>
												<th scope="row">2</th>
												<td>Twitter</td>
												<td>70%</td>
												<td>10:00:00</td>
												<td>10:50:19</td>
												<td>09:10:10</td>
											</tr>
											<tr>
												<th scope="row">3</th>
												<td>Facebook</td>
												<td>70%</td>
												<td>10:00:00</td>
												<td>10:50:19</td>
												<td>09:10:10</td>
											</tr>
											<tr>
												<th scope="row">4</th>
												<td>Email</td>
												<td>70%</td>
												<td>10:00:00</td>
												<td>10:50:19</td>
												<td>09:10:10</td>
											</tr>
											<tr>
												<th scope="row">5</th>
												<td>Telegram</td>
												<td>70%</td>
												<td>10:00:00</td>
												<td>10:50:19</td>
												<td>09:10:10</td>
											</tr>
											<tr>
												<th scope="row">6</th>
												<td>Line</td>
												<td>70%</td>
												<td>10:00:00</td>
												<td>10:50:19</td>
												<td>09:10:10</td>
											</tr>
											<tr>
												<th scope="row">7</th>
												<td>Voice</td>
												<td>70%</td>
												<td>10:00:00</td>
												<td>10:50:19</td>
												<td>09:10:10</td>
											</tr>
											<tr>
												<th scope="row">8</th>
												<td>Instagram</td>
												<td>70%</td>
												<td>10:00:00</td>
												<td>10:50:19</td>
												<td>09:10:10</td>
											</tr>
											<tr>
												<th scope="row">9</th>
												<td>Messenger</td>
												<td>70%</td>
												<td>10:00:00</td>
												<td>10:50:19</td>
												<td>09:10:10</td>
											</tr>
											<tr>
												<th scope="row">10</th>
												<td>Twitter DM</td>
												<td>70%</td>
												<td>10:00:00</td>
												<td>10:50:19</td>
												<td>09:10:10</td>
											</tr>
											<tr>
												<th scope="row">11</th>
												<td>Live Chat</td>
												<td>70%</td>
												<td>10:00:00</td>
												<td>10:50:19</td>
												<td>09:10:10</td>
											</tr>
											<tr>
												<th scope="row">12</th>
												<td>Pesan</td>
												<td>80%</td>
												<td>10:00:00</td>
												<td>10:50:19</td>
												<td>09:10:10</td>
											</tr>-->
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