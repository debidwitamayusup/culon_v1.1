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
                                <img src="<?=base_url()?>public/user/unknown-avatar.jpg"
                                    style="border-radius:50%; width:50%;">
                                <h6><a class="font12 mt-2" style="color:#3c8ae2" href="#">Edit Photo Profile</a></h6>
                            </div>
                            <!-- username -->
                            <div class="col-sm-auto mb-3">
                                <div class="input-group border-input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text border-input">
                                            <i class="fa fa-user tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control border-input2 font12" id="username"
                                        placeholder="username" name="username">
                                </div>
                            </div>

                            <!-- phone number-->
                            <div class="col-sm-auto mb-3">
                                <div class="input-group border-input-group error" id="phoneDiv">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text border-input">
                                            <i class="fa fa-phone tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input type="text" class="form-control border-input2 font12" id="phone_number"
                                        placeholder="08xx xxxx xxxx" name="phone_number">
                                </div>
                                <div class="error-message" id="error-phone">phone number must only numbers and has 13 max length</div>
                            </div>

                            <!-- email -->
                            <div class="col-sm-auto mb-3">
                                <div class="input-group border-input-group error" id="emailDiv">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text border-input">
                                            <i class="fa fa-envelope tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input type="text" class="form-control border-input2 font12" id="email"
                                        placeholder="yourname@infomedia.co.id" name="email">
                                </div>
                                <div class="error-message" id="error-email">format email not valid</div>
                            </div>

                            <!-- password -->
                            <!-- <div class="col-sm-auto">
                                <div class="input-group border-input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text border-input">
                                            <i class="fa fa-lock tx-16 lh-0 op-6"></i>
                                        </div>
                                    </div><input type="password" class="form-control border-input2 font12" id="password"
                                        placeholder="Password" name="password">
                                </div>
                            </div> -->

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

        </div>
    </div>
</div>


<?php $this->load->view('temp/footer');?>
<!-- modal dialog confirm password -->
<div class="modal fade" id="modalConfirmPassword" tabindex="-1" role="dialog" aria-labelledby="modalConfirmPassword"
	aria-hidden="true">
	<div class="modal-dialog" role="document" style="left:8% !important;">
		<div class="modal-content" style="border-radius:8px; border:0px; width:68% !important">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-info-circle mr-2"></i>Confirmation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="ml-2 col-sm-auto">
					<div class="input-group border-input-group error" id="passwordDiv">
						<div class="input-group-prepend">
							<div class="input-group-text border-input">
								<i class="fa fa-lock tx-16 lh-0 op-6"></i>
							</div>
						</div><input type="password" class="form-control border-input2 font12" id="password"
							placeholder="Password" name="password">
                    </div>
                    <div class="error-message" id="error-password">Password is missmatch</div>
				</div>

				<div class="text-center mb-2 mt-2">
					<button type="submit" class="btn btn-sm btn-light mr-5" style="border-radius:8px !important;"
						id="btn-cancel" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-sm btn-sign ml-5 text-white" style="border-radius:8px !important;"
						id="btn-confirm-password">Confirm</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ----------------------------- -->
<script src="<?=base_url()?>assets/public/js/app/app-change-profile.js"></script>