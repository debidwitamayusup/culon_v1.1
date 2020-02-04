		<!-- Global Loader-->
		<div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
		<div class="page">
			<div class="page-main">
				<div class=" app-content mt-6">
					<div class="side-app">
						<div class="page-header d-flex bd-highlight">
							<div class="flex-grow-1 bd-highlight">
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">
										<h4 class="page-title"><i class="fe fe-grid mr-1"></i>Wallboard</h4>
									</li>
									<li class="breadcrumb-item active mt-2" aria-current="page">Summary Traffic
									</li>
								</ol>
							</div>
						</div>
						<div class="d-flex bd-highlight">
							<div class="ml-auto p-2 bd-highlight mt-3 h6">Layanan </div>
							<div class="p-2 bd-highlight">
								<select class="form-control" id="tenant_id">
									<!-- <option value="#">Layanan</option> -->
								</select>
							</div>
						</div>
					</div>
					<!--Page Header-->
					<!-- </div> -->
					<!----Baris Pertama----!-->
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-12">
							<div class="card overflow-hidden">
								<div class="card-header-small">
									<h5 class="card-title-small card-pt10">Summary by Channel</h5>
								</div>
								<div class="card-pie">
									<div class="canvas-con">
										<div id="legend" class="legend-con"></div>
										<div class="canvas-con-inner" id="canvas-pie">
											<canvas id="pieWallSummaryTraffic" class="donutShadow overflow-hidden"></canvas>
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-12">
							<div class="card overflow-hidden">
								<div class="card-header-small">
									<h5 class="card-title-small card-pt10">Traffic by Services OPS</h5>
								</div>
								<!-- chart yang baru -->
									<div class="card-body">
										<canvas id="horizontalBarWallSummary" width="600" height="392"></canvas>
									</div>
								<!-- <div class="card-body">
									<div id="echartWallSummaryTraffic" class="chartsh-traffic-ops overflow-hidden" style="width:100%"></div>
								</div> -->
							</div>
						</div>
					</div>
					<div class="row">
						<!---! Kolom Channel--->
						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="card overflow-hidden">
								<div class="card-header-small">
									<h5 class="card-title-small card-pt10">Interval Today (Hours)</h5>
								</div>

								<div class="card-body">
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
														<span class="custom-control-label">Whatsapp</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel"
															id="list-channel[]" name="example-checkbox2" value="Twitter">
														<span class="custom-control-label">Twitter</span>
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
														<span class="custom-control-label">Facebook</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel"
															id="list-channel[]" name="example-checkbox2" value="Email">
														<span class="custom-control-label">Email</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel"
															id="list-channel[]" name="example-checkbox2" value="Telegram">
														<span class="custom-control-label">Telegram</span>
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
														<span class="custom-control-label">Line</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel"
															id="list-channel[]" name="example-checkbox2" value="Voice">
														<span class="custom-control-label">Voice</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel"
															id="list-channel[]" name="example-checkbox2" value="Instagram">
														<span class="custom-control-label">Instagram</span>
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group m-0">
												<div class="custom-controls-stacked">
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel"
															id="list-channel[]" name="example-checkbox2" value="Messenger">
														<span class="custom-control-label">Messenger</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel"
															id="list-channel[]" name="example-checkbox2" value="Twitter DM">
														<span class="custom-control-label">Twitter DM</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel"
															id="list-channel[]" name="example-checkbox2" value="Live Chat">
														<span class="custom-control-label">Live Chat</span>
													</label>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group m-0">
												<div class="custom-controls-stacked">
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel"
															id="list-channel[]" name="example-checkbox2" value="SMS">
														<span class="custom-control-label">SMS</span>
													</label>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input checklist-channel"
															id="list-channel[]" name="example-checkbox2" value="ChatBot">
														<span class="custom-control-label">Chat Bot</span>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body" id="lineWallSummaryTrafficDiv">
									<canvas id="lineWallSummaryTraffic" class="h-400"></canvas>
								</div>

							</div>
						</div>
					</div>
					<?php $this->load->view('temp/footer');?>
					<script src="<?= base_url()?>assets/public/js/app/app-wall-summary-traffic.js"></script>