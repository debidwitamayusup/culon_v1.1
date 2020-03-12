<div class=" app-content">
	<div class="side-app">
		<div class="page-header d-flex p-2 bd-highlight">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">
					<h4 class="page-title"><i class="fe fe-grid mr-1"></i>Dashboard</h4>
				</li>
				<li class="breadcrumb-item active mt-2" aria-current="page">Traffic Interval Daily</li>
			</ol>
			<div class="p-2 bd-highlight" id="layanan_name_parent">
				<select class="form-control-sm" style="border-color:#efecec;font-size:12px" id="layanan_name">
					<!-- <option value="#">All Tenant</option>
						<option value="#">All Tenant</option>
						<option value="#">All Tenant</option> -->
				</select>
			</div>
		</div>
		<!--Page Header-->

		<!----First Rows--->
		<div class="row" style="margin-right:0px; margin-left:-4px">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header-small">
						<h5 class="card-title-small card-pt10">Graphic Interval Daily</h5>
					</div>
					<div class="card-body">
						<div class="d-flex order-lg-2 ml-auto float-right">
							<div class="wd-200 mb-3">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="fas fa-calendar tx-16 lh-0 op-6"></i>
										</div>
									</div><input id="input-date" class="w-55 form-control fc-datepicker"
										placeholder="MM/DD/YYYY" type="text">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<div class="form-group m-0">
									<div class="custom-controls-stacked">
										<label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input all-checklist"
												id="check-all-channel" name="check-all" value="All">
											<span class="custom-control-label">Show All</span>
										</label>
										<label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input checklist-channel"
												id="list-channel[]" name="example-checkbox2" value="Whatsapp">
											<span class="custom-control-label color_checkbox_whatsapp">Whatsapp</span>
										</label>
										<label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input checklist-channel"
												id="list-channel[]" name="example-checkbox2" value="Twitter">
											<span class="custom-control-label color_checkbox_twitter">Twitter</span>
										</label>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group m-0">
									<div class="custom-controls-stacked">
										<label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input checklist-channel"
												id="list-channel[]" name="example-checkbox2" value="Facebook">
											<span class="custom-control-label color_checkbox_facebook">Facebook</span>
										</label>
										<label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input checklist-channel"
												id="list-channel[]" name="example-checkbox2" value="Email">
											<span class="custom-control-label color_checkbox_email">Email</span>
										</label>
										<label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input checklist-channel"
												id="list-channel[]" name="example-checkbox2" value="Telegram">
											<span class="custom-control-label color_checkbox_telegram">Telegram</span>
										</label>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group m-0">
									<div class="custom-controls-stacked">
										<label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input checklist-channel"
												id="list-channel[]" name="example-checkbox2" value="Line">
											<span class="custom-control-label color_checkbox_line">Line</span>
										</label>
										<!-- <label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input checklist-channel"
												id="list-channel[]" name="example-checkbox2" value="Voice">
											<span class="custom-control-label">Voice</span>
										</label> -->
										<label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input checklist-channel"
												id="list-channel[]" name="example-checkbox2" value="Instagram">
											<span class="custom-control-label color_checkbox_instagram">Instagram</span>
										</label>
										<label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input checklist-channel"
												id="list-channel[]" name="example-checkbox2" value="Messenger">
											<span class="custom-control-label color_checkbox_messenger">Messenger</span>
										</label>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group m-0">
									<div class="custom-controls-stacked">
										<label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input checklist-channel"
												id="list-channel[]" name="example-checkbox2" value="Twitter DM">
											<span class="custom-control-label color_checkbox_twitter_dm">Twitter DM</span>
										</label>
										<label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input checklist-channel"
												id="list-channel[]" name="example-checkbox2" value="Live Chat">
											<span class="custom-control-label color_checkbox_live_chat">Live Chat</span>
										</label>
										<label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input checklist-channel"
												id="list-channel[]" name="example-checkbox2" value="SMS">
											<span class="custom-control-label color_checkbox_sms">SMS</span>
										</label>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group m-0">
									<div class="custom-controls-stacked">
										<!-- <label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input checklist-channel"
												id="list-channel[]" name="example-checkbox2" value="SMS">
											<span class="custom-control-label">SMS</span>
										</label> -->
										<label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input checklist-channel"
												id="list-channel[]" name="example-checkbox2" value="ChatBot">
											<span class="custom-control-label color_checkbox_chatbot">Chat Bot</span>
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
		<div class="row" style="margin-right:0px;  margin-left:-4px;">
			<div class="col-md-12 col-lg-6">
				<div class="card">
					<div class="card-header-small">
						<h5 class="card-title-small card-pt10">Summary Session All Channel</h5>
					</div>
					<div class="card-body" id="chart-percentage">
						<!-- <canvas id="echartVerticalDay"></canvas> -->
						<canvas id="echartPercentageToday"></canvas>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-6">
				<div class="card">
					<div class="card-header-small">
						<h5 class="card-title-small card-pt10">Summary Service All Channel</h5>
					</div>
					<div class="table-responsive table-bordered table-pt10">
						<table class="table card-table table-striped table-vcenter table-hover fontNunito12"
							id="table-avg-interval">
							<thead class="text-center text-white bg-gray1">
								<tr>
									<th style="width:1%">No</th>
									<th>Channel</th>
									<th>SCR</th>
									<th>ART</th>
									<th>AHT</th>
									<th>AST</th>
								</tr>
							</thead>
							<tbody style="font-size:12px !important;" id="mytbody">
							</tbody>
							<tfoot style="font-size:12px !important;" id="mytfoot">
							</tfoot>
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
	<script src="<?=base_url()?>assets/public/js/app/app-traffic-today.js"></script>