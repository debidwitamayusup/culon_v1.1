<div class=" app-content2 bg-white">
    <div style="padding:50px 80px; margin-top:50px; margin-left:63px">
        <div class="row">
            <div class="col-md-7 text-center mt-7">
                <img src="<?=base_url()?>assets/images/brand/img_edit_profile.png" class="img-profile">
            </div>
            <div class="col-md-5">
                <div class="card-group mb-0">
                    <div class="card-custom-profile">
                        <div class="text-center mb-6 mt-8">
                            <img src="<?php echo base_url();?>assets/images/brand/logo_infomedia.png" class=""
                                style="max-width: 69% !important;" alt="">
                        </div>
                        <div class="card-body">

                            <h3 class="text-sign text-center font-weight-extrabold mb-3">Sign In</h3>
                            <div class="col-sm-auto mb-3">
                                <div class="input-group" style="box-shadow:1px 7px 18px #e0d9d9;">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text border-input">
                                            <i class="fa fa-user tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input type="text" class="form-control border-input2" id="username"
                                        placeholder="username" name="username">
                                </div>
                            </div>

                            <div class="col-sm-auto">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-lock tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input type="password" class="form-control" id="password"
                                        placeholder="Password" name="password">
                                </div>
                            </div>

                            <div class="text-center mb-8 mt-5">
                                <button type="submit" class="btn btn-sign text-white"
                                    style="border-radius:20px !important;" id="btn-login">Sign
                                    in</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('temp/footer');?>