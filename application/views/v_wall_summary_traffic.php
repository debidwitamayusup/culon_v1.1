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
		                                <h4 class="page-title"><i class="fe fe-grid mr-1"></i>Wallboard</h4>
		                            </li>
		                            <li class="breadcrumb-item active mt-2" aria-current="page">Summary Traffic
		                            </li>
		                        </ol>
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