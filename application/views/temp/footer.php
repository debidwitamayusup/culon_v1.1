<!--footer-->
<footer class="footer">
	<div class="container">
		<div class="row align-items-center flex-row-reverse">
			<div class="col-md-12 col-sm-12 text-center">
				Infomedia © 2019
			</div>
		</div>
	</div>
</footer>
<!-- End Footer-->
</div>
</div>
</div>

<!-- modal dialog network error -->
<div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="border-radius:8px; border:0px">
			<div class="modal-header bg-red">
				<h5 class="modal-title" id="exampleModalLabel">Error</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body text-center">
				<i class="fa fa-5x fa-exclamation-triangle text-red mb-2"></i>
				<h6 class="text-bold">Oops something goes wrong...</h6>
				<p>Please check your internet connection or contact your IT support.</p>
			</div>
		</div>
	</div>
</div>
<!-- ---network error -->

<!-- modal dialog confirm password -->
<div class="modal fade" id="modalConfirmPassword" tabindex="-1" role="dialog" aria-labelledby="modalConfirmPassword"
	aria-hidden="true">
	<div class="modal-dialog" role="document" style="left:5% !important;">
		<div class="modal-content" style="border-radius:8px; border:0px; width:75% !important">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-info-circle mr-1"></i>Confirmation</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body text-center">
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
					<button type="submit" class="btn btn-light mr-5" style="border-radius:8px !important;"
						id="btn-cancel">Cancel</button>
					<button type="submit" class="btn btn-sign ml-5 text-white" style="border-radius:8px !important;"
						id="btn-submit">Confirm</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ----------------------------- -->

<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fas fa-angle-up "></i></a>

<!--Jquery js -->
<script src="<?= base_url()?>assets/js/vendors/jquery-3.2.1.min.js"></script>

<!--Jquery.Sparkline js -->
<script src="<?= base_url()?>assets/js/vendors/jquery.sparkline.min.js"></script>

<!--Circle-Progress js -->
<script src="<?= base_url()?>assets/js/vendors/circle-progress.min.js"></script>

<!--Jquery.rating js -->
<script src="<?= base_url()?>assets/js/vendors/jquery.rating-stars.js"></script>

<!--Bootstrap.min js-->
<script src="<?= base_url()?>assets/js/vendors/popper.min.js"></script>
<script src="<?= base_url()?>assets/js/bootstrap/bootstrap.min.js"></script>

<!--Sidemenu js-->
<script src="<?=base_url()?>assets/js/vendors/side-menu.js"></script>

<!-- Sidemenu-responsive-tabs js-->
<script src="<?=base_url()?>assets/js/vendors/sidemenu-responsive-tabs.js"></script>
<script src="<?=base_url()?>assets/js/left-menu.js"></script>

<!-- <script src="<?=base_url()?>assets/js/p-scroll/p-scroll.js"></script>
<script src="<?=base_url()?>assets/js/p-scroll/p-scroll-leftmenu.js"></script> -->


<!-- Custom scroll bar Js-->
<script src="<?= base_url()?>assets/js/vendors/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- Input Mask Plugin -->
<script src="<?= base_url()?>assets/js/vendors/jquery.mask.min.js"></script>

<!-- Side menu js -->
<!-- <script src="<?= base_url()?>assets/js/vendors/sidemenu.js"></script> -->


<!--Select2 js -->
<script src="<?=base_url()?>assets/js/vendors/select2.full.min.js"></script>

<!-- peitychart -->
<script src="<?= base_url()?>assets/js/vendors/jquery.peity.min.js"></script>

<!-- Timepicker js -->
<script src="<?=base_url()?>assets/js/timepicker/jquery.timepicker.js"></script>
<script src="<?=base_url()?>assets/js/timepicker/toggles.min.js"></script>

<!-- Datepicker js -->
<script src="<?=base_url()?>assets/js/datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url()?>assets/js/datepicker/date-picker.js"></script>
<script src="<?=base_url()?>assets/js/datepicker/jquery-ui.js"></script>
<script src="<?=base_url()?>assets/js/datepicker/jquery.maskedinput.js"></script>
<script src="<?=base_url()?>assets/js/vendors/custom.js"></script>

<!-- DataTables -->
<script src="<?=base_url()?>assets/js/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>assets/js/datatables/dataTables.bootstrap4.js"></script>
<script src="<?=base_url()?>assets/js/datatables/dataTables.buttons.min.js"></script>


<!--Counters -->
<script src="<?=base_url()?>assets/js/counters/counterup.min.js"></script>
<script src="<?=base_url()?>assets/js/counters/waypoints.min.js"></script>

<!-- Chart js -->
<script src="<?=base_url()?>assets/js/chart/chart.bundle.js"></script>
<script src="<?=base_url()?>assets/js/chart/echart.js"></script>

<!--Jquery.knob js-->
<script src="<?=base_url()?>assets/js/othercharts/jquery.knob.js"></script>
<script src="<?=base_url()?>assets/js/othercharts/othercharts.js"></script>

<!-- Sidebar js -->
<script src="<?=base_url()?>assets/js/vendors/sidebar.js"></script>

<!---Accordion Js-->
<!-- <script src="<?=base_url()?>assets/js/accordion/accordion.min.js"></script>
<script src="<?=base_url()?>assets/js/accordion/accordion.js"></script> -->

<!-- custom js -->
<script src="<?= base_url()?>assets/js/custom.js"></script>
<script src="<?= base_url()?>assets/public/js/app/app-navbar.js"></script>

<!-- Show percentage on piechart-->
<script src="https://rawgit.com/beaver71/Chart.PieceLabel.js/master/build/Chart.PieceLabel.min.js"></script>

</body>

</html>