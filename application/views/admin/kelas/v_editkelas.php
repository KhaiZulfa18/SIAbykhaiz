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
								<a href="#">Sistem Informasi Akademik</a>
							</li>

							<li class="active">Edit Data Kelas</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Edit Kelas <?php echo $nama; ?>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-11">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form">

									<div class="form-group">
										<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
										<input type="hidden" name="id" id="id" value="<?php echo $id ?>">

										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Kelas </label>

										<div class="col-sm-9">
											<input type="text" id="nama" name="nama" placeholder="Nama Kelas" class="col-xs-10 col-sm-5" value="<?php echo $nama ?>"/>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kelas </label>
											<div class="col-sm-9">
											<select id="kelas" name="kelas" class="col-xs-10 col-sm-5" >
												<option class="disable">--------------- Pilih Kelas --------------</option>
												<option value="10">Kelas 10</option>
												<option value="11">Kelas 11</option>
												<option value="12">Kelas 12</option>
											</select>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jurusan </label>

										<div class="col-sm-9">
											<select id="jurusan" name="jurusan" class="col-xs-10 col-sm-5" >
												<option class="disable" value="">--------------- Pilih Jurusan --------------</option>
												<?php 
													foreach ($listjurusan as $jurusan) { ?>
														<option value="<?php echo $jurusan->id; ?>"><?php echo  $jurusan->nama; ?></option>
												<?php }
												?>
											</select>
										</div>
									</div>

									<div class="space-4"></div>

									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Wali Kelas </label>

										<div class="col-sm-9">
											<select id="walikelas" name="walikelas" class="col-xs-10 col-sm-5" >
												<option value="">--------------- Pilih Wali Kelas --------------</option>
												<?php 
													foreach ($listguru as $guru) { ?>
														<option value="<?php echo $guru->id; ?>"><?php echo  $guru->nama; ?></option>
												<?php }
												?>
											</select>
										</div>
									</div>

									<div class="space-6"></div>

									<div class="form-group">
										<div class="col-md-12 red" id="attention"></div>
									</div>
									
									<div class="col-md-offset-3 col-md-9">
										<button class="btn btn-info" type="button" id="btnedit">
											<i class="ace-icon fa fa-pencil bigger-110"></i>
											Edit
										</button>

										&nbsp; &nbsp; &nbsp;
										<button class="btn btn-inverse" type="button" id="btnback">
											<i class="ace-icon fa fa-undo bigger-110"></i>
											Back
										</button>
									</div>
								</form>
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
		<script src="<?php echo base_url(); ?>js/kelas/edit_kelas.js?v=1.0.1" type="text/javascript"></script>

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
