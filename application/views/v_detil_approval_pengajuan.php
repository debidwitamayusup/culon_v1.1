<div class=" app-content">
	<div class="side-app">
		<div class="page-header d-flex bd-highlight">
			<div class="flex-grow-1 bd-highlight">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">
						<h4 class="page-title"><i class="fe fe-grid mr-1"></i>Layanan Karyawan</h4>
					</li>
					<li class="breadcrumb-item active mt-2" aria-current="page">Detil Pengajuan Cuti (Leader)</li>
				</ol>
			</div>
		</div>
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
                <div class="card overflow-hidden">
					<div class="card-header-small">
						<h5 class="card-title-small card-pt10 font-weight-extrabold">Approval</h5>
					</div>
					<div style="padding:10px 15px;">
                        <table class="table">
                            <!-- <tr>
                                <td>Approve Pemohon</td>
                                <td>(<span id="pemohon">Nama Pemohon</span>)</td>
                                <td>: Ya <input type="radio" disabled checked></td>
                                <td>Tidak <input type="radio" disabled></td>
                            </tr>
                            <tr>
                                <td>Approve Pengganti</td>
                                <td>(<span id="pengganti">Nama Pengganti</span>)</td>
                                <td>: Ya <input type="radio" id="yaPengganti" disabled></td>
                                <td>Tidak <input type="radio" id="tidakPengganti" disabled></td>
                            </tr> -->
                            <tr>
                                <td>Approve Leader</td>
                                <td>(<span id="leader">Nama Leader</span>)</td>
                                <td>: Ya <input name="approveLeader" class="approveLeader" type="radio" id="yaLeader" value="Y"></td>
                                <td>Tidak <input name="approveLeader" class="approveLeader" type="radio" id="tidakLeader" value="N"></td>
                            </tr>
                            <!-- <tr>
                                <td>Approve Kepala Bagian</td>
                                <td>(<span id="kabag">Nama Kepala Bagian</span>)</td>
                                <td>: Ya <input type="radio" id="yaKabag" disabled></td>
                                <td>Tidak <input type="radio" id="tidakKabag" disabled></td>
                            </tr> -->
                            <tr>
                                <td>Approve HRD</td>
                                <td>(<span id="hrd">Nama HRD</span>)</td>
                                <td>: Ya <input type="radio" id="yaHrd" disabled></td>
                                <td>Tidak <input type="radio" id="tidakHrd" disabled></td>
                            </tr>
                        </table>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-12">
				<div class="card overflow-hidden">
					<div class="card-header-small">
						<h5 class="card-title-small card-pt10 font-weight-extrabold">Form Isian Pengajuan Cuti</h5>
					</div>
					<div style="padding: 10px 15px;">
						<form>
							<div class="row" style="margin-right:0px; margin-left:-2px;">
								<div class="col-12">
									<label>Jenis Cuti</label>

									<div class="form-group row" style="margin-left: 1px; margin-right: 1px;">
										<!-- <input type="text" class="form-control select2" id="dropdownYear"/>	 -->
										<select class="form-control form-control-sm select2" id="dropdownCuti">
											<!-- <option value="1">2019</option>
															<option value="2">2020</option> -->
										</select>
									</div>
								</div>
								<!-- <div class="col"> -->
									<!-- <label>Durasi Cuti</label>
									<input class="form-control form-control-sm" type="number" id="durasiCuti"
										placeholder="nama" min="0" max="90"> -->
								<!-- </div> -->
							</div>
							<div class="row mb-4" style="margin-right:0px; margin-left:-2px;">
								<div class="col-sm-3">
								</div>
								<div class="col"><span id="sisaCuti"></span>
								</div>
								<div class="col-sm-3">Durasi Cuti:
								</div>
								<div class="col">
									<!-- <label>Durasi Cuti</label> -->
									<span><input class="form-control form-control-sm" type="number" id="durasiCuti"
								placeholder="Durasi Cuti" min="0" max="90"></span>
								</div>
							</div>

							<!-- <p>Sisa Cuti:</p><span><p id="sisaCuti">Sisa Cuti</p></span> -->

							<div class="row mb-4" style="margin-right:0px; margin-left:-2px;">
								<div class="col">
									<label>Tanggal Mulai Cuti</label>
									<input id="startDate" class="form-control form-control-sm fc-datepicker"
										placeholder="MM/DD/YYYY" type="text">
								</div>
								<div class="col">
									<label>Tanggal Selesai Cuti</label>
									<input id="endDate" class="form-control form-control-sm fc-datepicker"
										placeholder="MM/DD/YYYY" type="text">
								</div>
							</div>

							<div class="row mb-4" style="margin-right:0px; margin-left:-2px;">
								<div class="col">
									<label>ID Pekerja Pengganti</label>
									<input class="form-control form-control-sm" type="text" id="idPengganti"
										placeholder="ID Pengganti" readonly>
								</div>
								<div class="col">
									<label>Pekerja Pengganti</label>
									<div class="autocomplete">
										<input class="form-control form-control-sm" type="text" id="namaPengganti"
										placeholder="nama">
									</div>
								</div>
							</div>
							<label>Alasan</label>
							<textarea class="form-control" rows="3" id="alasan"></textarea>
						</form>
						
						<div class="row mb-4" style="margin-right:0px; margin-left:-2px;">
							<div class="col-xs-auto ml-1">
									<button class="btn btn-sm btn-primary" type="button" style="height:35px" id="btn-simpan"><i class="fas fa-save mr-2"></i>Simpan</button>
							</div>		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('temp/footer');?>
	<!-- <script src="<?= base_url()?>assets/public/js/app/api.js"></script> -->
	<!-- <script src="<?= base_url()?>assets/public/js/app/app-summary-traffic.js"></script> -->
	<script src="<?= base_url()?>assets/public/js/app/detil-approval-pengajuan-cuti.js"></script>