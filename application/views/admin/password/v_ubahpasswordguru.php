<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->load->view('header'); ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/ace-master/assets/css/bootstrap-datepicker3.min.css" />
	</head>

	<body class="no-skin">
		<?php $this->load->view('navbar'); ?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<?php $this->load->view('sidebar'); ?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-users home-icon"></i>
								<a href="#">Sistem Informasi Akademik </a>
							</li>

							<li class="active">Profil</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Ubah Password
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
								</div>
								<div id="user-profile-3" class="user-profile row">
										<div class="col-sm-offset-1 col-sm-10">
											
											<div class="space"></div>

											<form class="form-horizontal">

												<div class="tabbable">
													<div id="edit-password" class="tab-pane">
														<div class="space-10"></div>
														<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">


														<div class="space-4"></div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Current Password</label>
															<div class="col-sm-9">
																<span class="input-icon">
																	<input type="password" class="" id="passwordlama" name="passwordlama"  required="required" />
																	<i class="ace-icon fa fa-key green"></i>
																</span>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">New Password</label>
															<div class="col-sm-9">
																<span class="input-icon">
																	<input type="password" class="" id="passwordbaru" name="passwordbaru" />
																	<i class="ace-icon fa fa-key blue"></i>
																</span>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">Confirm Password</label>
															<div class="col-sm-9">
																<span class="input-icon">
																	<input type="password" class="" id="confirmpassword" name="confirmpassword" />
																	<i class="ace-icon fa fa-key red"></i>
																</span>
															</div>
														</div>
														
													</div>
												</div>
												
												<div class="clearfix form-actions">
													<div class="col-md-offset-3 col-md-9">
														<button class="btn btn-info" type="button" id="btnedit">
															<i class="ace-icon fa fa-check bigger-110"></i>
															Save
														</button>

														&nbsp; &nbsp;
														<button class="btn" type="button" id="btnback">
															<i class="ace-icon fa fa-undo bigger-110"></i>
															Back
														</button>
													</div>
												</div>
											</form>
											<div class="col-md-12 red" id="attention"></div>
										</div><!-- /.span -->
									</div>
									<!-- <div class="col-sm-12" id="paging"></div> -->
								</div>
								<br/>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php $this->load->view('footer'); ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<?php $this->load->view('basic-scripts'); ?>

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
		<script src="<?php echo base_url(); ?>css/ace-master/assets/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>js/password/ubahpasswordguru.js?v=1.0.9" type="text/javascript"></script>

		<?php $this->load->view('ace-scripts'); ?>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			});
		</script>
	</body>
</html>
