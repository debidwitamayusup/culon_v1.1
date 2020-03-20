<div class=" app-content">
    <div class="side-app">
        <div class="page-header d-flex bd-highlight">
            <div class="flex-grow-1 bd-highlight">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <h4 class="page-title"><img src="<?=base_url()?>assets/images/brand/icon-admin3.png"
                                class="side-menu__icon-custom mr-1" style="padding:8px !important">Administration</h4>
                    </li>
                    <li class="breadcrumb-item active mt-2" aria-current="page">Tenant</li>
                </ol>
            </div>
        </div>

        <div class="row margin0-4">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card" style="height:456px;">
                    <div class="card-header-small">
                        <h5 class="card-title-small card-pt10">Add Tenant</h5>
                    </div>
                    <div class="card-body" style="margin-top:76px;">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="d-flex" style="margin-left:70px;">
                                    <div class="text-center rounded-circle" style="background:#cdcdcd; height:120px; width:120px;">
                                        <img src="<?=base_url()?>public/tenant/tenant.png"
                                            class="mt-7" style="width:60%">
                                    </div>
                                    <div class="upload-file" style="margin-top: 5rem; margin-left:-21px">
                                        <label for="file-input">
                                            <i class="fa fa-2x fa-plus-circle text-red"></i>
                                        </label>
                                        <input id="file-input" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group error" id="idDiv">
                                    <label for="idUser">Tenant ID</label>
                                    <input type="text" class="form-control box-shadow-input" id="idUser"
                                        placeholder="ID">
                                    <div class="error-message" id="errorID">ID cannot be empty or more than 20 characters</div>
                                </div>
                                <div class="form-group error" id="nameDiv">
                                    <label for="nameUser">Tenant Name</label>
                                    <input type="text" class="form-control box-shadow-input" id="nameUser"
                                        placeholder="Tenant Name">
                                    <div class="error-message" id="errorName">Name cannot be empty or more than 50 characters</div>
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