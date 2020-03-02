<div class=" app-content">
	<div class="side-app">
		<div class="page-header d-flex bd-highlight">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">
					<h4 class="page-title"><i class="fe fe-monitor mr-1"></i>Wallboard</h4>
				</li>
				<li class="breadcrumb-item active mt-2" aria-current="page">Summary Status Today (Non Close)
				</li>
			</ol>
			<div class="d-flex bd-highlight">
				<!-- <div class="ml-auto p-2 bd-highlight mt-3 h6">Layanan </div>
				<div class="p-2 bd-highlight">
					<select class="form-control" id="channel_name">
						<option value="#">Layanan</option>
					</select>
				</div> -->
			</div>
		</div>

		<div class="row mt-2">
			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="card overflow-hidden">
					<div class="card-header">
						<h5 class="card-title-small card-pt10">Summary Traffic</h5>
					</div>
					<div class="card-body" id="cardNonClose">
						<!-- <div class="row mt-2">
		                                    <div class="col-md-12 col-lg-3 col-xl-3 text-center">
		                                        <div class="card-custom-ticket overflow-hidden">
		                                            <div class="card-header-small bg-red">
		                                                <h6 class="text-white card-body">New</h6>
		                                            </div>
		                                            <div class="card-body">
		                                                <h2 class="mb-4 mt-3 num-font"> 200</h2>
		                                                <span class="text-muted mb-5"></span>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="col-md-12 col-lg-3 col-xl-3 text-center">
		                                        <div class="card-custom-ticket overflow-hidden">
		                                            <div class="card-header-small bg-red">
		                                                <h6 class="text-white card-body">Open</h6>
		                                            </div>
		                                            <div class="card-body">
		                                                <h2 class="mb-4 mt-3 num-font">200</h2>
		                                                <span class="text-muted mb-5"></span>
		                                            </div>
		                                        </div>
		                                    </div>

		                                    <div class="col-md-12 col-lg-3 col-xl-3 text-center">
		                                        <div class="card-custom-ticket overflow-hidden">
		                                            <div class="card-header-small bg-red">
		                                                <h6 class="card-body text-white">Reopen</h6>
		                                            </div>
		                                            <div class="card-body">
		                                                <h2 class="mb-4 mt-3 num-font">200</h2>
		                                                <span class="text-muted mb-5"></span>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="col-md-12 col-lg-3 col-xl-3 text-center">
		                                        <div class="card-custom-ticket overflow-hidden">
		                                            <div class="card-header-small bg-red">
		                                                <h6 class="card-body text-white">Reprocess</h6>
		                                            </div>
		                                            <div class="card-body">
		                                                <h2 class="mb-4 mt-3 num-font">200</h2>
		                                                <span class="text-muted mb-5"></span>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="row mt-2 mb-2">
		                                    <div class="col-md-12 col-lg-3 col-xl-3 text-center">
		                                        <div class="card-custom-ticket overflow-hidden">
		                                            <div class="card-header-small bg-red">
		                                                <h6 class="card-body text-white">Pending</h6>
		                                            </div>
		                                            <div class="card-body">
		                                                <h2 class="mb-4 mt-3 num-font">200</h2>
		                                                <span class="text-muted mb-5"></span>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="col-md-12 col-lg-3 col-xl-3 text-center">
		                                        <div class="card-custom-ticket overflow-hidden">
		                                            <div class="card-header-small bg-red">
		                                                <h6 class="card-body text-white">Reject</h6>
		                                            </div>
		                                            <div class="card-body">
		                                                <h2 class="mb-4 mt-3 num-font">200</h2>
		                                                <span class="text-muted mb-5"></span>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="col-md-12 col-lg-3 col-xl-3 text-center">
		                                        <div class="card-custom-ticket overflow-hidden">
		                                            <div class="card-header-small bg-red">
		                                                <h6 class="card-body text-white">Reassign</h6>
		                                            </div>
		                                            <div class="card-body">
		                                                <h2 class="mb-4 mt-3 num-font">200</h2>
		                                                <span class="text-muted mb-5"></span>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="col-md-12 col-lg-3 col-xl-3 text-center">
		                                        <div class="card-custom-ticket overflow-hidden">
		                                            <div class="card-header-small bg-red">
		                                                <h6 class="card-body text-white">Preclose</h6>
		                                            </div>
		                                            <div class="card-body">
		                                                <h2 class="mb-4 mt-3 num-font">200</h2>
		                                                <span class="text-muted mb-5"></span>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div> -->
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="card overflow-hidden">
					<div class="card-header-small">
						<h5 class="card-title-small card-pt10">Operation Performance</h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table
								class="table card-table table-bordered table-striped table-vcenter table-hover fontNunito12"
								style="font-size:12px; width:100%;" id="tableTicket">
								<thead class="text-center text-white bg-head">
									<tr>
										<td>No</td>
										<td width="30%">Unit</td>
										<td>New</td>
										<td>Open</td>
										<td>Reprocess</td>
										<td>Pending</td>
										<td>Reopen</td>
										<td>Reject</td>
										<td>Preclose</td>
										<td>Reassign</td>
										<td>Total</td>
									</tr>
								</thead>
								<tbody class="table-sm">

								</tbody>
								<tfoot class="text-center font-weight-extrabold bg-total">
									<tr>
										<td colspan="2"></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('temp/footer');?>
	<script src="<?=base_url()?>assets/public/js/app/app-wall-status-nonClose.js"></script>