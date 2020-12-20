<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex bd-highlight">
            <div class="flex-grow-1 bd-highlight">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <h4 class="page-title"><img src="<?=base_url()?>assets/images/brand/icon-admin3.png"
                                class="side-menu__icon-custom mr-1" style="padding:8px !important">Administration</h4>
                    </li>
                    <li class="breadcrumb-item active mt-2" aria-current="page">User</li>
                </ol>
            </div>
        </div>

        <div class="row margin0-4">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Add New User</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="d-flex">
                                    <div class="text-right">
                                        <img src="<?=base_url()?>public/user/unknown-avatar.jpg"
                                            class="rounded-circle mt-7" style="width:50%">
                                    </div>
                                    <div class="upload-file" style="margin-top: 11rem; margin-left:-30px">
                                        <label for="file-input">
                                            <i class="fa fa-2x fa-plus-circle text-red"></i>
                                        </label>
                                        <input id="file-input" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group error" id="divUsername">
                                    <label for="labelUsername">User Name</label>
                                    <input type="text" class="form-control box-shadow-input" id="inputUsername"
                                        placeholder="User Name">
                                    <div class="error-message" id="errorUsername">Username tidak boleh kosong atau lebih dari 20 karakter</div>
                                </div>
                                <div class="form-group error" id="divNamaKaryawan">
                                    <label for="labelNamaKaryawan">Nama Karyawan</label>
                                    <input type="text" class="form-control box-shadow-input" id="inputNamaKaryawan"
                                        placeholder="Nama Karyawan">
                                    <div class="error-message" id="errorNamaKaryawan">Nama tidak boleh kosong atau lebih dari 50 karakter</div>
                                </div>
                                <div class="form-group error" id="divNomorInduk">
                                    <label for="labelNamaKaryawan">Nomor Induk Karyawan</label>
                                    <input type="text" class="form-control box-shadow-input" id="inputNomorInduk"
                                        placeholder="Nomor Induk Karyawan">
                                    <div class="error-message" id="errorNomorInduk">Nomor Induk tidak boleh kosog atau lebih dari 10 karakter</div>
                                </div>
                                <div class="form-group">
                                    <label for="labelJabatan">Jabatan</label>
                                    <div class="input-group border-input-group w-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-input bg-gray text-white">
                                                <i class="fa fa-handshake tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div> <select class="form-control" id="inputJabatan">
                                            <option value="">--</option>
                                        </select>
                                    </div>
                                </div>
                                <label for="labelTempatLahir">Tempat Lahir Karyawan</label>
                                <input type="text" class="form-control box-shadow-input" id="inputTempatLahir" placeholder="Tempat Lahir Karyawan">

                                <div class="form-group error" id="divNamaLeader" style="position: inherit;">
                                    <label for="labelNamaLeader">Nama Leader</label>
                                    <div class="autocomplete">
                                        <input type="text" class="form-control box-shadow-input" id="inputNamaLeader"
                                        placeholder="NamaLeader">
                                    </div>  
                                    <!-- <div class="error-message" id="errorNomorInduk">Nama Leader Tidak Boleh Kosong</div> -->
                                </div>
                                <div class="form-group error" id="divIdLeader">
                                    <label for="labelIdLeader">ID Leader</label>
                                    <input type="text" class="form-control box-shadow-input" id="inputIdLeader"
                                        placeholder="ID Leader">
                                    <!-- <div class="error-message" id="errorNomorInduk">Nama tidak boleh kosong atau lebih dari 50 karakter</div> -->
                                </div>

                                <label for="labelTglLahir">Tanggal Lahir Karyawan</label>
                                <input type="text" class="form-control box-shadow-input" id="inputTglLahir" placeholder="YYYY-MM-DD">

                                <div class="form-group">
                                    <label for="labelJenisKelamin">Jenis Kelamin</label>
                                    <div class="input-group border-input-group w-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-input bg-gray text-white">
                                                <i class="fa fa-handshake tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div> <select class="form-control" id="inputJenisKelamin">
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="labelAgama">Agama</label>
                                    <div class="input-group border-input-group w-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-input bg-gray text-white">
                                                <i class="fa fa-handshake tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div> <select class="form-control" id="inputAgama">
                                            <option value="Islam">Islam</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Khonghuchu">Khonghuchu</option>
                                        </select>
                                    </div>
                                </div>

                                <label for="labelnik">NIK KTP</label>
                                <input type="text" class="form-control box-shadow-input" id="inputNik" placeholder="NIK KTP">

                                <label for="labelNoKK">No. Kartu Keluarga</label>
                                <input type="text" class="form-control box-shadow-input" id="inputKK" placeholder="No. Kartu Keluarga">

                                <div class="form-group">
                                    <label for="labelKewarganegaraan">Kewarganegaraan</label>
                                    <div class="input-group border-input-group w-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-input bg-gray text-white">
                                                <i class="fa fa-handshake tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div> <select class="form-control" id="inputKewarganegaraan">
                                            <option value="">--</option>
                                            <option value="wni">WNI</option>
                                            <option value="wna">WNA</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="labelStatus">Status</label>
                                    <div class="input-group border-input-group w-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-input bg-gray text-white">
                                                <i class="fa fa-handshake tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div> <select class="form-control" id="inputStatus">
                                            <option value="">--</option>
                                            <option value="kawin">Kawin</option>
                                            <option value="belum kawin">Belum Kawin</option>
                                            <option value="janda">Janda</option>
                                            <option value="duda">Duda</option>
                                        </select>
                                    </div>
                                </div>

                                <label for="labelAlamatKTP">Alamat KTP</label>
                                <input type="textarea" class="form-control box-shadow-input" id="inputAlamatKTP" placeholder="Alamat Sesuai KTP">

                                <label for="labelAlamatSekarang">Alamat Sekarang</label>
                                <input type="textarea" class="form-control box-shadow-input" id="inputAlamatSekarang" placeholder="Alamat Saat Ini">

                                <label for="labelNoTelp">No. Telp</label>
                                <input type="text" class="form-control box-shadow-input" id="inputNoTelp" placeholder="08XXX">

                                <label for="labelBPJSTK">No. BPJSTK</label>
                                <input type="text" class="form-control box-shadow-input" id="inputBPJSTK" placeholder="No. BPJSTK">

                                <label for="labelBPJS">No. BPJS</label>
                                <input type="text" class="form-control box-shadow-input" id="inputBPJS" placeholder="No. BPJS">

                                <label for="labelNPWP">NPWP</label>
                                <input type="text" class="form-control box-shadow-input" id="inputNPWP" placeholder="No. NPWP">

                                <label for="labelTglGabung">Tanggal Gabung</label>
                                <input type="text" class="form-control box-shadow-input" id="inputTglGabung" placeholder="YYYY-MM-DD">

                                <div class="fPoppins float-right mt-2">
                                    <button type="button" class="btn btn-grey2 btn-sm mr-2" id="btn-cancel">Cancel</button>
                                    <button type="button" class="btn btn-grey2 btn-sm mr-2" id="btn-add">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php $this->load->view('temp/footer');?>
    <script src="<?=base_url()?>assets/public/js/app/app-add-user.js"></script>