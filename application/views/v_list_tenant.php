<div class=" app-content">
	<div class="side-app">
		<div class="page-header d-flex bd-highlight">
			<div class="flex-grow-1 bd-highlight">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">
						<h4 class="page-title"><img src="<?=base_url()?>assets/images/brand/icon-admin3.png" class="side-menu__icon-custom mr-1" style="padding:8px !important">Administration</h4>
					</li>
					<li class="breadcrumb-item active mt-2" aria-current="page">Tenant</li>
				</ol>
			</div>
			<!-- <div class="bd-highlight" id="layanan_name_parent">
				<select class="form-control-sm select-tenant" style="border-color:#efecec">
					<option value="1">All Tenant</option>
				</select>
			</div> -->
		</div>

		<div class="row margin0-4">
			<div class="col-md-12 col-lg-12 col-xl-12">
				<div class="card">
					<div class="card-header-small">
						<h5 class="card-title-small card-pt10">Data Tenant</h5>
					</div>
					<div class="d-flex bd-highlight">
						<div class="ml-auto p-2 bd-highlight">
							<a href="<?=base_url()?>admin/add_tenant" class="btn btn-sm btn-red" style="border-radius: 8px;"><i
									class="fa fa-plus-circle mr-1"></i>Add New</a>
						</div>
					</div>
					<div class="table-responsive" style="padding:3px 10px 10px 10px;">
						<table id="tableListTenant" class="table table-sm table-striped table-bordered fontNunito12"
							width="100%">
							<thead class="text-white bg-head">
								<tr>
									<td class="border-bottom-0 text-center" width="2%">No</td>
									<td class="border-bottom-0 text-center" width="30%">Tenant ID</td>
									<td class="border-bottom-0 text-center" width="40%">Tenant Name</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center">1</td>
									<td class="text-center">1US005</td>
									<td clas="text-left">Telkomsel</td>
								</tr>
								<tr>
									<td class="text-center">2</td>
									<td class="text-center">1US005</td>
									<td clas="text-left">Telkomsel</td>
                                </tr>
                                <tr>
									<td class="text-center">3</td>
									<td class="text-center">1US005</td>
									<td clas="text-left">Telkomsel</td>
                                </tr>
                                <tr>
									<td class="text-center">4</td>
									<td class="text-center">1US005</td>
									<td clas="text-left">Telkomsel</td>
                                </tr>
                                <tr>
									<td class="text-center">5</td>
									<td class="text-center">1US005</td>
									<td clas="text-left">Telkomsel</td>
                                </tr>
                                <tr>
									<td class="text-center">6</td>
									<td class="text-center">1US005</td>
									<td clas="text-left">Telkomsel</td>
                                </tr>
                                <tr>
									<td class="text-center">7</td>
									<td class="text-center">1US005</td>
									<td clas="text-left">Telkomsel</td>
                                </tr>
                                <tr>
									<td class="text-center">8</td>
									<td class="text-center">1US005</td>
									<td clas="text-left">Telkomsel</td>
                                </tr>
                                <tr>
									<td class="text-center">9</td>
									<td class="text-center">1US005</td>
									<td clas="text-left">Telkomsel</td>
                                </tr>
                                <tr>
									<td class="text-center">10</td>
									<td class="text-center">1US005</td>
									<td clas="text-left">Telkomsel</td>
                                </tr>
                                <tr>
									<td class="text-center">11</td>
									<td class="text-center">1US005</td>
									<td clas="text-left">Telkomsel</td>
                                </tr>
                                <tr>
									<td class="text-center">12</td>
									<td class="text-center">1US005</td>
									<td clas="text-left">Telkomsel</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
	<?php $this->load->view('temp/footer');?>
	<script src="<?=base_url()?>assets/public/js/app/app-admin-tenant.js"></script>