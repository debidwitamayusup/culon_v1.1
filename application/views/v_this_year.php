<div class=" app-content">
	<div class="side-app">
		<div class="page-header d-flex p-2 bd-highlight">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">
					<h4 class="page-title"><i class="fe fe-grid mr-1"></i>Dashboard</h4>
				</li>
				<li class="breadcrumb-item active mt-2" aria-current="page">Traffic Interval Yearly</li>
			</ol>
			<div class="p-2 bd-highlight" id="layanan_name_parent">
					<select class="form-control-sm" style="border:0px; background:#f7efef;" id="layanan_name">
						<!-- <option value="#">All Tenant</option>
						<option value="#">All Tenant</option>
						<option value="#">All Tenant</option> -->
					</select>
				</div>
		</div>
		<!--Page Header-->
		<!----Baris Pertama----!-->
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header-small">
						<h5 class="card-title-small card-pt10">Graphic Interval Yearly</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-auto h6 mt-3">Channel</div>
							<div class="col-sm-auto">
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
										<option value="ChatBot">Chat Bot</option>
									</select>
								</div>
							</div>
							<div class="col-sm-auto h6 mt-3 ml-2">Year</div>
							<div class="col-sm-auto">
								<div class="form-group row">
									<select class="form-control select2" style="width: 100%;"
										data-placeholder="Choose one (with optgroup)" id="dateTahun">
									</select>
								</div>
							</div>
							<div class="col-sm-auto">
								<span>
									<button class="btn btn-sm btn-dark" type="button" id="btn-go" style="height:37px"><i
											class="fas fa-filter"></i></button>
								</span>
							</div>
						</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-body" id="customerChartYear">
									<!-- Chart Baru Yearly -->
									<canvas id="BarChartYear" class="h-300"></canvas>
									<!-- <div id="echartYear" class="chartsh overflow-hidden"></div> -->
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
					<div class="card-header-small">
						<h5 class="card-title-small card-pt10">Summary Session All Channel</h5>
					</div>
					<div class="card-body" id="chartPercentage">
						<canvas id="echartVerticalYear"></canvas>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-6">
				<div class="card">
					<div class="card-header-small">
						<h5 class="card-title-small card-pt10">Summary Service All Channel</h5>
					</div>
					<div class="table-responsive table-bordered table-pt10">
						<table class="table card-table table-striped table-vcenter table-hover table-pt10 fontNunito12"
							id="table_avg_year">
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
							<tbody style="font-size:12px !important;" id="mytbody_year">
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