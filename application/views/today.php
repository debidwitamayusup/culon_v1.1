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
												</div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-2">
											<div class="form-group m-0">
												<div class="custom-controls-stacked">
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked>
														<span class="custom-control-label">Show All</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2">
														<span class="custom-control-label">Whatsapp</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2">
														<span class="custom-control-label">Twitter</span>
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group m-0">
												<div class="custom-controls-stacked">
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" >
														<span class="custom-control-label">Facebook</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2">
														<span class="custom-control-label">Email</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2">
														<span class="custom-control-label">Telegram</span>
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group m-0">
												<div class="custom-controls-stacked">
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
														<span class="custom-control-label">Line</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2">
														<span class="custom-control-label">Voice</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2">
														<span class="custom-control-label">Instagram</span>
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group m-0">
												<div class="custom-controls-stacked">
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
														<span class="custom-control-label">Messenger</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2">
														<span class="custom-control-label">Twitter DM</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2">
														<span class="custom-control-label">Live Chat</span>
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group m-0">
												<div class="custom-controls-stacked">
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2">
														<span class="custom-control-label">Pesan</span>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body">
									<canvas id="customerChart" class="h-400"></canvas>
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
								<div class="card-body">
									<canvas id="echartVertical"></canvas>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Average Interval</h3>
								</div>
								<div class="table-responsive">
									<table class="table card-table table-vcenter table-hover">
										<thead >
											<tr>
												<th>No</th>
												<th>Channel</th>
												<th>SLA</th>
												<th>ART</th>
												<th>AHT</th>
												<th>AST</th>
											</tr>
										</thead>
										<tbody>
											<tr>
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
											</tr>
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
				
				<script src="<?=base_url()?>public/js/app/barChart.js"></script>				
				<script src="<?=base_url()?>public/js/app/VerticalChart.js"></script>