<div class=" app-content2 bg-white">
    <div style="padding:50px 80px; margin-top:50px; margin-left:63px">
        <div class="row">
            <div class="col-md-7 text-center mt-9">
                <img src="<?=base_url()?>assets/images/brand/img_edit_profile.png" class="img-profile">
            </div>
            <div class="col-md-5">
                <div class="card-group mb-0">
                    <div class="card-custom-profile">
                        <div class="text-center mb-2 mt-6">
                            <img src="<?php echo base_url();?>assets/images/brand/logo_infomedia.png" class=""
                                style="max-width: 69% !important;" alt="">
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-2">
                                <img src="<?=base_url()?>public/user/unknown-avatar.jpg" style="border-radius:50%; width:50%;">
                                <h6><a class="font12 mt-2" style="color:#3c8ae2" href="#">Edit Photo Profile</a></h6>
                            </div>
                            <!-- username -->
                            <div class="col-sm-auto mb-3">
                                <div class="input-group border-input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text border-input">
                                            <i class="fa fa-user tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input type="text" class="form-control border-input2 font12" id="username"
                                        placeholder="username" name="username">
                                </div>
                            </div>

                            <!-- phone number-->
                            <div class="col-sm-auto mb-3">
                                <div class="input-group border-input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text border-input">
                                            <i class="fa fa-phone tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input type="text" class="form-control border-input2 font12" id="phone_number"
                                        placeholder="+628xx xxxx xxxx" name="phone_number">
                                </div>
                            </div>

                            <!-- email -->
                            <div class="col-sm-auto mb-3">
                                <div class="input-group border-input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text border-input">
                                            <i class="fa fa-envelope tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input type="text" class="form-control border-input2 font12" id="email"
                                        placeholder="yourname@infomedia.co.id" name="email">
                                </div>
                            </div>

                            <!-- password -->
                            <div class="col-sm-auto">
                                <div class="input-group border-input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text border-input">
                                            <i class="fa fa-lock tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input type="password" class="form-control border-input2 font12" id="password"
                                        placeholder="Password" name="password">
                                </div>
                            </div>

                            <div class="text-center mb-5 mt-5">
                                <button type="submit" class="btn btn-sign text-white mr-5"
                                    style="border-radius:8px !important;" id="btn-login">Cancel</button>
                                    <button type="submit" class="btn btn-sign text-white ml-5"
                                    style="border-radius:8px !important;" id="btn-login">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('temp/footer');?>