		<!-- Global Loader-->
		<div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
		<div class="page">
			<div class="page-main">
				<div class=" app-content mt-7">
					<div class="side-app">
						<div class="page-header d-flex bd-highlight">
							<div class="flex-grow-1 bd-highlight">
								<ol class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">
										<h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
									</li>
									<li class="breadcrumb-item active mt-2" aria-current="page">Traffic by Channel
									</li>
								</ol>
							</div>
							<div class="bd-highlight text-right">
								<div class="d-flex align-items-end flex-column bd-highlight">
									<div class="card-options d-none d-sm-block">
										<div class="btn-group btn-sm">
											<a href="#" class="btn btn-light btn-sm" id="btn-day">
												<span class="">Day</a></span>
											<a href="#" class="btn btn-light btn-sm" id="btn-month">
												<span class="">Month</a></span>
											<a href="#" class="btn btn-light btn-sm" id="btn-year">
												<span class="">Year</a></span>
										</div>
										<div class="bd-highlight">
				                             <!-- daily -->
				                             <div id="filter-date" class="mt-1 mr-0">
				                                 <input id="input-date-filter" class="w-50 ml-auto form-control fc-datepicker"
				                                     placeholder="MM/DD/YYYY" type="text">
				                             </div>

				                             <!-- monthly
				                             <div id="filter-month" class="row mt-1 mr-0">
				                                 <div class="col-md-auto">
				                                     <select name="select-month" id="select-month" class="form-control">
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
				                                 <div>
				                                     <select name="select-year-on-month" id="select-year-on-month" class="form-control">
				                                         <option value="2020" selected>2020</option>
				                                            <option value="2019">2019</option>
				                                     </select>
				                                 </div>
				                             </div>

				                             <!-- yearly -->
				                             <div id="filter-year" class="mt-1 mr-0">
				                                 <select name="select-year-only" id="select-year-only" class="form-control">
				                                     <option value="2020" selected>2020</option>
				                                     <option value="2019">2019</option>
				                                     <!-- <option value="2018">2018</option>
				                                    <option value="2017">2017</option>
				                                    <option value="2016">2016</option>
				                                    <option value="2015">2015</option> -->
				                                 </select>
				                             </div>
				                         </div>
									</div>

								</div>
							</div>
						</div>

						
						<!--Page Header-->
						<!-- </div> -->
						<!----Baris Pertama----!-->
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-12">
								<div class="card overflow-hidden">
									<div class="card-header-small bg-red">
										<h5 class="card-title-small card-pt10 text-white">Summary Traffic</h5>
									</div>
									<div class="card-pie">
										<div class="canvas-con">
											<div class="canvas-con-inner" id="canvas-pie">
												<canvas id="pieSummary" class="donutShadow overflow-hidden"></canvas>
											</div>
											<div id="legend" class="legend-con"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-12">
								<div class="card overflow-hidden">
									<div class="card-header-small bg-red">
										<h5 class="card-title-small card-pt10 text-white">Summary Interaction</h5>
									</div>
									<div class="card-body">
										<div class="row mt-2">
											<div class="col-md-6 text-center">
												<div class="card-custom">
													<div class="card-header bg-red">
														<h6 class="text-white card-body">Total Session</h6>
													</div>
													<div class="card-body">
														<h2 class="mb-4 mt-3 num-font" id="total-interaction"></h2>
														<span class="text-muted mb-5">Session</span>
													</div>
												</div>
											</div>
											<div class="col-md-6 text-center">
												<div class="card-custom">
													<div class="card-header bg-red">
														<h6 class="text-white card-body">Unique Customer</h6>
													</div>
													<div class="card-body">
														<h2 class="mb-4 mt-3 num-font" id="unique-customer"></h2>
														<span class="text-muted mb-5">Customer</span>
													</div>
												</div>
											</div>
										</div>
										<div class="row mt-2 mb-2">
											<div class="col-md-6 text-center">
												<div class="card-custom">
													<div class="card-header bg-red">
														<h6 class="card-body text-white">Message In</h6>
													</div>
													<div class="card-body">
														<h2 class="mb-4 mt-3 num-font" id="msg-in"></h2>
														<span class="text-muted mb-5">Interaction</span>
													</div>
												</div>
											</div>
											<div class="col-md-6 text-center">
												<div class="card-custom">
													<div class="card-header bg-red">
														<h6 class="card-body text-white">Message Out</h6>
													</div>
													<div class="card-body">
														<h2 class="mb-4 mt-3 num-font" id="msg-out"></h2>
														<span class="text-muted mb-5">Interaction</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<!---! Kolom Channel--->
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card overflow-hidden">
									<div class="card-body" style="padding:20px;" id="card-baru">
										<div class="row" id="row-baru">

										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="card">
					<div class="card-header" id="headingTwo">
						<h2 class="mb-0">
							<span>Collapsible Group Item #2</span>
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-plus-circle"></i></button>
						</h2>
					</div>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						<div class="card-body">
							<div class="slide-item ml-3"><a href="<?=base_url()?>main/this_day">Daily</a></div>
							<div class="slide-item ml-3"><a href="<?=base_url()?>main/this_month">Monthly</a></div>
							<div class="slide-item ml-3"><a href="<?=base_url()?>main/this_year">Yearly</a></div>
						</div>
					</div>
				</div> -->
						<!---Baris Kedua!-->
						<!--
					<div class="row">
						<div class="col-md-12">
							<div class="card box-widget widget-user">
								<div class="card-header bg-red">
									<h3 class="card-title text-white">Unique Customer per Channel</h3>
								</div>
								<div class="box-footer">
									<div class="row">
										<div class="col-md-12" id="card-unique-customer-per-channel">
											<div class="row" id="retres-unique">

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>-->
						<?php $this->load->view('temp/footer');?>
						<!-- <script src="<?= base_url()?>assets/public/js/app/api.js"></script> -->
						<script src="<?= base_url()?>assets/public/js/app/app-summary-traffic.js"></script>