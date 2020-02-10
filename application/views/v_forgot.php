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
                                        <h6 class="mb-3 text-center">Forgot Password</h6>
                                        <div class="form-group">
                                            <label style="font-size:12px !important">Current Password</label>
                                            <input type="text" class="form-control" id="username"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size:12px !important">New Password</label>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size:12px !important">Verify Password</label>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Password">
                                        </div>
                                        <div class="text-center mt-5">
                                            <button type="submit" class="btn btn-sign text-white" style="border-radius:20px !important;" id="btn-login">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>