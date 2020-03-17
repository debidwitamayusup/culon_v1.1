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
                                    <div class="upload-file" style="margin-top: 11rem">
                                        <label for="file-input">
                                            <i class="fa fa-2x fa-plus-circle text-red"></i>
                                        </label>
                                        <input id="file-input" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group error" id="idDiv">
                                    <label for="idUser">User Name</label>
                                    <input type="text" class="form-control box-shadow-input" id="idUser"
                                        placeholder="User Name">
                                    <div class="error-message" id="errorID">Username cannot be empty or more than 20 characters</div>
                                </div>
                                <div class="form-group error" id="nameDiv">
                                    <label for="nameUser">Name</label>
                                    <input type="text" class="form-control box-shadow-input" id="nameUser"
                                        placeholder="Your Name">
                                    <div class="error-message" id="errorName">Name cannot be empty or more than 50 characters</div>
                                </div>
                                <div class=" form-group">
                                    <label for="levelUser">User Level</label>
                                    <div class="input-group border-input-group w-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-input bg-gray text-white">
                                                <i class="fa fa-user tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div> <select class="form-control" id="levelUser">
                                            <option value="manager">Manager</option>
                                            <option value="supervisor">Supervisor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Tenant">Tenant</label>
                                    <div class="input-group border-input-group w-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-input bg-gray text-white">
                                                <i class="fa fa-handshake tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div> <select class="form-control" id="tenantUser">
                                            <option value="">All Tenant</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group error" id="telpDiv">
                                    <label for="noTelp">No. Telp</label>
                                    <div class="input-group border-input-group w-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-input bg-gray text-white">
                                                <i class="fa fa-phone tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div> <input type="text" class="form-control form-control-sm" id="noTelp"
                                            placeholder="62813xxxxxxx">
                                    </div>
                                    <div class="error-message" id="errorTelp">phone number must only numbers and has 13 max length</div>
                                </div>
                                <div class="form-group error" id="emailDiv">
                                    <label for="Email">Email</label>
                                    <div class="input-group border-input-group w-100">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text border-input bg-gray text-white">
                                                <i class="fa fa-envelope tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div> <input type="text" class="form-control form-control-sm" id="Email"
                                            placeholder="example@infomedia.co.id">
                                    </div>
                                    <div class="error-message" id="errorEmail">format email not valid</div>
                                </div>
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
    <script src="<?=base_url()?>assets/public/js/app/app-admin-add-user.js"></script>