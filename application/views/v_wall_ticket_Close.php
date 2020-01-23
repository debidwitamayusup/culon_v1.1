		<!-- Global Loader-->
		<div id="global-loader"><img src="<?= base_url()?>assets/images/svgs/loader.svg" alt="loader"></div>
		<div class="page">
			<div class="page-main">
				<div class=" app-content mt-6">
					<div class="side-app">
						<div class="page-header d-flex bd-highlight">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active" aria-current="page">
									<h4 class="page-title"><i class="fe fe-grid mr-1"></i>Wallboard</h4>
								</li>
								<li class="breadcrumb-item active mt-2" aria-current="page">Summary Ticket (Close)
								</li>
							</ol>
						</div>
						<!---Next Rows---->
						<div class="row">
							<div class="col-md-12 col-lg-4">
								<div class="card">
									<div class="card-header-small bg-red">
										<h5 class="card-title-small card-pt10">Summary Status Ticket / Channel</h5>
									</div>
									<div class="card-body">
										<canvas id="barWallTicketClose"></canvas>

									</div>
								</div>
							</div>
							<div class="col-md-12 col-lg-8">
								<div class="card">
									<div class="card-header-small bg-red">
										<h5 class="card-title-small card-pt10">Summary Status Ticket Month</h5>
									</div>
									<div class="card-body">
										<div id="echartWeek" class="chartsh-ticket overflow-hidden"></div>
									</div>
								</div>
							</div>
						</div>
						<?php $this->load->view('temp/footer');?>
						<!--Plugin -->
						<script src="<?=base_url()?>assets/public/js/app/app-wall-ticket-Close.js"></script>