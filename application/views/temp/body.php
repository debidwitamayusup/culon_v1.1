		<!-- Global Loader-->
		<div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
		<div class="page">
			<div class="page-main">
				<div class=" app-content mt-6">
					<div class="side-app">
						<div class="col-md-12 col-xl-12 mt-1 mb-3">
							<div id="carousel-indicators" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#carousel-indicators" data-slide-to="0" class="active"></li>
									<li data-target="#carousel-indicators" data-slide-to="1" class="">
									</li>
									<li data-target="#carousel-indicators" data-slide-to="2" class="">
									</li>
								</ol>
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img class="d-block w-100 h-100" alt=""
											src="<?=base_url()?>assets/images/brand/Dashboard_12.jpg"
											data-holder-rendered="true">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100 h-100" alt=""
											src="<?=base_url()?>assets/images/brand/Dashboard_12.jpg"
											data-holder-rendered="true">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100 h-100" alt=""
											src="<?=base_url()?>assets/images/brand/Dashboard_12.jpg"
											data-holder-rendered="true">
									</div>
								</div>
							</div>
						</div>
						<div class="page-header d-flex bd-highlight">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active" aria-current="page">
									<h4 class="page-title"><i class="fe fe-home mr-1"></i>Dashboard</h4>
								</li>
								<li class="breadcrumb-item active mt-2" aria-current="page">Traffic by Channel</li>
							</ol>
							<div class="d-flex align-items-end flex-column bd-highlight">
								<div class="bd-highlight">
									<div class="card-options d-none d-sm-block">
										<div class="btn-group text-center btn-sm">
											<a href="#" class="btn btn-light btn-sm" id="btn-day">
												<span class="">Day</a></span>
											<a href="#" class="btn btn-light btn-sm" id="btn-month">
												<span class="">Month</a></span>
											<a href="#" class="btn btn-light btn-sm" id="btn-year">
												<span class="">Year</a></span>
										</div>
									</div>
								</div>
								<div class="bd-highlight">
									<!-- daily -->
									<div id="filter-date" class="mt-1 mr-0">
										<input id="input-date-filter"
											class="w-55 ml-auto form-control form-control-sm fc-datepicker"
											placeholder="MM/DD/YYYY" type="text">
									</div>

									<!-- monthly -->
									<div id="filter-month" class="row mt-1 mr-0">
										<div class="col-md-auto">
											<select name="select-month" id="select-month"
												class="form-control form-control-sm">
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
										<!-- Monthly -->
										<div>
											<select name="select-year-on-month" id="select-year-on-month"
												class="form-control form-control-sm">
											</select>
										</div>
										<!-- Monthly -->
										<div>
											<span class="col-auto">
												<button class="btn btn-sm btn-dark" type="button" style="height:29px"
													id="btn-go"><i class="fe fe-arrow-right text-white"></i></button>
											</span>
										</div>
									</div>

									<!-- yearly -->
									<div id="filter-year" class="mt-1 mr-0">
										<select name="select-year-only" id="select-year-only"
											class="form-control form-control-sm">
										</select>
									</div>
									<!-- yearly -->
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="row mt-2">
									<div class="col-md-3 text-center">
										<div class="card-custom overflow-hidden">
											<div class="card-header bg-light-3">
												<h6 class="card-body fontPoppins font-weight-extrabold">Total Session</h6>
											</div>
											<div class="card-body dash2">
												<div class="chart-circle chart-circle-sm float-left mt-2" data-value="0.67"
													data-thickness="10" data-color="#d9dbdc99">
													<div class="chart-circle-value fs">
														<img src="<?=base_url()?>assets/images/ICON/img_user.png">
													</div>
												</div>
												<span class="count-numbers counter num-font" id="total-interaction"></span>
												<span class="count-name">Data</span>
											</div>
										</div>
									</div>
									<div class="col-md-3 text-center">
										<div class="card-custom overflow-hidden">
											<div class="card-header bg-light-3">
												<h6 class="card-body fontPoppins font-weight-extrabold">Unique Customer</h6>
											</div>
											<div class="card-body dash2">
												<div class="chart-circle chart-circle-sm float-left mt-2" data-value="0.67"
													data-thickness="10" data-color="#d9dbdc99">
													<div class="chart-circle-value fs">
														<img src="<?=base_url()?>assets/images/ICON/img_clock.png">
													</div>
												</div>
												<span class="count-numbers counter num-font" id="unique-customer"></span>
												<span class="count-name">Data</span>
											</div>
										</div>
									</div>

									<div class="col-md-3 text-center">
										<div class="card-custom overflow-hidden">
											<div class="card-header bg-light-3">
												<h6 class="card-body fontPoppins font-weight-extrabold">Message In</h6>
											</div>
											<div class="card-body dash2">
												<div class="chart-circle chart-circle-sm float-left mt-2" data-value="0.67"
													data-thickness="10" data-color="#d9dbdc99">
													<div class="chart-circle-value fs">
														<img src="<?=base_url()?>assets/images/ICON/img_envelope2.png">
													</div>
												</div>
												<span class="count-numbers counter num-font" id="msg-in"></span>
												<span class="count-name">Data</span>
											</div>
										</div>
									</div>
									<div class="col-md-3 text-center">
										<div class="card-custom overflow-hidden">
											<div class="card-header bg-light-3">
												<h6 class="card-body fontPoppins font-weight-extrabold">Message Out</h6>
											</div>
											<div class="card-body dash2">
												<div class="chart-circle chart-circle-sm float-left mt-2" data-value="0.67"
													data-thickness="10" data-color="#d9dbdc99">
													<div class="chart-circle-value fs">
														<img src="<?=base_url()?>assets/images/ICON/img_envelope.png">
													</div>
												</div>
												<span class="count-numbers counter num-font" id="msg-out"></span>
												<span class="count-name">Data</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-4 col-lg-4 col-md-12">
								<div class="card overflow-hidden">
									<div class="card-header-small">
										<h5 class="card-title-small card-pt10 font-weight-extrabold">Summary Traffic</h5>
									</div>
									<div class="card-pie">
										<div class="canvas-con">
											<div id="legend" class="legend-con mb-3 mt-3"></div>
											<div class="canvas-con-inner mb-4" id="canvas-pie">
												<canvas id="pieSummary" class="donutShadow overflow-hidden"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-8 col-lg-8 col-md-12">
								<div class="card overflow-hidden">
									<div class="card-body" style="padding:5px;">
										<div class="row">
											<div class="col-xl-4 col-lg-4 col-md-12">
												<div class="mini-stat-summary clearfix rounded" style="background:#1E9C57">
													<div class="row">
														<div class="col-xs-4 mr-1 ml-2">
															<div class="d-flex flex-row text-center">
																<div class="bd-highlight">
																	<img src="<?=base_url()?>assets/images/ICON/img_wa.png"
																		style="height:50px">
																</div>
															</div>
															<div class="d-flex">
																<div
																	class="mt-2 ml-1 text-white font10 font-weight-extrabold">
																	Whatsapp</div>
															</div>
														</div>
														<div class="col-sm-auto mb-2">
															<h6 class="text-white font-weight-normal font10">Unique Customer
															</h6>
															<h6 class="text-white font-weight-normal font10">Total Session
															</h6>
															<h6 class="text-white font-weight-normal font10">Message In</h6>
															<h6 class="text-white font-weight-normal font10">Message Out</h6>
															<h6 class="text-white font-weight-normal font10">SLA</h6>
														</div>
														<div class="col-sm-auto text-right">
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">100.0%</h6>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xl-4 col-lg-4 col-md-12">
												<div class="mini-stat-summary clearfix rounded" style="background:#B70709">
													<div class="row">
														<div class="col-xs-4 mr-1 ml-2">
															<div class="d-flex flex-row text-center">
																<div class="bd-highlight">
																	<img src="<?=base_url()?>assets/images/ICON/img_email.png"
																		style="height:50px">
																</div>
															</div>
															<div class="d-flex">
																<div
																	class="mt-2 ml-1 text-white font10 font-weight-extrabold">
																	Email</div>
															</div>
														</div>
														<div class="col-sm-auto mb-2">
															<h6 class="text-white font-weight-normal font10">Unique Customer
															</h6>
															<h6 class="text-white font-weight-normal font10">Total Session
															</h6>
															<h6 class="text-white font-weight-normal font10">Message In</h6>
															<h6 class="text-white font-weight-normal font10">Message Out</h6>
															<h6 class="text-white font-weight-normal font10">SLA</h6>
														</div>
														<div class="col-sm-auto text-right">
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">100.0%</h6>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xl-4 col-lg-4 col-md-12">
												<div class="mini-stat-summary clearfix rounded" style="background:#040C55">
													<div class="row">
														<div class="col-xs-4 mr-1 ml-2">
															<div class="d-flex flex-row text-center">
																<div class="bd-highlight">
																	<img src="<?=base_url()?>assets/images/ICON/img_fb.png"
																		style="height:50px">
																</div>
															</div>
															<div class="d-flex">
																<div
																	class="mt-2 ml-1 text-white font10 font-weight-extrabold">
																	Facebook</div>
															</div>
														</div>
														<div class="col-sm-auto mb-2">
															<h6 class="text-white font-weight-normal font10">Unique Customer
															</h6>
															<h6 class="text-white font-weight-normal font10">Total Session
															</h6>
															<h6 class="text-white font-weight-normal font10">Message In</h6>
															<h6 class="text-white font-weight-normal font10">Message Out</h6>
															<h6 class="text-white font-weight-normal font10">SLA</h6>
														</div>
														<div class="col-sm-auto text-right">
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">100.0%</h6>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xl-4 col-lg-4 col-md-12">
												<div class="mini-stat-summary clearfix rounded" style="background:#2D86AE">
													<div class="row">
														<div class="col-xs-4 mr-1 ml-2">
															<div class="d-flex flex-row text-center">
																<div class="bd-highlight">

																	<img src="<?=base_url()?>assets/images/ICON/img_twitter.png"
																		style="height:50px">

																</div>
															</div>
															<div class="d-flex">
																<div
																	class="mt-2 ml-1 text-white font10 font-weight-extrabold">
																	Twitter</div>
															</div>
														</div>
														<div class="col-sm-auto mb-2">
															<h6 class="text-white font-weight-normal font10">Unique Customer
															</h6>
															<h6 class="text-white font-weight-normal font10">Total Session
															</h6>
															<h6 class="text-white font-weight-normal font10">Message In</h6>
															<h6 class="text-white font-weight-normal font10">Message Out</h6>
															<h6 class="text-white font-weight-normal font10">SLA</h6>
														</div>
														<div class="col-sm-auto text-right">
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">100.0%</h6>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xl-4 col-lg-4 col-md-12">
												<div class="mini-stat-summary clearfix rounded" style="background:#310C96">
													<div class="row">
														<div class="col-xs-4 mr-1 ml-2">
															<div class="d-flex flex-row text-center">
																<div class="bd-highlight">
																	<img src="<?=base_url()?>assets/images/ICON/img_twitter_dm.png"
																		style="height:50px">
																</div>
															</div>
															<div class="d-flex">
																<div
																	class="mt-2 ml-1 text-white font10 font-weight-extrabold">
																	Twitter DM</div>
															</div>
														</div>
														<div class="col-sm-auto mb-2">
															<h6 class="text-white font-weight-normal font10">Unique Customer
															</h6>
															<h6 class="text-white font-weight-normal font10">Total Session
															</h6>
															<h6 class="text-white font-weight-normal font10">Message In</h6>
															<h6 class="text-white font-weight-normal font10">Message Out</h6>
															<h6 class="text-white font-weight-normal font10">SLA</h6>
														</div>
														<div class="col-sm-auto text-right">
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">100.0%</h6>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xl-4 col-lg-4 col-md-12">
												<div class="mini-stat-summary clearfix rounded" style="background:#A650D9">
													<div class="row">
														<div class="col-xs-4 mr-1 ml-2">
															<div class="d-flex flex-row text-center">
																<div class="bd-highlight">
																	<img src="<?=base_url()?>assets/images/ICON/img_ig.png"
																		style="height:50px">
																</div>
															</div>
															<div class="d-flex">
																<div
																	class="mt-2 ml-1 text-white font10 font-weight-extrabold">
																	Instagram</div>
															</div>
														</div>
														<div class="col-sm-auto mb-2">
															<h6 class="text-white font-weight-normal font10">Unique Customer
															</h6>
															<h6 class="text-white font-weight-normal font10">Total Session
															</h6>
															<h6 class="text-white font-weight-normal font10">Message In</h6>
															<h6 class="text-white font-weight-normal font10">Message Out</h6>
															<h6 class="text-white font-weight-normal font10">SLA</h6>
														</div>
														<div class="col-sm-auto text-right">
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">100.0%</h6>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xl-4 col-lg-4 col-md-12">
												<div class="mini-stat-summary clearfix rounded" style="background:#4BC057">
													<div class="row">
														<div class="col-xs-4 mr-1 ml-2">
															<div class="d-flex flex-row text-center">
																<div class="bd-highlight">
																	<img src="<?=base_url()?>assets/images/ICON/img_line.png"
																		style="height:50px">
																</div>
															</div>
															<div class="d-flex">
																<div
																	class="mt-2 ml-1 text-white font10 font-weight-extrabold">
																	Line</div>
															</div>
														</div>
														<div class="col-sm-auto mb-2">
															<h6 class="text-white font-weight-normal font10">Unique Customer
															</h6>
															<h6 class="text-white font-weight-normal font10">Total Session
															</h6>
															<h6 class="text-white font-weight-normal font10">Message In</h6>
															<h6 class="text-white font-weight-normal font10">Message Out</h6>
															<h6 class="text-white font-weight-normal font10">SLA</h6>
														</div>
														<div class="col-sm-auto text-right">
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">100.0%</h6>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xl-4 col-lg-4 col-md-12">
												<div class="mini-stat-summary clearfix rounded" style="background:#443031">
													<div class="row">
														<div class="col-xs-4 mr-1 ml-2">
															<div class="d-flex flex-row text-center">
																<div class="bd-highlight">
																	<img src="<?=base_url()?>assets/images/ICON/img_telegram.png"
																		style="height:50px">
																</div>
															</div>
															<div class="d-flex">
																<div
																	class="mt-2 ml-1 text-white font10 font-weight-extrabold">
																	Telegram</div>
															</div>
														</div>
														<div class="col-sm-auto mb-2">
															<h6 class="text-white font-weight-normal font10">Unique Customer
															</h6>
															<h6 class="text-white font-weight-normal font10">Total Session
															</h6>
															<h6 class="text-white font-weight-normal font10">Message In</h6>
															<h6 class="text-white font-weight-normal font10">Message Out</h6>
															<h6 class="text-white font-weight-normal font10">SLA</h6>
														</div>
														<div class="col-sm-auto text-right">
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">100.0%</h6>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xl-4 col-lg-4 col-md-12">
												<div class="mini-stat-summary clearfix rounded" style="background:#EB431E">
													<div class="row">
														<div class="col-xs-4 mr-1 ml-2">
															<div class="d-flex flex-row text-center">
																<div class="bd-highlight">
																	<img src="<?=base_url()?>assets/images/ICON/img_voice.png"
																		style="height:50px">
																</div>
															</div>
															<div class="d-flex">
																<div
																	class="mt-2 ml-1 text-white font10 font-weight-extrabold">
																	Voice</div>
															</div>
														</div>
														<div class="col-sm-auto mb-2">
															<h6 class="text-white font-weight-normal font10">Unique Customer
															</h6>
															<h6 class="text-white font-weight-normal font10">Total Session
															</h6>
															<h6 class="text-white font-weight-normal font10">Message In</h6>
															<h6 class="text-white font-weight-normal font10">Message Out</h6>
															<h6 class="text-white font-weight-normal font10">SLA</h6>
														</div>
														<div class="col-sm-auto text-right">
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">100.0%</h6>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xl-4 col-lg-4 col-md-12">
												<div class="mini-stat-summary clearfix rounded" style="background :#040C55 ">
													<div class="row">
														<div class="col-xs-4 mr-1 ml-2">
															<div class="d-flex flex-row text-center">
																<div class="bd-highlight">
																	<img src="<?=base_url()?>assets/images/ICON/img_chatbot.png"
																		style="height:50px">
																</div>
															</div>
															<div class="d-flex">
																<div
																	class="mt-2 ml-1 text-white font10 font-weight-extrabold">
																	Chatbot</div>
															</div>
														</div>
														<div class="col-sm-auto mb-2">
															<h6 class="text-white font-weight-normal font10">Unique Customer
															</h6>
															<h6 class="text-white font-weight-normal font10">Total Session
															</h6>
															<h6 class="text-white font-weight-normal font10">Message In</h6>
															<h6 class="text-white font-weight-normal font10">Message Out</h6>
															<h6 class="text-white font-weight-normal font10">SLA</h6>
														</div>
														<div class="col-sm-auto text-right">
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">100.0%</h6>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xl-4 col-lg-4 col-md-12">
												<div class="mini-stat-summary clearfix rounded" style="background:#131D41">
													<div class="row">
														<div class="col-xs-4 mr-1 ml-2">
															<div class="d-flex flex-row text-center">
																<div class="bd-highlight">
																	<img src="<?=base_url()?>assets/images/ICON/img_messenger.png"
																		style="height:50px">
																</div>
															</div>
															<div class="d-flex">
																<div
																	class="mt-2 ml-1 text-white font10 font-weight-extrabold">
																	Messenger</div>
															</div>
														</div>
														<div class="col-sm-auto mb-2">
															<h6 class="text-white font-weight-normal font10">Unique Customer
															</h6>
															<h6 class="text-white font-weight-normal font10">Total Session
															</h6>
															<h6 class="text-white font-weight-normal font10">Message In</h6>
															<h6 class="text-white font-weight-normal font10">Message Out</h6>
															<h6 class="text-white font-weight-normal font10">SLA</h6>
														</div>
														<div class="col-sm-auto text-right">
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">100.0%</h6>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xl-4 col-lg-4 col-md-12">
												<div class="mini-stat-summary clearfix rounded" style="background:#8F8F8F">
													<div class="row">
														<div class="col-xs-4 mr-1 ml-2">
															<div class="d-flex flex-row text-center">
																<div class="bd-highlight">
																	<img src="<?=base_url()?>assets/images/ICON/img_live_chat.png"
																		style="height:50px">
																</div>
															</div>
															<div class="d-flex">
																<div
																	class="mt-2 ml-1 text-white font10 font-weight-extrabold">
																	Live Chat</div>
															</div>
														</div>
														<div class="col-sm-auto mb-2">
															<h6 class="text-white font-weight-normal font10">Unique Customer
															</h6>
															<h6 class="text-white font-weight-normal font10">Total Session
															</h6>
															<h6 class="text-white font-weight-normal font10">Message In</h6>
															<h6 class="text-white font-weight-normal font10">Message Out</h6>
															<h6 class="text-white font-weight-normal font10">SLA</h6>
														</div>
														<div class="col-sm-auto text-right">
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">100.0%</h6>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xl-4 col-lg-4 col-md-12">
												<div class="mini-stat-summary clearfix rounded" style="background:#6CCCCA">
													<div class="row">
														<div class="col-xs-4 mr-1 ml-2">
															<div class="d-flex flex-row text-center">
																<div class="bd-highlight">
																	<img src="<?=base_url()?>assets/images/ICON/img_sms.png"
																		style="height:50px">
																</div>
															</div>
															<div class="d-flex">
																<div
																	class="mt-2 ml-1 text-white font10 font-weight-extrabold">
																	SMS</div>
															</div>
														</div>
														<div class="col-sm-auto mb-2">
															<h6 class="text-white font-weight-normal font10">Unique Customer
															</h6>
															<h6 class="text-white font-weight-normal font10">Total Session
															</h6>
															<h6 class="text-white font-weight-normal font10">Message In</h6>
															<h6 class="text-white font-weight-normal font10">Message Out</h6>
															<h6 class="text-white font-weight-normal font10">SLA</h6>
														</div>
														<div class="col-sm-auto text-right">
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">1200</h6>
															<h6 class="text-white font10">100.0%</h6>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php $this->load->view('temp/footer');?>
					<!-- <script src="<?= base_url()?>assets/public/js/app/api.js"></script> -->
					<script src="<?= base_url()?>assets/public/js/app/app-summary-traffic.js"></script>