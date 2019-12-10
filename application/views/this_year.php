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
											<select class="form-control" id="channel_name">
												<option value="ShowAll">Show</option>
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
														<select class="form-control select2" data-placeholder="Choose one (with optgroup)" id="dateTahun">
															<option value="2019">2019</option>
															<option value="2018">2018</option>
															<option value="2017">2017</option>
															<option value="2016">2016</option>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="card">
												<div class="card-body" id="customerChartYear">
													<div id="echartYear" class="chartsh overflow-hidden"></div>
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
								<div class="card-body" id="chartPercentage">
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
									<table class="table card-table table-vcenter table-hover" id="table_avg_year">
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
										<tbody id="mytbody_year">
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
				<!--Chart--->
				
				<script src="<?=base_url()?>assets/public/js/app/app-traffic-year.js"></script>

				<!-- <script type="text/javascript">
					var dateTahun = $("#dateTahun");

					var currentYear = (new Date()).getFullYear();

			        for (var i = 2000; i <= currentYear; i++)
			        {
			            var option = $ ("<option />");
			            option.html(i);
			            option.val(i);
			            dateTahun.append(option);
			        }
				</script> -->