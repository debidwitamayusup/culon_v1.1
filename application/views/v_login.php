<!-- Title -->
<title>Sign in</title>
</head>
<body style="background-color : #f6f2f2">
    <input type="hidden" id="base_url" name="base_url" value="<?php echo base_url()?>">
    <!-- Global Loader-->
    <div id="global-loader"><img src="<?php echo base_url();?>assets/images/svgs/loader.svg" alt="loader"></div>

    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col  mx-auto">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="card-group mb-0">
                                <div class="card-cust">
                                    <div class="text-center mb-5">
                                        <img src="<?php echo base_url();?>assets/images/brand/logo_infomedia.png"
                                            class=""style="max-width: 69% !important;" alt="">
                                    </div>
                                    <div class="card-body">
                                        <h6 class="mb-3">Sign in to continue</h6>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="username"
                                                placeholder="username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group ">
                                            <select class="form-control select2 custom-select" id="select-tenant-id">
                                                <option values="">--Tenant--</option>
                                                <option value="oct_pegadaian">oct_pegadaian</option>
                                                <option value="oct_posindo">oct_posindo</option>
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-sign text-white" style="border-radius:20px !important;" id="btn-login">Sign
                                                in</button>
                                        </div>
                                        <div class="text-center text-muted mt-3 mb-3">
                                            <a href="<?=base_url()?>main/forgot">Forgot Password?</a>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-3">
                                                <div class="dropdown-divider"></div>
                                            </div>
                                            <div class="col-md-auto">
                                                or
                                            </div>
                                            <div class="col-md-3">
                                                <div class="dropdown-divider"></div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-3">
                                                <div class="widget-user-image">
                                                    <div class="plan-icon-sign text-center">
                                                        <i class="fab fa-facebook text-white"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="widget-user-image">
                                                    <div class="plan-icon-sign text-center">
                                                        <i class="fab fa-google text-white"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center text-muted mb-3">
                                            Don't have an account?
                                        </div>
                                        <div class="text-center">
                                            <a class="text-sign" href="<?=base_url()?>main/signup">Sign up</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>