<div class=" app-content2 bg-white">
    <div style="padding:50px 80px; margin-top:50px; margin-left:63px">
        <div class="row">
            <div class="col-md-5">
                <div class="card-group mb-0">
                    <div class="card-custom-profile">
                        <div class="text-center mb-2 mt-6">
                            <img src="<?php echo base_url();?>assets/images/brand/logo_infomedia.png" class=""
                                style="max-width: 69% !important;" alt="">
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-2">
                                <h6 class="mt-7 mb-3" style="color:#ED1C24; font-size:17px">Change Password</h6>
                            </div>
                            <!-- username -->
                            <div class="col-sm-auto mb-3">
                                <div class="input-group border-input-group error" id="currentPwdDiv">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text border-input">
                                            <i class="fa fa-lock tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input type="password" class="form-control border-input2 font12" id="current-password"
                                        placeholder="Current Password" name="current_password">
                                </div>
                                <div class="error-message" id="error-current-password">Password is missmatch</div>
                            </div>

                            <!-- phone number-->
                            <div class="col-sm-auto mb-3">
                                <div class="input-group border-input-group error" id="newPwdDiv">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text border-input">
                                            <i class="fa fa-lock tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input type="password" class="form-control border-input2 font12" id="new-password"
                                        placeholder="New Password" name="new_password">
                                </div>
                                <div class="error-message" id="error-new-password">Password must contain at least one capital leter and number and more than 8 cracters</div>
                            </div>

                            <!-- password -->
                            <div class="col-sm-auto">
                                <div class="input-group border-input-group error" id="confirmPwdDiv">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text border-input">
                                            <i class="fa fa-lock tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input type="password" class="form-control border-input2 font12" id="confirm-password"
                                        placeholder="Confirm New Password" name="confirm-password">
                                </div>
                                <div class="error-message" id="error-confirm-password">Password Not Match</div>
                            </div>

                            <div class="text-center mb-5 mt-5">
                                <button type="submit" class="btn btn-sign text-white mr-5"
                                    style="border-radius:8px !important;" id="btn-cancel">Cancel</button>
                                <button type="submit" class="btn btn-sign text-white ml-5"
                                    style="border-radius:8px !important;" id="btn-submit">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7 text-center mt-9">
                <img src="<?=base_url()?>assets/images/brand/img_edit_password.png" class="img-password">
            </div>

        </div>
    </div>
</div>
 
<?php $this->load->view('temp/footer');?>
<script src="<?=base_url()?>assets/public/js/app/app-change-pwd.js"></script>