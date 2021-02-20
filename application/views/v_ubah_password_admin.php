<div class=" app-content">
	<div class="side-app">
		<div class="page-header d-flex bd-highlight">
			<div class="flex-grow-1 bd-highlight">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">
						<h4 class="page-title"><i class="fe fe-grid mr-1"></i>Layanan Karyawan</h4>
					</li>
					<li class="breadcrumb-item active mt-2" aria-current="page">User / Ubah Password</li>
				</ol>
			</div>
		</div>
			
		<!-- FORM 2 OPSI -->
		<div class="row" style="margin-right:0px; margin-left:-2px;">
			<div class="col-xl-6 col-lg-6 col-md-12">
				<div class="card overflow-hidden">
					<div class="card-header-small">
						<h5 class="card-title-small card-pt10 font-weight-extrabold">Data Singkat Karyawan</h5>
					</div>
					<div style="padding:10px 15px;">
						<form>
							<div class="row mb-4" style="margin-right:0px; margin-left:-2px;">
								<div class="col">
									<label>Nomor Induk Karyawan</label>
									<input class="form-control form-control-sm" type="text" id="id_karyawan"
										placeholder="id karyawan" readonly>
								</div>
								<div class="col">
									<label>Nama Karyawan</label>
									<input class="form-control form-control-sm" type="text" id="nama_karyawan"
										placeholder="nama" readonly>
								</div>
							</div>

							<div class="row mb-4" style="margin-right:0px; margin-left:-2px;">
								<div class="col">
									<label>Tanggal Bergabung</label>
									<input class="form-control form-control-sm" type="text" id="tgl_gabung"
										placeholder="Tanggal Bergabung" readonly>
								</div>
								<div class="col">
									<label>Lama Bergabung</label>
									<input class="form-control form-control-sm" type="text" id="lama_gabung"
										placeholder="Lama Bergabung" readonly>
								</div>
							</div>
							<div class="row mb-4" style="margin-right:0px; margin-left:-2px;">
								<div class="col">
									<label>ID Leader</label>
									<input class="form-control form-control-sm" type="text" id="id_leader"
										placeholder="ID Leader" readonly>
								</div>
								<div class="col">
									<label>Nama Leader</label>
									<input class="form-control form-control-sm" type="text" id="nama_leader"
										placeholder="Nama Leader" readonly>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-12">
				<div class="card overflow-hidden">
					<div class="card-header-small">
						<h5 class="card-title-small card-pt10 font-weight-extrabold">Ubah Password User</h5>
					</div>
					<div style="padding: 10px 15px;">
						<form>

							<div class="row mb-4" style="margin-right:0px; margin-left:-2px;">
								<div class="col">
									<label>New Password:</label>
									
								</div>
								<div class="col">
									<input id="password" class="form-control form-control-sm"
										placeholder="New Password" type="password">
								</div>
							</div>
								<button class="btn btn-sm btn-primary" type="button" style="height:35px"
                                    id="btn-submit"><i class="fas fa-download mr-2"></i>Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- CLOSE FORM OPSI 2 -->
	</div>
	<?php $this->load->view('temp/footer');?>
	<!-- <script src="<?= base_url()?>assets/public/js/app/api.js"></script> -->
	<!-- <script src="<?= base_url()?>assets/public/js/app/app-summary-traffic.js"></script> -->
	<script src="<?= base_url()?>assets/public/js/app/app-ubah-pass-admin.js"></script>