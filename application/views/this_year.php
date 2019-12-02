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
									<a href="<?=base_url()?>main/this_month" class="btn btn-light btn-sm">
										<span class="">Month</a></span>
									<a href="<?=base_url()?>main/this_year" class="btn btn-red btn-sm">
										<span class="">Year</a></span>
								</div>
							</div>
						</div>
						<!--Page Header-->
					</div>
					<!----Baris Pertama----!-->
					<div class="row">
						<div class="col-md-12">
							<div class="card overflow-hidden">
								<div class="card-header">
									<h3 class="card-title">Graphic Interval</h3>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="form-group row">
												<select class="form-control select2" data-placeholder="Choose one (with optgroup)">
													<optgroup label="Channel">
														<option value="1">Show</option>
														<option value="2">Whatsapp</option>
														<option value="3">Twitter</option>
														<option value="4">Facebook</option>
														<option value="5">Email</option>
														<option value="6">Telegram</option>
														<option value="7">Line</option>
														<option value="8">Voice</option>
														<option value="9">Instagram</option>
														<option value="10">Messenger</option>
														<option value="11">Twitter DM</option>
														<option value="12">Live Chat</option>
														<option value="13">Pesan</option>
													</optgroup>
												</select>
										</div>
										<div class="d-flex order-lg-2 ml-auto float-right">
											<div class="wd-200 mb-3">
												<div class="input-group">
													<div class="input-group-prepend">
														<select class="form-control select2" data-placeholder="Choose one (with optgroup)">
															<optgroup label="Year">
																<option value="1">2019</option>
																<option value="2">2018</option>
																<option value="3">2017</option>
																<option value="4">2016</option>
																<option value="5">2015</option>
																<option value="6">2014</option>
																<option value="7">2013</option>
																<option value="8">2012</option>
																<option value="9">2011</option>
																<option value="10">2010</option>
															</optgroup>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-body">
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
						<div class="col-lg-6 col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Summary Interval Year</h4>
								</div>
								<div class="card-body">
									<canvas id="echartVerticalYear"></canvas>
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
				<!--Chart Plugin -->
				<script src="<?=base_url()?>assets/plugins/echart/echart.js"></script>
				<script src="<?=base_url()?>public/js/app/lineChartYear.js"></script>
				<script src="<?=base_url()?>public/js/app/VerticalChart.js"></script>
				