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
								Profil Saya
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="hr dotted"></div>

								<div class="">
									<div id="user-profile-2" class="user-profile">
										<div class="tabbable">

											<div class="tab-content no-border padding-24">
												<div id="home" class="tab-pane in active">
													<div class="row">
														<div class="col-xs-12 col-sm-3 center">
															<span class="profile-picture">
																<?php if ($this->session->userdata('gender')=='Laki-laki') {?>
																<img class="editable img-responsive" src="<?php echo base_url(); ?>images/user/001-businessman.png" alt="Foto Admin" />
																<?php } elseif ($this->session->userdata('gender')=='Perempuan') { ?>
																<img class="editable img-responsive" src="<?php echo base_url(); ?>images/user/004-manager.png" alt="Foto Admin" />
																<?php } else { ?>
																<img class="editable img-responsive" src="<?php echo base_url(); ?>images/user/no-photo.png" alt="Foto Admin" />
																<?php } ?>
															</span>

															<div class="space space-4"></div>

															<a href="<?php echo base_url('akademik/editprofiladmin') ?>" class="btn btn-sm btn-block btn-primary">
																<i class="ace-icon fa fa-pencil bigger-110"></i>
																<span class="bigger-110">Edit Profil</span>
															</a>

															<a href="<?php echo base_url('akademik/ubahpasswordadmin'); ?>" class="btn btn-sm btn-block btn-success">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
																<span class="bigger-110">Ubah Password</span>
															</a>
														</div><!-- /.col -->

														<div class="col-xs-12 col-sm-9">
															<h4 class="blue">
																<span class="middle"><?php echo $nama; ?></span>

																<span class="label label-purple arrowed-in-right">
																	<i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
																	Admin
																</span>
															</h4>

															<div class="profile-user-info">
																<div class="profile-info-row">
																	<div class="profile-info-name"> Username </div>

																	<div class="profile-info-value">
																		<span><?php echo $username ?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> NIP </div>

																	<div class="profile-info-value">
																		<span><?php echo $nip ?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Email </div>

																	<div class="profile-info-value">
																		<i class="fa fa-envelope light-blue bigger-110"></i>
																		<span><?php echo $email; ?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> No. Telepon </div>

																	<div class="profile-info-value">
																		<i class="fa fa-phone light-blue bigger-110"></i>
																		<span><?php echo $telepon; ?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Tanggal Lahir </div>

																	<div class="profile-info-value">
																		<span><?php echo tanggal_indonesia($tgl_lahir); ?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Jenis Kelamin </div>

																	<div class="profile-info-value">
																		<span><?php echo $gender; ?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Alamat </div>

																	<div class="profile-info-value">
																		<span><?php echo $alamat; ?></span>
																	</div>
																</div>
															</div>

															<div class="hr hr-8 dotted"></div>
															
														</div><!-- /.col -->
													</div><!-- /.row -->

													<div class="space-20"></div>
												</div><!-- /#home -->
											</div>
										</div>
									</div>
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
		<script src="<?php echo base_url(); ?>js/datamember.js?v=1.0.6" type="text/javascript"></script>

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
